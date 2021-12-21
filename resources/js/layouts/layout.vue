<template>
    <div @click="changeAllActiveStatus">
        <Header />
        <transition>
            <router-view />
        </transition>
        <Footer />
    </div>
</template>

<script>
import Header from "./front/header.vue";
import Footer from "./front/footer.vue";
import helper from "./../services/helper";

export default {
    name: "DefaultPage",
    components: {
        Header,
        Footer,
    },
    methods: {
        changeAllActiveStatus(e) {
            this.$store.dispatch('header/changeAllActiveClassStatus', false);
        }
    }
};
</script>

<style src="../../css/global.css"></style>
