<template>
  <section class="all_items">

      <article class="article" v-for="item in all_articles" v-bind:key="item.id">
        <h3>Title : <span>{{item.title}}</span></h3>
        <div>
          <p>Author: <span>{{item.author}}</span></p>
          <p>Date createt: <span>{{item.date_time_create}}</span></p>
          <p>Thema: <span>Something</span></p>
          <p>Description: <span>{{item.description}}</span></p>
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