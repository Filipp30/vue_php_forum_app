<template>
    <header>
      <div class="banner_contact"></div>
      <Navi/>
    </header>

    <div class="mail-form">
      <MailSendForm/>
    </div>
</template>

<script>

import MailSendForm from '@/components/contact-page/MailSendForm'
import Navi from "@/components/Navi";

export default {
  name: 'Contact',
    components: {
      Navi,
      MailSendForm
    }


  }
</script>

<style lang="scss" scoped>
@import "../assets/style/contact-page/contact.scss";
</style>