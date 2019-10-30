<template>
  <div id="app">
    <Navbar />
    <Header />
    <b-container>
      <router-view />
    </b-container>
  </div>
</template>

<script>
import Header from "./components/Header";
import Navbar from "./components/Navbar";

export default {
  name: "App",
  components: {
    Header,
    Navbar
  }
};
</script>

<style>
html,
body,
#app {
  min-width: 365px;
  min-height: 100%;
  background-color: #041729;
}
</style>
