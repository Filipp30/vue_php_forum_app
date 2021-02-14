<template>
  <div class="waiting">
    <div class="lds-dual-ring"></div>
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
.lds-dual-ring {
  display: inline-block;
  width: 50px;
  height: 50px;  margin: 0;

}
.lds-dual-ring:after {
  content: "";
  display: block;
  width: 35px;
  height: 35px;
  margin: 0;
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