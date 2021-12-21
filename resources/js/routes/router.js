import Vue from "vue";
import VueRouter from "vue-router";
import frontRoutes from "./front";
import adminRoutes from "./admin";
Vue.use(VueRouter);

const routes = [frontRoutes, adminRoutes];

const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    mode: "history",
});

Vue.router = router;

export default router;