<template>
  <section class="all_items">
      <article class="article" v-for="(item,index) in all_articles" v-bind:key="item.id"
                               v-on:click="$emit('get_comments',item.id,index)">
        <h3>Title : <span>{{item.title}}</span></h3>
        <div>
          <p>Author: <span>{{item.author}}</span></p>
          <p>Date createt: <span>{{item.date_time_create}}</span></p>
          <p>Thema: <span>{{item.theme}}</span></p>
          <p>Comments: <span>{{item.comments_count}}</span></p>
        </div>
      </article>
  </section>
</template>

<script>
export default {
  name: "forum_content",
  props:['all_articles'],
}
</script>
<style lang="scss" scoped>

.all_items {
  color: green;
  border: 2px solid black;
  margin: auto;
  h3{
    margin: 0;
  }
  .article{
    border: 2px solid green;
    height: 40px;
    padding: 2px;
    margin: 2px 2px;
    background-color: black;
    display: flex;
    flex-direction: column;
    div{
      display: flex;
      justify-content: space-around;
    }
  }
  .article:hover{
    cursor: pointer;
    font-size:17px ;

  }
}

</style>