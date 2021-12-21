import Vue from "vue";

import auth from "@websanova/vue-auth/dist/v2/vue-auth.esm.js";
import authBearer from "@websanova/vue-auth/dist/drivers/auth/bearer.esm.js";
import httpAxios from "@websanova/vue-auth/dist/drivers/http/axios.1.x.esm.js";
import routerVueRouter from "@websanova/vue-auth/dist/drivers/router/vue-router.2.x.min.js";

Vue.use(auth, {
    plugins: {
        http: Vue.axios,
        router: Vue.router,
    },
    drivers: {
        auth: authBearer,
        http: httpAxios,
        router: routerVueRouter,
    },
    options: {
        rolesKey: "role",
        registerData: {
            url: "auth/register",
            method: "POST",
            redirect: "/",
            autoLogin: false,
        },
        refreshData: {
            url: 'auth/refresh',
            method: 'GET',
            enabled: true,
            interval: 30
        },
    },
});

export default {};