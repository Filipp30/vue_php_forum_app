<template>
  <section class="all_items">

      <article class="article" v-for="item in all_articles" v-bind:key="item.title">
        <h3>Title : <span>{{item.name}}</span></h3>
        <div>
          <p>Author: <span>Some Name </span></p>
          <p>Date createt: <span>05/10/2021</span></p>
          <p>Thema: <span>Something</span></p>
          <p>Comments: <span>{{item.id}}</span></p>
        </div>
      </article>

  </section>
</template>

<script>
export default {
  name: "forum_content",
  props:{
    all_articles:{
      type:Object,
      required:true
    }

  }





}
</script>

<style scoped>
@import "../../assets/style/components/normalize.css";
</style>