<template>
  <header>
<!--    <div class="image"><h1>image or content</h1></div>-->
    <form @submit.prevent="onSubmit">
      <div class="user_input" >
            <div class="first_last_name" >
                <input id="firstname" type="text" placeholder="First Name" v-bind:style="{'border-bottom':error.empty_firstname===true? error.input_border_red:error.input_border_withe}" v-model="form.first_name">
                <input id="lastname" type="text" placeholder="Last Name" v-bind:style="{'border-bottom':error.empty_lastname===true? error.input_border_red:error.input_border_withe}" v-model="form.last_name">
            </div>
            <div class="email_subject">
                <input id="email" type="email" placeholder="E-Mail" v-bind:style="{'border-bottom':error.empty_email===true? error.input_border_red:error.input_border_withe}" v-model="form.email">
                <input id="subject" type="text" placeholder="Subject" v-bind:style="{'border-bottom':error.empty_subject===true? error.input_border_red:error.input_border_withe}" v-model="form.subject" >

            </div>
                <textarea name="" id="" cols="30" rows="10" placeholder="Your Message" v-bind:style="{'border-bottom':error.empty_message===true? error.input_border_red:error.input_border_withe}" v-model="form.message"/>
      </div>
      <div class="btn-loader">
        <button v-if="! error.loader" type="submit">SEND MESSAGE</button>
        <Loader v-else/>
        <p>{{error.p}}</p>
      </div>
    </form>
  </header>

</template>

<script>
import Loader from '@/components/Loader_mail_form'
import axios from 'axios';
export default {

name: "MailSendForm",
  components:{
    Loader
  },
  data(){
    return{
      form:{
        first_name:'',
        last_name:'',
        full_name:'',
        email:'',
        subject:'',
        message:'',
      },
      error:{
        p:'',
        empty_firstname:false,
        empty_lastname:false,
        empty_email:false,
        empty_subject:false,
        empty_message:false,
        loader:false,
        input_border_withe:'1px solid white',
        input_border_red:'1px solid red'
      }
    }
  },
  watch:{
    form: { deep:true, handler(){
        this.error.empty_firstname = false;
        this.error.empty_lastname = false;
        this.error.empty_email = false;
        this.error.empty_subject = false;
        this.error.empty_message = false;
        }
    },
  },
  methods:{
    onSubmit(){
      this.check_inputs();
      if (this.error.empty_firstname||this.error.empty_lastname||
          this.error.empty_email||this.error.empty_subject||
          this.error.empty_message){
          return false;
      }else{
        this.error.loader = true;
        axios.post('http://localhost/vue-php-project/php_server/mainController/send_mail/', {
          body: JSON.stringify(this.form)
        }, {headers: {'Content-Type': 'application/json'}})
            .then((res) => {
              if (res.data){
                this.mail_reset_inputs();
              }
            })
            .catch((error) => {
              this.mail_reset_inputs();
              this.error.p='Error!!!Pleas contact web developer.';
              setTimeout(()=>{this.error.p =''},10000);
              console.log(error)
            })
      }
    },
    mail_reset_inputs(){
      this.error.loader = false;
      this.form.first_name='';
      this.form.last_name='';
      this.form.email='';
      this.form.subject='';
      this.form.message='';
      this.error.p ='Your mail has been sent successfully.';
      setTimeout(()=>{this.error.p =''},10000);
    },
    check_inputs(){
      if (this.form.first_name === ''){
        this.error.empty_firstname = true
      }
      if (this.form.last_name === ''){
        this.error.empty_lastname = true
      }
      if (this.form.email === ''){
        this.error.empty_email = true
      }
      if (this.form.subject === ''){
        this.error.empty_subject = true
      }
      if (this.form.message === ''){
        this.error.empty_message = true
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

    .first_last_name{
      display: flex;
      justify-content: space-between;
    }
    .email_subject{
      display: flex;
      justify-content: space-between;
    }
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