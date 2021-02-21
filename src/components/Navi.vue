<template>
  <div class="menubar">
    <h1>Company name</h1>
    <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/forum">Forum</router-link>|
      <router-link to="/add-question">Add Question</router-link>|
      <router-link to="/user">Users</router-link>|
      <router-link to="/contact">Contact</router-link>
    </nav>
  </div>

</template>

<script>
export default {
name: "Navi"

}
</script>
<style lang="scss" scoped>

.menubar {
  z-index: 1000;
  height: 50px;
  width: 90%;
  position: absolute;
  top: 2px;
  bottom: 0;
  margin: 2rem;
  display: flex;
  justify-content:center;
  align-items:center;

  h1{
    flex: 1;
    font-size: 35px;
    color: white;
  }
  nav{

    max-width: 90%;
    display: flex;
    align-items: center;
    a{
      padding:1rem;
      text-decoration: none;
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
      border-bottom-width: 0;
      display: inline-block;
      &:after{
        content: '';
        display: block;
        border-bottom: 2px solid white;
        width: 0;
        -webkit-transition: 0.5s ease;
        transition: 0.5s ease;
      }
      &:hover:after { width: 100%; }
    }
  }
}
@media screen and (max-width: 1000px) {
  .menubar{
    h1{
      text-align: center;
    }
    nav{
      display: none;
    }
  }
}
</style>