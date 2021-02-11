<template>
  <div class="menubar">
    <h1>Company name</h1>
    <nav>
      <router-link to="/">Home</router-link> |
      <router-link v-on:click="$emit('on_forum_click')" to="/forum">Forum</router-link>|
      <router-link to="">Add Question</router-link>|
      <router-link to="">Users</router-link>|
      <router-link to="">example_3</router-link>|
      <router-link to="/contact">Contact</router-link>
    </nav>
  </div>

</template>

<script>
export default {
name: "Navi"

}
</script>
