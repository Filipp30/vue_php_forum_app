<template>

  <section class="mailer">
    <div class="image"><h1>image or content</h1></div>
    <form @submit.prevent="onSubmit">

      <div class="user_input">
        <div class="first_last_name">
          <input  type="text" v-model="first_name" placeholder="First Name">
          <input id="lastname" type="text" v-model="last_name" placeholder="Last Name">
        </div>
        <div class="email_subject">
          <input id="email" type="email" v-model="email" placeholder="E-Mail">
          <input id="subject" type="text" v-model="subject" placeholder="Subject">
        </div>
        <textarea name="" id="" cols="30" rows="10" v-model="message" placeholder="Your Message"/>
      </div>

      <div class="btn-loader">
        <button v-if="send_success" type="submit">Send</button>
        <Loader v-else />
      </div>

    </form>
  </section>
</template>

<script>
import Loader from '@/components/Loader'
import axios from 'axios';
export default {

name: "MailSendForm",
  components:{
    Loader,
  },
  data(){
    return{
      form:{
        first_name:'',
        last_name:'',
        email:'',
        subject:'',
        message:'',
      },
      send_success:true
    }
  },
  methods:{
      onSubmit(){
          this.send_success = false;
          axios.post('http://localhost:80/vue-php-project/php_server/mainController/send_mail/', {
          body:JSON.stringify(this.form)},{headers: {'Content-Type':'application/json'}})
          .then((res) => {
            console.log(res)
          })
          .catch((error) => {
            console.log(error)
          }).finally(() => {
            this.send_success = true;
            console.log('Finish function')
          });
      }
  }

}
</script>

<style lang="scss" scoped>
@import '../../assets/style/contact-page/mail_send_form.scss';
</style>