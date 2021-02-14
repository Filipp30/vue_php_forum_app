<template>
<header>
</header>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style lang="scss"  scoped>
  @mixin header_options($background_image,$height,$width){
  //background-image: url($background_image);
  background-color:red;
  width: $width;
  height: $height;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: bottom;
  background-attachment: fixed;
}
header{
  @include header_options('baner.jpg',20vh,100%);
}
</style>