<template>
  <div class="contact">
    <div class="content">
      <h1>Content contact page</h1>
    </div>
    <div class="mail-form">
      <MailSendForm/>
    </div>

  </div>
</template>

<script>

import MailSendForm from '@/components/MailSendForm'

export default {
  name: 'Contact',
  components: {
  MailSendForm
  },
  data(){
    return{
      firstname: "",
      lastname: "",
      email: "",
      message: ""
    }
  },
  mounted(){

  }
}
</script>