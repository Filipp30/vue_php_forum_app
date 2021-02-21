<template>
  <header>

    <main>

      <article>
        <Loader_forum_page v-if="loader"/>
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
      </article>
    </main>
  </header>


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
      loader:true,
      show_article_on_focus:false,
      article_on_focus:'',
      comments:[],

    }
  },

  created() {

    axios.get('http://stuworld.space/php_server/forumController/get_all_articles/', {
      headers: {'Content-Type': 'application/json'}
    }).then(function (response) {
    return response.data;
    }).then((data)=>{
      this.all_articles = data;
      console.log(data)
      this.loader = false;
    }).catch((error)=>{
      console.log(error);
    });
  },
  methods:{
    getComment(id,key){
      this.loader = true;
      this.article_on_focus = this.all_articles[key];
      axios.get('http://stuworld.space/php_server/forumController/get_comments/'+id, {
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
header {
  height: 100%;
  display: flex;
  justify-content: space-evenly;
  width: 100%;
  margin: auto;
  align-items: center;
  background-color: #72928b;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  main {
    width: 100%;
    margin: auto;
    height: 100%;
    background-color: #264653;
    padding-top: 6rem;

    article{
      width: 95%;
      margin: auto;
    }

  }

}
</style>