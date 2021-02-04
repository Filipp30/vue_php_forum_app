<template>

  <main>
    <Navi/>
    <router-view/>
    <Footer/>
  </main>

</template>

<script>
import Navi from '@/components/Navi';
import Footer from '@/components/Footer';


export default {
  name: 'App',

  components: {
    Navi,
    Footer,

  }

}
</script>

<style>

</style>
