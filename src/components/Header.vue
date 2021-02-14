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
  background-image: url($background_image);
  width: $width;
  height: $height;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: bottom;
  background-attachment: fixed;
}
header{
  @include header_options('../assets/style/images/baner.jpg',100vh,100%);
}
</style>