import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

/** Added */

import axios from "axios";
import VueAxios from "vue-axios";

import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";

import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

import Unicon from "vue-unicons";
import {
  uniCheckSquare,
  uniMapPinAlt,
  uniSquareFull,
  uniEdit,
  uniTrashAlt,
  uniCog,
  uniSearch
} from "vue-unicons/src/icons";

require("./assets/css/global.css");

Vue.config.productionTip = false;

/** Axios */
Vue.use(VueAxios, axios);

/** Sweetalert */
Vue.use(VueSweetalert2);

/** Bootstrap */
Vue.use(BootstrapVue);

/** Unicon */
Unicon.add([
  uniCheckSquare,
  uniMapPinAlt,
  uniSquareFull,
  uniEdit,
  uniTrashAlt,
  uniCog,
  uniSearch
]);
Vue.use(Unicon);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
