<template>
    <div>
        <section class="header">
            <div class="header__wrap center">
                <div class="header__left">
                    <router-link to="/" class="logo">
                        <img
                            class="lazy"
                            width="100"
                            height="71"
                            src="/images/Logo.png"
                            alt="MEGATEX"
                        />
                    </router-link>
                </div>
                <div class="header__block">
                    <div class="menu-top">
                        <nav class="menu-top__nav">
                            <ul class="ul-1">
                                <li>
                                    <router-link to="/about">About us</router-link>
                                </li>
                                <li>
                                    <router-link to="/catalog"> Catalog </router-link>
                                </li>
                                <li>
                                    <router-link to="/manufacturing">Manufacturing</router-link>
                                </li>
                                <li>
                                    <router-link to="/distribution"> Distribution </router-link>
                                </li>
                                <li>
                                    <router-link to="/contact"> Contact us </router-link>
                                </li>
                                <li>
                                    <router-link to="/careers"> Careers </router-link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header__right">
                    <div class="locale">
                        <a href="javascript:void(0);" class="locale__item ob14 active">en</a>
                        <a href="javascript:void(0);" class="locale__item ob14">fr</a>
                    </div>
                    <div class="header__sub">
                        <a href="javascript:void(0);" class="favorite">
                            <svg class="favorite__icon">
                                <svg
                                    id="wishlist"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 22 20"
                                >
                                    <path
                                        d="M20.054 1.948A6.773 6.773 0 0015.26 0a6.793 6.793 0 00-4.238 1.457A6.871 6.871 0 006.779 0C4.952 0 3.245.692 1.973 1.948A6.599 6.599 0 000 6.68c0 1.796.7 3.476 1.973 4.732l8.467 8.36a.795.795 0 001.118.001l8.475-8.341A6.7 6.7 0 0022 6.691a6.697 6.697 0 00-1.946-4.744zm-1.145 8.384L11 18.115l-7.91-7.808A5.058 5.058 0 011.584 6.68a5.06 5.06 0 011.509-3.628c.973-.96 2.283-1.49 3.687-1.49 1.383 0 2.695.532 3.694 1.497a.799.799 0 001.113-.007 5.191 5.191 0 013.674-1.49c1.396 0 2.701.53 3.668 1.484.96.97 1.49 2.265 1.49 3.647a5.15 5.15 0 01-1.51 3.639z"
                                    />
                                </svg>
                            </svg>

                            <i class="favorite__item">{{ wishListProducts.length }}</i>
                        </a>
                        <CartMini />
                        <UserWrap />
                    </div>
                </div>
            </div>
        </section>
        <div class="burger-icon-wrap center" @click="changeActiveBurgerClassStatus">
            <button class="burger-icon" :class="{ opened: activeBurgerClass }">
                <span />
                <span />
                <span />
            </button>
        </div>

        <div class="burger-block" :class="{ opened: activeBurgerClass }">
            <div class="burger-block__overlay" @click="changeActiveBurgerClassStatus" />
            <button class="burger-block__close" @click="changeActiveBurgerClassStatus">
                <svg class="sure-modal-icon">
                    <use xlink:href="#delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" id="delete">
                            <path
                                d="M.17 1.001a.598.598 0 010-.832.598.598 0 01.833 0l4.995 5.003L11 .169a.587.587 0 01.824 0 .583.583 0 010 .832L6.83 5.996 11.825 11c.232.225.232.6 0 .833a.587.587 0 01-.824 0L5.998 6.829l-4.995 5.003a.598.598 0 01-.832 0 .598.598 0 010-.833l4.994-5.003L.171 1.001z"
                            ></path>
                        </svg>
                    </use>
                </svg>
            </button>
            <div class="burger-block__inner">
                <nav class="burger-block__nav">
                    <ul class="burger-ul-1">
                        <li>
                            <a href="javascript:void(0);"
                                @click="changeActiveBurgerClassStatus('about')">About us</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                @click="changeActiveBurgerClassStatus('catalog')">Catalog</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                @click="changeActiveBurgerClassStatus('manufacturing')">Manufacturing</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                @click="changeActiveBurgerClassStatus('distribution')">Distribution</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                @click="changeActiveBurgerClassStatus('contact')">Contact us</a>
                        </li>
                        <li>
                            <a
                                href="javascript:void(0);"
                                @click="changeActiveBurgerClassStatus('careers')"
                                >Careers</a
                            >
                        </li>
                    </ul>

                    <div class="locale-mob">
                        <a href="javascript:void(0);" class="locale-mob__item ob14 active">en</a>
                        <a href="javascript:void(0);" class="locale-mob__item ob14">fr</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import UserWrap from "./../components/user-wrap.vue";
import CartMini from "./../components/cart-mini.vue";
import store from "vuex";

export default {
    name: "HeaderComponent",
    components: {
        UserWrap,
        CartMini,
    },
    data() {
        return {
            wishListProducts: [],
        };
    },
    computed: {
        ...store.mapState("header", ["activeBurgerClass"]),
    },
    created() {
        this.$root.$refs.header = this;
    },
    methods: {
        changeActiveBurgerClassStatus(e) {
            if (typeof e === "string" && this.$route.name !== e) {
                this.$store.dispatch("header/changeActiveBurgerClassStatus");
                this.$router.push(e);
            } else {
                this.$store.dispatch("header/changeActiveBurgerClassStatus");
            }
        },
    },
};
</script>

<style scoped></style>
<style src="../../../css/user.css"></style>
