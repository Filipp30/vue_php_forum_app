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
import Loader from '@/components/Loader'
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

@import '../../assets/style/contact-page/mail_send_form.scss';

</style>