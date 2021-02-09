<template>
  <section class="mailer">
    <div class="image"><h1>image or content</h1></div>
    <form @submit.prevent="onSubmit">
      <div class="user_input">
            <div class="first_last_name">
                <input  type="text"  placeholder="First Name" v-bind:class="{'error_firstname'}" v-model="form.first_name">
                <input id="lastname" type="text" placeholder="Last Name" v-model="form.last_name">

            </div>
            <div class="email_subject">
                <input id="email" type="email" placeholder="E-Mail" v-model="form.email">
                <input id="subject" type="text" placeholder="Subject" v-model="form.subject" >
            </div>
                <textarea name="" id="" cols="30" rows="10" v-model="form.message" placeholder="Your Message"/>
      </div>
      <div class="btn-loader">
        <button v-if="send_success" type="submit">SEND MESSAGE</button>
        <Loader v-else />
        <p>{{error}}</p>
      </div>
    </form>
  </section>

</template>

<script>
import Loader from '@/components/Loader'
// import axios from 'axios';
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
        email:'',
        subject:'',
        message:'',
      },
        error:'',
        error_firstname: 'input_error',
        send_success:true
    }

  },
  watch:{form: { deep:true, handler(){ this.error=''; } },

  },
  methods:{
    validateEmail() {
        console.log('value');

    },
    onSubmit(){
          this.check_inputs();
          this.send_success = true;
          // axios.post('http://localhost/vue-php-project/php_server/mainController/send_mail/', {
          //   body: JSON.stringify(this.form)
          // }, {headers: {'Content-Type': 'application/json'}})
          // .then((res) => {
          //   console.log(res)
          // })
          // .catch((error) => {
          //   console.log(error)
          // }).finally(() => {
          //   this.send_success = true;
          //   console.log('Finish function')
          // });
          // console.log(this.first_name+'  '+this.last_name)

    },
    check_inputs(){
      if (this.form.first_name === ''){
        this.error='Pleas enter your lastname'
      }else
      if (this.form.last_name === ''){
        this.error='Pleas enter your lastname'
      }else
      if (this.form.email === ''){
        this.error='Pleas enter email'
      }else
      if (this.form.subject === ''){
        this.error='Pleas enter subject'
      }else
      if (this.form.message === ''){
        this.error='Pleas writhe your message'
      }
    }
  }

}
</script>

<style lang="scss" scoped>
@import '../../assets/style/contact-page/mail_send_form.scss';
</style>