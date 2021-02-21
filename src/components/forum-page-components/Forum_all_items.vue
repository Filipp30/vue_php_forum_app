<template>
  <section class="container articleList">
      <article class="articleList__item" v-for="(item,index) in all_articles" v-bind:key="item.id"
                               v-on:click="$emit('get_comments',item.id,index)">
        <div class="articleList__item__author__date">
          <p>Author: <span>{{item.author}}</span></p>
          <p>Date createt: <span>{{item.date_time_create}}</span></p>
        </div>

        <div class="articleList__item__title__thema__comments">
          <p>Title : <span>{{item.title}}</span></p>
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

@mixin flexCenter($direction) {
  display: flex;
  flex-direction: $direction;
  justify-content: center;
  align-content: center;
}

$shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0 2px 4px rgba(0, 0, 0, 0.07),
0 4px 8px rgba(139, 66, 66, 0.07), 0 8px 16px rgba(0, 0, 0, 0.07),
0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 64px rgba(0, 0, 0, 0.07);

.container {
  height: 100%;
  @include flexCenter(column);
  align-items: unset;
  margin: auto;
}
.articleList {
  span{
    color: #72928b;
  }
  &__item {
    @include flexCenter(row);
    align-items: unset;
    box-shadow: $shadow;
    border-radius: 16px;
    border: 1px solid white;
    height: 100%;
    margin: 1rem auto;
    width: 95%;
    justify-content: space-between;

    &__author__date {
      border-bottom-left-radius: 15px;
      border-top-left-radius: 15px;
      color: white;
      p {
        padding: 10px;
      }
    }

    &__title__thema__comments {
      text-align: left;
      width: 65%;
      padding: 10px;
      background-color: white;
      border-radius: 15px;
      border-bottom-left-radius: 0;
      p {
        font-weight: bolder;
        color: #264653;
        line-height: 1.3;
      }
    }
  }
}
</style>