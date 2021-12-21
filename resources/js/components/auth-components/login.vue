<template>
    <section class="user-login">
        <div class="user-login__wrap">
            <div id="responsiveTabsDemo" class="user-login__tabs">
                <ul>
                    <li class="active">
                        <a class="mb20" @click="login()">LOGIN</a>
                    </li>
                    <li class="">
                        <a class="mb20" @click="signup()">REGISTER</a>
                    </li>
                </ul>
                <form id="loginform" class="user-login__form" @submit.prevent="submit">
                    <div class="user-login__fields">
                        <div>
                            <input
                                v-model="loginForm.email"
                                type="email"
                                autofocus
                                required
                                name="email"
                                class="input-field"
                                placeholder="E-mail*"
                            />
                        </div>
                        <div>
                            <input
                                id="password"
                                v-model="loginForm.password"
                                type="password"
                                class="input-field"
                                autofocus
                                required
                                name="password"
                                placeholder="Enter the password"
                            />
                            <i id="togglePassword" class="eye-toggle" />
                        </div>
                    </div>
                    <div class="user-login__checkbox login">
                        <div>
                            <input id="checkbox-2" type="checkbox" name="checkbox" checked />
                            <label class="or12" for="checkbox-2">Remember me</label>
                            <a href="recover.html#recover-path" class="lu lost-pass"
                                >Lost your password?</a
                            >
                        </div>
                        <button type="submit" class="bb bsl">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            loginForm: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        submit() {
            this.$auth
                .login({
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
