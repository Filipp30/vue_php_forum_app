<template>
    <header v-bind:class="{resume_page: resume_page}">
      <Loader class="loader" v-if="loader"/>
    </header>
  <main>
    <Forum_all_items v-if="all_articles.length" v-bind:all_articles="all_articles"/>
  </main>

</template>

<script>

import Forum_all_items from '@/components/Forum_all_items'
import Loader from "@/components/Loader";
import axios from "axios";
export default {
  name: "Forum",
  components:{
    Forum_all_items,Loader
  },
  data(){
    return{
      all_articles:[],
      resume_page:false,
      loader:true
    }
  },
  created() {
    axios.get('http://localhost/vue-php-project/php_server/ForumController/get_all_articles', {
      headers: {'Content-Type': 'application/json'}
    }).then(function (response) {
      console.log(response.data)
    return response.data;
    }).then((data)=>{
      this.all_articles = data;
      this.resume_page = true;
      this.loader = false;
    }).catch((error)=>{
      console.log(error);
    });
  }

}
</script>

<style lang="scss" scoped>

//header{
//  //background-image: url("baner-forum.jpg");
//  background-color: #232323;
//  background-size: cover;
//  background-repeat: no-repeat;
//  background-position: bottom;
//  background-attachment: fixed;
//  width: 100%;
//  height: 100vh;
//
//  display: flex;
//  flex-direction: column;
//  justify-content: center;
//  align-items: center;
//}
main{
  width: 90%;
  height: 73vh;
  margin: auto;
  margin-top: 2vh;
}

.resume_page{
  height: 25vh;
  transition: ease 2s;
}
</style>