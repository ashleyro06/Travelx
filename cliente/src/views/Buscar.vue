<template>
  <main>
    <b-input-group>
      <b-form-input
        placeholder="Buscar un viaje"
        v-model="busqueda"
        :state="state"
        @keyup.enter="buscar"
      ></b-form-input>
      <b-input-group-append>
        <b-button variant="info" @click="buscar">
          <unicon name="search"></unicon>
        </b-button>
      </b-input-group-append>
    </b-input-group>

    <div v-if="cargando && state">
      <h2>
        <b-spinner small type="grow"></b-spinner>Cargando...
      </h2>
    </div>
    <div v-else-if="!cargando && notFound">
      <b-alert show variant="warning">No se encontraron viajes</b-alert>
    </div>
    <div v-else class="t-cards">
      <Viaje
        v-for="item in viajes"
        :key="item.id"
        :viaje="item"
        v-on:eliminar-viaje="eliminar(item.id)"
        v-on:editar-viaje="editar(item.id)"
      />
    </div>
  </main>
</template>

<script>
import axios from "axios";
import { API_BASE_URL } from "@/config";
import Viaje from "@/components/Viajes.vue";
import Alertas from "../sweetalertMethods";

export default {
  name: "Buscar",
  components: {
    Viaje
  },
  data() {
    return {
      busqueda: "",
      viajes: "",
      cargando: false,
      notFound: false
    };
  },
  computed: {
    state() {
      return this.busqueda.length > 0 ? true : false;
    }
  },
  methods: {
    async buscar() {
      if (this.state) {
        this.cargando = true;
        try {
          const response = await axios.get(
            API_BASE_URL + "/viajes/2/" + this.busqueda
          );
          this.viajes = response.data;
          if (this.viajes.length === 0) {
            this.notFound = true;
          } else if (this.viajes.length > 0) {
            this.notFound = false;
            Alertas.smallAlert(this, "Viajes cargados", "success");
          }

          this.cargando = false;
        } catch (e) {
          console.log(e);
        }
      }
    },
    async eliminar(id) {
      let index = this.viajes.findIndex(viaje => viaje.id === id);

      Alertas.confirmAction(
        this,
        "¿Está seguro de que desea eliminar este viaje?" +
          this.viajes[index].nombre,
        "Aceptar"
      ).then(() => {
        this.eliminarViaje(index, id);
      });
    },
    async eliminarViaje(index, id) {
      await axios.delete(API_BASE_URL + "/viajes/" + id);
      this.viajes.splice(index, 1);
      Alertas.smallAlert(this, "Viaje eliminado", null);
    },
    editar(id) {
      this.$router.push({ name: "Editar", params: { id } });
    }
  }
};
</script>