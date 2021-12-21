import Vue from "vue";
import VueRouter from "vue-router";
import vuetify from "vuetify";
import router from "./routes/router";
import Vuelidate from "vuelidate";
import bootstrapvue from "bootstrap-vue";
import VueToastr from "vue-toastr";
import VueLocalStorage from "vue-localstorage";
import axios from "./services/axios.js";
import auth from "./services/auth.js";
import store from "./store";
import VModal from "vue-js-modal";

require("./bootstrap");
Vue.use(VueRouter);
// Vue.use(vuetify);
// Vue.use(bootstrapvue);
Vue.use(Vuelidate);
Vue.use(VueToastr);
Vue.use(VModal);
Vue.use(VueLocalStorage, {
    bind: true,
});

Vue.component("Pagination", require("laravel-vue-pagination"));

new Vue({
    el: "#app",
    // vuetify: new vuetify(),
    router: router,
    axios: axios,
    auth: auth,
    store: store,
});