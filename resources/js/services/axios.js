import Vue from "vue";
import axios from "axios";
import VueAxios from "vue-axios";

axios.defaults.baseURL = window.location.protocol + '//' + window.location.host + "/api";

Vue.use(VueAxios, axios);
export default {
    root: axios.defaults.baseURL,
};