<template>
  <div class="waiting">
    <div class="lds-dual-ring"></div>
    <h4>Sending...</h4>
  </div>

</template>

<script>
export default {
  name: "Loader"
}
</script>

<style scoped>
.waiting{
  display: flex;
}
.waiting h4{
  margin-left: 20px;
}
.lds-dual-ring {
  display: inline-block;
  width: 70px;
  height: 70px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 35px;
  height: 35px;
  /*margin-bottom: 30px;*/

  border-radius: 50%;
  border: 6px solid #1408ee;
  border-color: #1408ee transparent #1408ee transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>