<template>
    <div v-if="isLogin" style="font-family: Nunito">
        <side-bar />
        <transition>
            <router-view />
        </transition>
    </div>
</template>

<script>
import SideBar from "./side-bar";

export default {
    name: "Common",
    components: { SideBar },
    data() {
        return {
            isLogin: false,
        };
    },
    beforeCreate: function () {
        document.body.className = "admin";
    },
    mounted() {
        this.checkAuth();
    },
    methods: {
        checkAuth() {
            axios
                .get("/api/auth/check")
                .then((response) => response.data)
                .then((response) => {
                    this.isLogin = true;
                })
                .catch((error) => {
                    this.$router.push("/login");
                });
        },
    },
};
</script>

<style>
.admin-layout {
    background-color: #f2f7ff !important;
}
</style>

<style scoped></style>
<style src="../../../css/global.css"></style>
