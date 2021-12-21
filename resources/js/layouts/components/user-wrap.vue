<template>
    <div>
        <div class="user-block" @click="changeActiveUserClassStatus">
            <svg class="user-block__icon" :class="{ active: activeUserClass }">
                <svg id="user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M17.071 12.929a9.963 9.963 0 00-3.8-2.384 5.78 5.78 0 002.51-4.764A5.788 5.788 0 0010 0a5.788 5.788 0 00-5.781 5.781 5.78 5.78 0 002.51 4.764 9.962 9.962 0 00-3.8 2.384A9.935 9.935 0 000 20h1.563c0-4.652 3.785-8.438 8.437-8.438 4.652 0 8.438 3.786 8.438 8.438H20a9.935 9.935 0 00-2.929-7.071zM10 10a4.224 4.224 0 01-4.219-4.219A4.224 4.224 0 0110 1.563a4.224 4.224 0 014.219 4.218A4.224 4.224 0 0110 10z"
                    />
                </svg>
            </svg>
            <div
                id="show-login-dropdown"
                class="user-block__wrap"
                :class="{ active: activeUserClass }"
            >
                <div v-if="!$auth.check()"
                    class="user-block__title ob14 not__auth"
                    style="color: #8b8b8b"
                >
                    <a class="ob14" @click="removeLoginDropdown()">Log In </a> /
                    <a class="ob14" @click="removeSignupDropdown()"> Register</a>
                </div>
                <div v-else
                    class="user-block__title ob14"
                    style="color: #8b8b8b"
                >
                    <a class="ob14" @click="removeLoginDropdown()">Log Out </a>
                </div>
                <div v-if="$auth.check()">
                    <a href="#" class="user-block__link">
                        <span class="user-block__link-icon">
                            <svg>
                                <use xlink:href="#user" />
                            </svg>
                        </span>
                        <span class="user-block__history or14">Personal account</span>
                    </a>
                    <a href="#" class="user-block__link">
                        <span class="user-block__link-icon">
                            <svg>
                                <use xlink:href="#cart" />
                            </svg>
                        </span>
                        <span class="user-block__history or14">Order History</span>
                    </a>

                    <a href="#" class="user-block__link favorite-mob">
                        <span class="user-block__link-icon">
                            <svg class="favorite-mob__icon">
                                <use xlink:href="#wishlist" />
                            </svg>
                        </span>
                        <i class="favorite-mob__item">0</i>
                        <span class="user-block__history or14">Wish List</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "vuex";
export default {
    name: "UserWrapComponent",
    computed: {
        ...store.mapState("header", ["activeUserClass"]),
    },
    methods: {
        changeActiveUserClassStatus(e) {
            e.stopPropagation();
            this.$store.dispatch("header/changeActiveUserClassStatus");
        },
        removeLoginDropdown(e) {
            this.$store.dispatch("header/changeActiveUserClassStatus");
            if (this.$route.name !== "login") {
                this.$router.push("/login");
            }
        },
        removeSignupDropdown(e) {
            this.$store.dispatch("header/changeActiveUserClassStatus");
            if (this.$route.name !== "signup") {
                this.$router.push("/signup");
            }
        },
    },
};
</script>

<style>
.not__auth {
    padding-bottom: 0px !important;
    margin-bottom: 0px !important;
    border-bottom: 0px !important;
}
</style>
