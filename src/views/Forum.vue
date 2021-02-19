<template>
    <header v-bind:class="{resume_page: resume_page}">
      <Loader_forum_page v-if="loader"/>
    </header>
  <main>
    <Forum_all_items
        v-if="all_articles.length && show_article_on_focus === false"
        v-bind:all_articles="all_articles"
        v-on:get_comments="getComment" />
      <Article_on_focus
          v-if="show_article_on_focus"
          v-bind:article_on_focus="article_on_focus"
          v-bind:comments="comments"
          v-on:btn_back="show_article_on_focus=false"
      />
  </main>
</template>

<script>

import Forum_all_items from '@/components/forum-page-components/Forum_all_items';
import Article_on_focus from "@/components/forum-page-components/Article_on_focus";
import Loader_forum_page from "@/components/forum-page-components/Loader_forum_page";
import axios from "axios";
export default {
  name: "Forum",
  components:{
    Forum_all_items,
    Article_on_focus,
    Loader_forum_page
  },
  data(){
    return{
      all_articles:[],
      resume_page:false,
      loader:true,
      show_article_on_focus:false,
      article_on_focus:'',
      comments:[],

    }
  },

  created() {
    axios.get('http://localhost/vue-php-project/php_server/ForumController/get_all_articles/', {
      headers: {'Content-Type': 'application/json'}
    }).then(function (response) {
    return response.data;
    }).then((data)=>{
      this.all_articles = data;
      console.log(data)
      this.resume_page = true;
      this.loader = false;
    }).catch((error)=>{
      console.log(error);
    });
  },
  methods:{
    getComment(id,key){
      this.loader = true;
      this.article_on_focus = this.all_articles[key];
      axios.get('http://localhost/vue-php-project/php_server/ForumController/get_comments/'+id, {
        header: {}
      }).then(function (response) {
        return response.data;
      }).then((data)=>{
        this.comments = data;
        console.log(data)
        this.loader = false;
        this.show_article_on_focus=true;
      }).catch((error)=>{
        console.log(error);
      });
    },
  }

}
</script>

<style lang="scss" scoped>

header{
  background-image: url('../assets/style/images/baner.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: bottom;
  background-attachment: fixed;
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
main{
  width: 90%;
  margin: auto;
  margin-top: 2vh;

}
.resume_page{
  height: 20vh;
  transition: ease 300ms;

}
//.art_comment{
//  background-color: #1408ee;
//  transition: ease 5s;
//}

</style>