<template>
    <!--<div id="register" class="tab-pane">-->
    <section class="user-login">
        <div class="user-login__wrap">
            <div id="responsiveTabsDemo" class="user-login__tabs">
                <ul>
                    <li class="active">
                        <a class="mb20" @click="loginrout()">LOGIN</a>
                    </li>
                    <li class="">
                        <a class="mb20" @click="signuprout()">REGISTER</a>
                    </li>
                </ul>
                <form id="signupfrom" class="user-login__form" @submit.prevent="submit">
                    <div class="user-login__fields">
                        <div>
                            <input
                                v-model="signupForm.first_name"
                                type="text"
                                required
                                class="input-field"
                                placeholder="First-Name*"
                            />
                        </div>
                        <div>
                            <input
                                v-model="signupForm.last_name"
                                type="text"
                                required
                                class="input-field"
                                placeholder="Last-Name*"
                            />
                        </div>
                        <div>
                            <input
                                v-model="signupForm.email"
                                type="email"
                                required
                                class="input-field"
                                placeholder="E-mail*"
                            />
                        </div>
                        <div>
                            <input
                                id="password-register"
                                v-model="signupForm.password"
                                type="password"
                                class="input-field"
                                required
                                name="password"
                                placeholder="Enter the password"
                            />
                            <i id="togglePassword-register" class="eye-toggle" />
                        </div>
                    </div>
                    <div class="user-login__checkbox register">
                        <button type="submit" class="bb bsl">Register</button>
                        <span class="or12">
                            By registering, you agree to the
                            <a href="#" class="lu">privacy policy</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--</div>-->
</template>

<script>
export default {
    name: "Signup",
    data() {
        return {
            signupForm: {
                first_name: "",
                last_name: "",
                email: "",
                password: "",
            },
        };
    },
    methods: {
        submit() {
            this.$auth
                .register({
                    data: this.signupForm,
                    fetchUser: true,
                })
                .then((res) => {
                    console.log(res);
                })
                .catch((res) => {
                    console.log(res);
                });
        },
        login() {
            if (this.$route.name !== "login") {
                this.$router.push("/login");
            }
        },
        signup() {
            if (this.$route.name !== "signup") {
                this.$router.push("/signup");
            }
        },
    },
};
</script>

<style scoped></style>

<style src="../../../css/user.css"></style>
