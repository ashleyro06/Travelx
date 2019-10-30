<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="faded">
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item :to="{name: 'Inicio'}">
            <a :class="[inicio]">Inicio</a>
          </b-nav-item>
          <b-nav-item :to="{name: 'Buscar'}">
            <a :class="[buscar]">Buscar</a>
          </b-nav-item>
          <b-nav-item :to="{name: 'Nuevo'}">
            <a :class="[nuevo]">Nuevo</a>
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  updated() {
    this.$route.name == "Buscar"
      ? (this.buscar = "t-clase-activa")
      : (this.buscar = "t-clase-inactiva");
    this.$route.name == "Inicio"
      ? (this.inicio = "t-clase-activa")
      : (this.inicio = "t-clase-inactiva");
    this.$route.name == "Nuevo"
      ? (this.nuevo = "t-clase-activa")
      : (this.nuevo = "t-clase-inactiva");
  },
  data() {
    return {
      buscar: "",
      inicio: "",
      nuevo: ""
    };
  }
};
</script>

<style scoped>
/** Created */
.t-clase-activa {
  color: rgb(174, 213, 245) !important;
}
.t-clase-activa:hover {
  cursor: default;
}

.t-clase-inactiva {
  color: white !important;
}
/* 
.t-clase-inactiva:hover {
  cursor: default;
} */

/***************/
/** Bootstrap */
/*************/
.navbar {
  border-radius: 0 0 5px 5px;
  border-bottom: 1px inset rgb(50, 86, 110);
}

.nav-item:hover {
  background-color: rgb(20, 35, 46);
  color: white;
}
</style>