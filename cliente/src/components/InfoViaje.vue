<template>
  <div class="t-card">
    <b-form>
      <!-- Nombre del viaje -->
      <b-form-group id="it-nombre-grupo" label="Nombre:" label-for="it-nombre">
        <b-form-input id="it-nombre" v-model="form.nombre" required placeholder="Nombre"></b-form-input>
      </b-form-group>
      <!-- Descripción -->
      <b-form-group id="it-descripcion-grupo" label="Descripcion:" label-for="it-descripcion">
        <b-form-textarea
          id="it-descripcion"
          placeholder="Descripción"
          rows="2"
          max-rows="2"
          v-model="form.descripcion"
        ></b-form-textarea>
      </b-form-group>
      <!-- Lugar -->
      <b-form-group id="it-lugar-grupo" label="Lugar:" label-for="it-lugar">
        <b-form-input id="it-lugar" v-model="form.lugar" required placeholder="Lugar"></b-form-input>
      </b-form-group>
      <!-- Presupuesto -->
      <b-form-group id="it-presupuesto-grupo" label="Presupuesto:" label-for="it-presupuesto">
        <b-input-group prepend="$">
          <b-form-input
            id="it-presupuesto"
            v-model="form.presupuesto"
            required
            placeholder="Presupuesto"
            type="number"
          ></b-form-input>
        </b-input-group>
      </b-form-group>
      <!-- Fecha -->
      <b-form-group id="it-fecha-grupo" label="Fecha:" label-for="it-fecha">
        <b-form-input id="it-fecha" v-model="form.fecha" required placeholder="Fecha" type="date"></b-form-input>
      </b-form-group>
      <!-- Checkbox: Planeado - Realizado -->
      <b-form-group label="Estado:">
        <b-form-checkbox
          id="it-planeado"
          v-model="form.planeado"
          value="true"
          unchecked-value="false"
        >Planeado</b-form-checkbox>
        <b-form-checkbox
          id="it-realizado"
          v-model="form.realizado"
          value="true"
          unchecked-value="false"
        >Realizado</b-form-checkbox>
      </b-form-group>

      <!-- Botón de añadir -->
      <b-button block variant="primary" @click="guardar">Añadir</b-button>
    </b-form>
  </div>
</template>

<script>
import axios from "axios";
import { API_BASE_URL } from "@/config";
import Alertas from "@/sweetalertMethods";

export default {
  name: "InfoViaje",
  data() {
    return {
      form: {
        nombre: "",
        descripcion: "",
        lugar: "",
        presupuesto: "",
        fecha: "",
        planeado: "false",
        realizado: "false"
      }
    };
  },
  methods: {
    async guardar() {
      axios
        .post(API_BASE_URL + "/viajes", this.form)
        .then(response => {
          Alertas.successRedirect(this, "Nuevo viaje creado", "Inicio");
        })
        .catch(err => {
          Alertas.errorModal(this, "Ha ocurrido un problema", err.message);
        });
    }
  }
};
</script>

<style scoped>
.t-card {
  background-color: white;
  border-radius: 0 0 20px 20px;
  padding: 20px 0 20px 0;
}

h1 {
  margin: 40px 0 40px 0;
}

form {
  margin: 0 20px 0 20px;
}

button {
  margin: 0 0 20px 0;
}
</style>