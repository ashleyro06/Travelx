<template>
  <div class="t-nuevo">
    <div class="t-title">
      <unicon name="map-pin-alt" fill="white"></unicon>
      <h3>Añadir un nuevo viaje</h3>
    </div>
    <InfoViaje />
  </div>
</template>

<script>
import InfoViaje from "../components/InfoViaje";

export default {
  name: "Nuevo",
  components: {
    InfoViaje
  }
};
</script>

<style scoped>
.t-nuevo {
  padding: 0 0 30px 0;
}
.t-title {
  display: flex;
  justify-content: center;
  align-items: center;

  color: white;
  background-color: rgb(17, 56, 82);
  font-size: 1rem;
  padding: 15px 0;
}
</style>