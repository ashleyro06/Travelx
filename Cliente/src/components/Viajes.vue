<template>
  <div class="t-group">
    <b-card no-body class="overflow-hidden t-card" style="max-width: 840px;">
      <b-row no-gutters>
        <!-- Imagen -->
        <b-col md="4" class="t-img">
          <b-card-img :src="fotoUrl" class="rounded-0"></b-card-img>
        </b-col>
        <b-col md="8">
          <b-card-body :title="viaje.nombre">
            <!-- Descripción -->
            <label for="it-descripcion">Descripción</label>
            <p class="text-left">{{ viaje.descripcion }}</p>
            <!-- Fecha -->
            <label for="it-fecha">Fecha</label>
            <b-form-input readonly v-model="viaje.fecha" type="date" id="it-fecha"></b-form-input>
            <!-- Lugar -->
            <label for="it-lugar">Lugar</label>
            <p class="text-left" id="it-lugar">{{ viaje.lugar }}</p>
            <!-- Presupuesto -->
            <label for="it-presupuesto">Presupuesto</label>
            <p class="text-left">$ {{ viaje.presupuesto }}</p>
            <!-- Estado -->
            <label for="it-estado">Estado:</label>
            <p id="it-estado">
              <b-badge variant="light">
                <unicon :name="planeado"></unicon>Planeado
              </b-badge>
              <b-badge variant="light">
                <unicon :name="realizado"></unicon>Realizado
              </b-badge>
            </p>
          </b-card-body>
        </b-col>
      </b-row>
    </b-card>
    <!-- Más acciones | Eliminar | Editar -->
    <div class="t-actions-group">
      <b-button>
        <unicon name="edit" @click="$emit('editar-viaje')"></unicon>
      </b-button>
      <b-button @click="$emit('eliminar-viaje')">
        <unicon name="trash-alt"></unicon>
      </b-button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Viaje",
  props: {
    viaje: Object
  },
  computed: {
    fotoUrl() {
      return this.viaje.foto + "?sig=" + Math.random();
    },
    planeado() {
      if (this.viaje.planeado) {
        return "check-square";
      } else {
        return "square-full";
      }
    },
    realizado() {
      if (this.viaje.realizado) {
        return "check-square";
      } else {
        return "square-full";
      }
    }
  }
};
</script>

<style scoped>
.t-card {
  margin: 10px 0 20px 0;
  width: 100%;
}

.t-group {
  display: flex;
  justify-content: center;
  align-items: center;
}

.t-actions-group {
  display: flex;
  flex-flow: column nowrap;
}

h4 {
  color: rgb(6, 111, 138);
}

p {
  text-justify: newspaper;
}

label {
  color: gray;
  font-size: 12px;
}

.t-img {
  display: flex;
  justify-content: center;
  align-content: center;
}

#it-estado {
  width: 100%;
  display: flex;
  justify-content: space-evenly;
}

.t-dropdown {
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
</style>