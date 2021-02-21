<template>
  <div class="article">
    <article>
      <h1>Title: <span>{{article_on_focus.title}}</span></h1>
      <div>
        <p>Author: <span>{{article_on_focus.author}}</span></p>
        <p>Datum create article: <span>{{article_on_focus.date_time_create}}</span></p>
        <p>Datum latest updated: <span>{{article_on_focus.date_time_update}} </span></p>
        <p>Theme: <span>{{article_on_focus.theme}}</span></p>
        <p>Comments count:<span>{{article_on_focus.comments_count}}</span></p>
        <p>Description :<span>{{article_on_focus.description}}</span></p>
      </div>
    </article>

    <section class="article__comments">
      <h3>Comments:</h3>
      <div v-if="comments_update.length">
        <section class="article__comment"  v-for="item in comments_update" v-bind:key="item.id" >
          <p>Author:<span> {{item.author}}</span> --- Datum_Time :<span> {{item.date_time}}</span></p>
          <p><span>{{item.comment}}</span></p>
        </section>
      </div>
      <h4 v-else>No-Comments</h4>
    </section>

    <section class="article__add_new_comment" v-if="new_comment_field">
      <nav>
        <button v-on:click=add_comment>Add - Comment</button>
        <button v-on:click="new_comment_field=false" >Exit</button>
      </nav>
        <div class="form" v-if="wait === false" >
          <input type="text" placeholder="Username"
                 v-model="form.username"
                 v-bind:style="{'border-bottom':error.empty_username===true?error.input_border_red:error.input_border_green}">
          <textarea cols="30" rows="10" placeholder="Your Comment"
                    v-model="form.comment"
                    v-bind:style="{'border-bottom':error.empty_comment===true?error.input_border_red:error.input_border_green}"/>
        </div>
          <Loader_forum_page v-if="wait" />
    </section>

    <nav>
      <button v-on:click="new_comment_field=true"> Wraith - Comment</button>
      <button v-on:click="$emit('btn_back')" >Back to all articles</button>
    </nav>

  </div>

</template>

<script>
import Loader_forum_page from "@/components/forum-page-components/Loader_forum_page";
import axios from "axios";
export default {

name: "article_on_focus",
  components:{
    Loader_forum_page
  },
  props:['article_on_focus','comments'],
  data(){
    return{
      new_comment_field:false,
      form:{
        username:'',
        comment:'',
      },
      error:{
        empty_username:false,
        empty_comment:false,
        input_border_green:'1px solid white',
        input_border_red:'1px solid red',
      },
      wait:false,
      updated:''
    }
  },
  computed:{
      comments_update(){
        if(this.updated){
          console.log('updated:')
          console.log(this.updated)
          return this.updated;
        }else{
          console.log('comments:')
          console.log(this.comments)
          return this.comments;
        }
      }
  },
  watch:{
    form: { deep:true, handler(){
        this.error.empty_username = false;
        this.error.empty_comment = false;
      }
    },
  },
  methods:{
    add_comment(){
      this.check_inputs();
      if(this.error.empty_username || this.error.empty_comment){
        return false;
      }else{
        this.wait = true;

          axios.post("http://localhost/vue-php-project/php_server/ForumController/add_comment/",{
            body:JSON.stringify({
              user_id:33,
              author:this.form.username,
              article_id: this.article_on_focus.id,
              comment: this.form.comment,
            }),
            header:{
              'Content-Type': 'application/json'}
            }).then(((post)=>{
          console.log('Post comment:'+post);
        })).catch((error)=>{
          console.log(error)
          this.wait = false;
          this.form.comment='ERROR:'+error;
          this.form.username='ERROR pleas contact developer';
        }).then(()=>{
            axios.get('http://localhost/vue-php-project/php_server/ForumController/get_comments/'
                +this.article_on_focus.id, {
              header: {}
            }).then((get)=>{
              this.updated = get.data;
              this.wait = false;
              this.new_comment_field=false;
              this.form.comment='';
              this.form.username='';
            })
          });
      }
    },
    check_inputs(){
      if (this.form.comment === ''){
        this.error.empty_comment = true
      }
      if (this.form.username === ''){
        this.error.empty_username = true
      }
    }
  },
}
</script>

<style lang="scss" scoped>

.article{
  margin-bottom: 30px;
  background-color:#264653;


  article{
    border-radius: 16px;
    border: 1px solid white;
    padding: 10px;
    margin: 2px;
    height: 100%;
  }
  span{
    color: #72928b;
  }

  &__comment{
    border-radius: 16px;
    border: 1px solid white;
    padding: 10px;
    margin: 5px 2px;
  }
  &__add_new_comment{
    height: 150px;
    background-color: black;
    //color: green;
    border-radius: 16px;
    border: 1px solid white;
    padding: 5px;
    margin: 2px 2px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;

    .form{
      input:-webkit-autofill,
      input:-webkit-autofill:hover,
      input:-webkit-autofill:focus,
      input:-webkit-autofill:active,
      input:-webkit-autofill:valid,
      select:-webkit-autofill,
      select:-webkit-autofill:hover,
      select:-webkit-autofill:focus
      {
        -webkit-transition-delay: 99999s;
        -webkit-text-fill-color: #d7d8ce;
        transition-delay: 9999s;

      }
      height: 70%;
      display: flex;
      flex-direction: column;
      justify-content: space-around;

      input{
        outline: none;
        color: white;
        background-color: transparent;
        width: 40%;
        height: 30px;
        border:none;
        border-bottom: 1px solid white;
      }
      textarea{
        outline: none;
        color: white;
        background-color: transparent;
        border:none;
        border-bottom: 1px solid white;
        //border-top: 1px solid white;
      }
    }
  }
  nav{
    width: 100%;
    display: flex;
    justify-content: space-between;
  }
  button{
    border-radius: 5px;
    background: #ffffff;
    border-color: #232323;
    color: #232323;
    font-size: 12px;
    padding: 4px 24px;
    font-weight: bold;
    height: 30px;
  }
  button:hover{
    border-radius: 5px;
    background: transparent;
    border-color: #ffffff;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
  }
}



</style>