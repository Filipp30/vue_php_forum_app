<template>
  <main>
    <Navi/>
    <router-view/>
  </main>

</template>

<script>
import Navi from '@/components/Navi';
export default {
  name: 'App',

  components: {
    Navi
  }

}
</script>

<style>
main{
  margin:auto;
  width: 1200px;
}
</style>
