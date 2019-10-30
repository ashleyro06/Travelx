<template>
  <div class="t-card">
    <b-card
      overlay
      img-src="https://picsum.photos/id/985/700/200/?grayscale&blur=3"
      img-alt="Card Image"
      text-variant="white"
    >
      <b-img class="logo" :src="require('../assets/logo.png')"></b-img>
    </b-card>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
/** Created */
.t-card {
  margin-bottom: 10px;
}

/***************/
/** Bootstrap */
/*************/

.card-body {
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  align-items: center;

  /* -webkit-box-shadow: inset 0px -10px 5px 5px rgba(5, 37, 65, 1); */
  -webkit-box-shadow: inset 0px -10px 5px 5px rgba(5, 24, 41, 1);
  -moz-box-shadow: inset 0px -10px 5px 5px rgba(5, 24, 41, 1);
  box-shadow: inset 0px -10px 5px 5px rgba(5, 24, 41, 1);
}

.card,
.card-body {
  border: none;
  border-radius: 0;
}

.logo {
  height: 80%;
}
</style>