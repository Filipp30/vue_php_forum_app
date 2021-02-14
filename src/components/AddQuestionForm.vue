<template>
  <header>
    <form @submit.prevent="onSubmit">
      <div class="user_input" >
        <div class="question_inputs" >
          <input id="title" type="text" placeholder="Title" v-bind:style="{'border-bottom':error.empty_title===true? error.input_border_red:error.input_border_withe}" v-model="form.title">
          <input id="author" type="text" placeholder="Author" v-bind:style="{'border-bottom':error.empty_author===true? error.input_border_red:error.input_border_withe}" v-model="form.author">
          <input id="theme" type="text" placeholder="Theme" v-bind:style="{'border-bottom':error.empty_theme===true? error.input_border_red:error.input_border_withe}" v-model="form.theme">
        </div>
        <textarea name="" id="message" cols="30" rows="10" placeholder="Text" v-bind:style="{'border-bottom':error.empty_description===true? error.input_border_red:error.input_border_withe}" v-model="form.description"/>
      </div>
      <div class="btn-loader">
        <button v-if="! error.loader" type="submit">ADD QUESTION</button>
        <Loader v-else/>
        <p>{{error.p}}</p>
      </div>
    </form>
  </header>

</template>

<script>
import Loader from '@/components/Loader'
import axios from 'axios';
export default {

  name: "AddQuestionForm",
  components:{
    Loader
  },
  data(){
    return{
      form:{
        title:'',
        author:'',
        theme:'',
        description:''
      },
      error:{
        p:'',
        empty_title:false,
        empty_author:false,
        empty_theme:false,
        empty_description:false,
        loader:false,
        input_border_withe:'1px solid white',
        input_border_red:'1px solid red'
      }
    }
  },
  watch:{
    form: { deep:true, handler(){
        this.error.empty_title = false;
        this.error.empty_author = false;
        this.error.empty_theme = false;
        this.error.empty_description = false;
      }
    },
  },
  methods:{
    onSubmit(){
      this.check_inputs();
      if (this.error.empty_title||this.error.empty_author||
          this.error.empty_theme||
          this.error.empty_description){
        return false;
      }else{
        this.error.loader = true;
        axios.post('http://localhost/vue-php-project/php_server/ForumController/add_new_article', {
          body: JSON.stringify(this.form)
        }, {headers: {'Content-Type': 'application/json'}})
            .then((res) => {
              if (res.data){
                console.log(res.data)
                this.question_form_reset_inputs();
              }
            })
            .catch((error) => {
              this.question_form_reset_inputs();
              this.error.p='Error!!!Pleas contact web developer.';
              setTimeout(()=>{this.error.p =''},10000);
              console.log(error)
            })

      }
    },
    question_form_reset_inputs(){
      this.error.loader = false;
      this.form.title='';
      this.form.author='';
      this.form.theme='';
      this.form.description='';
      this.error.p ='Your question has been successfully added.';
      setTimeout(()=>{this.error.p =''},10000);
    },
    check_inputs(){
      if (this.form.title === ''){
        this.error.empty_title = true
      }
      if (this.form.author === ''){
        this.error.empty_author = true
      }
      if (this.form.theme === ''){
        this.error.empty_theme = true
      }
      if (this.form.description === ''){
        this.error.empty_description = true
      }
    }
  },

}
</script>

<style lang="scss" scoped>
@mixin section(){
  background-color:rgba(0, 0, 0, 0.5);
  width: 65%;
  height: 400px;
  padding: 5px;
  margin-top: 120px;
  box-shadow: 10px 10px 16px 2px rgba(0,0,0,0.55);
  color: white;

}
header{
  height: 100vh;
  display: flex;
  justify-content: space-evenly;
  width: 100%;
  margin: auto;
  align-items:center;
  background-image: url('../assets/style/images/background_MailSendForm.jpg');
  background-color: cornflowerblue;
  background-size:cover;
  background-position: center;
  background-repeat: no-repeat;

  form{
    @include section();
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    .btn-loader{ height:100px;
      margin-left: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
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
      p{
        color: red;
        font-size: 16px;
        font-weight: bold;
        margin: 0;
      }
    }
  }

  .user_input{

    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;

    .question_inputs {
      display: flex;
      justify-content: space-between;

      input {
        outline: none;
        color: white;
        background-color: transparent;
        width: 30%;
        height: 30px;
        border: none;
        border-bottom: 1px solid white;
      }
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

@media screen and (max-width: 1200px) {
  .mailer{
    .image{
      display: none;
    }
  }
}
@media screen and (max-width: 590px) {
  .user_input{
    .first_last_name{
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      input{
        width: 80%;
      }
    }
    .email_subject{
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      input{
        width: 80%;
      }
    }
  }
}
</style>
