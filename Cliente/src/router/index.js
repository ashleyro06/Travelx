import Vue from "vue";
import VueRouter from "vue-router";
import Inicio from "../views/Inicio.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Inicio",
    component: Inicio
  },
  {
    path: "/nuevo",
    name: "Nuevo",
    component: () =>
      import(/* webpackChunkName: "Vuevo" */ "../views/Nuevo.vue")
  },
  {
    path: "/buscar",
    name: "Buscar",
    component: () =>
      import(/* webpackChunkName: "Buscar" */ "../views/Buscar.vue")
  },
  {
    path: "/editar",
    name: "Editar",
    component: () =>
      import(/* webpackChunkName: "Editar" */ "../views/Editar.vue")
  },
  {
    path: "*",
    name: "PagNoEncontrada",
    component: () =>
      import(
        /* webpackChunkName: "PaginaNoEncontrada" */ "../components/PageNotFound.vue"
      )
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
