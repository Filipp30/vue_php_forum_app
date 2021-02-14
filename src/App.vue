<template>
  <Header/>
    <Navi/>
    <router-view/>
</template>

<script>
import Header from '@/components/Header'
import Navi from '@/components/Navi';
export default {
  name: 'App',
  components: {
    Header,
    Navi
  }

}
</script>
