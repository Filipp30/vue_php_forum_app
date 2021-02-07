<template>
<div>
  <main>
    <Navi/>
    <router-view/>
    <Footer/>
  </main>

</div>


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
