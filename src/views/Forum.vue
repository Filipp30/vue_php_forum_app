<template>
    <header v-bind:class="{show_content: loading}">
    </header>
  <main>
    <All_Items v-bind:all_articles="all_articles"/>
  </main>

</template>

<script>
import All_Items from '@/components/forum-page/All_Items'
export default {
  name: "Forum",
  components:{
    All_Items
  },
  data(){
    return{
      all_articles:[],
      loading:true
    }
  },
  mounted() {
    // setTimeout(()=>{
      fetch('https://jsonplaceholder.typicode.com/comments')
          .then(response => response.json())
          .then(json => {this.all_articles = json})
          // this.loading=true;
    // },1500)
  },
  methods:{

  }

}
</script>

<style type="scss" scoped>
@import "../assets/style/forum-page/forum.scss";
@import "../assets/style/forum-page/all_items.css";
.show_content{
  height: 30vh;
}
</style>