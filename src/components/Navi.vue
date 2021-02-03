<template>
  <div class="navi">
    <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/wagenpark-tarieven">Wagenpark-Tarieven</router-link>|
      <router-link to="/transport-bestellen">Transport-Bestellen</router-link>|
      <router-link to="/contact">Contact</router-link>
    </nav>
  </div>
</template>

<script>
export default {
name: "Navi"
}
</script>

<style scoped>
.navi {
  background-color: #141518;
  width: 1200px;
  height: 10vh;
  z-index: 10;
  margin-top:10px;
  display: flex;
  justify-content: center;
  align-items: center;
}
nav {
  background-color: #141518;
  width:100%;
  display: flex;
  justify-content: space-around;
  height: 5vh;
}
nav a {
  background-color: #141518;
  border: 2px solid maroon;
  border-radius: 5px;
  height: 25px;
  padding: 4px;
  color: aliceblue;
  font-family: "Audiowide",serif;
  display: flex;
  align-items: center;
}
.navi a:hover {
  background-color: maroon;
  color: aliceblue;
}
</style>