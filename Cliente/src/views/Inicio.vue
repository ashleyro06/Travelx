<template>
  <div class="t-inicio">
    <h1>Viajes</h1>
    <div v-if="cargando">
      <h2>
        <b-spinner small type="grow"></b-spinner>Loading...
      </h2>
    </div>
    <div v-else class="t-cards">
      <Viaje
        v-for="item in viajes.data"
        :key="item.id"
        :viaje="item"
        v-on:eliminar-viaje="eliminar(item.id)"
        v-on:editar-viaje="editar(item.id)"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { API_BASE_URL } from "@/config";
import Viaje from "@/components/Viajes.vue";
import Alertas from "../sweetalertMethods";

export default {
  name: "Inicio",
  components: {
    Viaje
  },
  async created() {
    try {
      const response = await axios.get(API_BASE_URL + "/viajes");
      this.viajes = response.data;
      this.cargando = false;
      Alertas.smallAlert(this, "Viajes cargados", "success");
    } catch (e) {
      console.log(e);
    }
  },
  data() {
    return {
      cargando: true,
      viajes: {},
      viajesFoto: {}
    };
  },
  methods: {
    async eliminar(id) {
      let index = this.viajes.data.findIndex(viaje => viaje.id === id);

      Alertas.confirmAction(
        this,
        "¿Está seguro de que desea eliminar este viaje?" +
          this.viajes.data[index].nombre,
        "Aceptar"
      ).then(() => {
        this.eliminarViaje(index, id);
      });
    },
    async eliminarViaje(index, id) {
      await axios.delete(API_BASE_URL + "/viajes/" + id);
      this.viajes.data.splice(index, 1);
      Alertas.smallAlert(this, "Viaje eliminado", null);
    },
    editar(id) {
      this.$router.push({ name: "Editar", params: { id } });
    }
  }
};
</script>

<style scoped>
h1,
h2 {
  color: white;
}

/** Created */

.t-cards {
  margin: 20px 0 0 0;
  border: none;
  padding: 0 0 20px 0;
}

.t-cards h1 {
  padding: 20px 0 20px 0;
}
</style>