<template>
    <div class="site">
        <section class="cart">
            <h1 class="cart__title center mb42">SHOPPING CART</h1>
            <div class="order-steps center">
                <span class="or14 active">1. Shopping Cart</span>
                <span class="or14">2. Shipping</span>
                <span class="or14">3. Payment Method</span>
                <button class="lu remove-all" @click="cartItemAllRemove()">Remove all</button>
            </div>
            <div class="cart__wrap center">
                <div class="cart__left">
                    <div class="cart__top">
                        <span class="or14">Products</span>
                        <span class="or14">Price</span>
                        <span class="or14">Total</span>
                    </div>
                    <div v-for="item in cartProductsList" class="cart__item">
                        <div class="cart__item-left">
                            <div class="cart__image">
                                <a href="#"
                                    ><img
                                        class="lazy"
                                        :src="item.image"
                                        alt=""
                                        style="height: 120px"
                                /></a>
                            </div>
                            <div class="cart__info">
                                <a href="#" class="cart__name ob16">{{ item.name }}</a>
                                <div class="cart__amount amount-product">
                                    <button
                                        type="button"
                                        class="amount-minus"
                                        @click="decrementItemValue(item)"
                                    >
                                        <svg
                                            width="10"
                                            height="2"
                                            viewBox="0 0 10 2"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 1H9"
                                                stroke="white"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </button>
                                    <input
                                        :id="'count_' + item.id"
                                        data-max="10"
                                        name="amount"
                                        type="text"
                                        :value="item.qty"
                                        data-min="1"
                                    />
                                    <button
                                        type="button"
                                        class="amount-plus"
                                        @click="incrementItemValue(item)"
                                    >
                                        <svg
                                            width="10"
                                            height="10"
                                            viewBox="0 0 10 10"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 5H9M5 1L5 9"
                                                stroke="white"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </button>
                                </div>
                                <p
                                    style="cursor: pointer"
                                    class="cart__delete"
                                    title="remove"
                                    @click="checkoutCartItemRemove(item)"
                                >
                                    <svg class="cart__delete-icon">
                                        <svg
                                            id="delete"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 12 12"
                                        >
                                            <path
                                                d="M.17 1.001a.598.598 0 010-.832.598.598 0 01.833 0l4.995 5.003L11 .169a.587.587 0 01.824 0 .583.583 0 010 .832L6.83 5.996 11.825 11c.232.225.232.6 0 .833a.587.587 0 01-.824 0L5.998 6.829l-4.995 5.003a.598.598 0 01-.832 0 .598.598 0 010-.833l4.994-5.003L.171 1.001z"
                                            />
                                        </svg>
                                    </svg>
                                </p>
                            </div>
                        </div>
                        <div class="cart__price ob16">${{ item.price }}</div>
                        <div class="cart__price-total ob16">${{ item.price * item.qty }}</div>
                    </div>
                    <div v-if="is_login === true" class="cart__bottom">
                        <router-link v-if="isCheckoutHide" to="/shipping" class="bb bsl">
                            Proceed to checkout
                        </router-link>
                        <router-link to="/catalog" class="lu"> Continue the shopping </router-link>
                    </div>
                    <div v-else class="cart__bottom">
                        <button
                            v-if="isCheckoutHide"
                            id="myBtn"
                            class="bb bsl"
                            @click="openMOdal()"
                        >
                            Proceed to checkout
                        </button>
                        <router-link to="/catalog" class="lu"> Continue the shopping </router-link>
                    </div>
                </div>
                <div class="cart__right bg4">
                    <div class="cart-total">
                        <div class="cart-total__title mb20">TOTAL</div>
                        <div class="cart-total__items">
                            <div class="cart-total__subtitle">
                                <span class="ob14">Subtotal</span>
                                <span class="ob16">${{ totalCartAmount }}</span>
                            </div>
                            <div class="cart-total__subtitle">
                                <span class="ob14">Shipping</span>
                                <span class="or12">Calculated on checkout</span>
                            </div>
                            <div class="cart-total__subtitle">
                                <span class="ob14">Canada GST</span>
                                <span class="ob16">$4.19</span>
                            </div>
                        </div>
                        <div class="cart-total__bottom">
                            <span class="ob14">Total</span>
                            <span class="cart-total__red ob20">${{ totalCartAmount + 4.19 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- The Login Modal -->
        <div id="myLoginModal" class="modal">
            <div class="modal-segment">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Login</h2>
                        <span id="login-close" style="cursor: pointer">&times;</span>
                    </div>
                    <div class="modal-body">
                        <br />
                        <div>
                            <label>Email</label>
                            <input
                                v-model="loginForm.email"
                                type="email"
                                autofocus
                                required
                                name="email"
                                class="input-modal"
                                placeholder="E-mail*"
                                @input="$v.loginForm.email.$touch()"
                            />
                        </div>
                        <div v-if="$v.loginForm.email.$error">
                            <span style="color: red">Email is Required</span>
                        </div>
                        <br />
                        <div>
                            <label>Password</label>
                            <input
                                id="password"
                                v-model="loginForm.password"
                                type="password"
                                class="input-modal"
                                autofocus
                                required
                                name="password"
                                placeholder="Enter the password"
                                @input="$v.loginForm.password.$touch()"
                            />
                            <i id="togglePassword" class="eye-toggle" />
                        </div>
                        <div v-if="$v.loginForm.password.$error">
                            <span style="color: red">Password is Required</span>
                        </div>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <div class="row">
                            <button type="submit" class="bb bsl" @click="login()">Log in</button>
                            <p>
                                Don't have an account?
                                <a id="sign-up" style="cursor: pointer; color: blue">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Sign UP Modal -->
        <div id="mySignUpModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Sign Up</h2>
                    <span id="sign-up-close" style="cursor: pointer">&times;</span>
                </div>
                <div class="modal-body">
                    <br />
                    <div>
                        <label>First Name</label>
                        <input
                            v-model="signupForm.first_name"
                            type="text"
                            autofocus
                            required
                            name="first_name"
                            class="input-modal"
                            placeholder="First Name*"
                            @input="$v.signupForm.first_name.$touch()"
                        />
                    </div>
                    <div v-if="$v.signupForm.first_name.$error">
                        <span style="color: red">First Name is Required</span>
                    </div>
                    <br />
                    <div>
                        <label>Last Name</label>
                        <input
                            v-model="signupForm.last_name"
                            type="text"
                            autofocus
                            required
                            name="last_name"
                            class="input-modal"
                            placeholder="Last Name"
                            @input="$v.signupForm.last_name.$touch()"
                        />
                    </div>
                    <div v-if="$v.signupForm.last_name.$error">
                        <span style="color: red">Last Name is Required</span>
                    </div>
                    <br />
                    <div>
                        <label>Email</label>
                        <input
                            v-model="signupForm.email"
                            type="email"
                            autofocus
                            required
                            name="email"
                            class="input-modal"
                            placeholder="E-mail*"
                            @input="$v.signupForm.email.$touch()"
                        />
                    </div>
                    <div v-if="$v.signupForm.email.$error">
                        <span style="color: red">Email is Required</span>
                    </div>
                    <br />
                    <div>
                        <label>Password</label>
                        <input
                            id="password-reg"
                            v-model="signupForm.password"
                            type="password"
                            class="input-modal"
                            autofocus
                            required
                            name="password"
                            placeholder="Enter the password"
                            @input="$v.signupForm.password.$touch()"
                        />
                        <i id="togglePasswordeye" class="eye-toggle" />
                    </div>
                    <div v-if="$v.signupForm.password.$error">
                        <span style="color: red">Password is Required</span>
                    </div>
                </div>
                <br />
                <div class="modal-footer">
                    <div class="row">
                        <button type="submit" class="bb bsl" @click="singup()">Sign Up</button>
                        <p>
                            Already have an account?
                            <a id="log-in" style="cursor: pointer; color: blue">Log In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import helper from "../../services/helper";
// import "../../main";
import { required, email } from "vuelidate/lib/validators";
export default {
    name: "ShoppingCard",

    data() {
        return {
            defaultCategoryId: 0,
            categoryList: [],
            productsList: [],
            cartProductsList: [],
            cartProductsIds: [],
            totalCartAmount: 0,
            valid: false,
            isCheckoutHide: false,
            dialogBillingAddress: true,
            is_login: null,
            loginForm: new Form({
                email: "",
                password: "",
                cartData: JSON.parse(localStorage.getItem("cart")),
            }),
            signupForm: new Form({
                first_name: "",
                last_name: "",
                email: "",
                password: "",
                type: "1",
            }),
        };
    },
    validations: {
        signupForm: {
            first_name: { required },
            last_name: { required },
            email: { required, email },
            password: { required },
        },
        loginForm: {
            password: { required },
            email: { required, email },
        },
    },
    created() {
        this.$root.$refs.cart = this;
    },
    mounted() {
        var amount = 0;
        var cart = JSON.parse(localStorage.getItem("cart"));
        $.each(cart, function (key, value) {
            amount += value.qty * value.price;
        });
        this.totalCartAmount = amount;
        if (cart && cart.length > 0) {
            this.cartProductsList = cart;
            this.isCheckoutHide = true;
        } else {
            this.isCheckoutHide = false;
        }
        var cart = JSON.parse(localStorage.getItem("cartItemIds"));
        if (cart && cart.length > 0) {
            this.cartProductsIds = cart;
        }
        this.is_login = JSON.parse(sessionStorage.getItem("is_login"));
    },
    methods: {
        updateCartList: function () {
            this.cartProductsList = JSON.parse(localStorage.getItem("cart"));
            this.cartProductsIds = JSON.parse(localStorage.getItem("cartItemIds"));
            var data = [];
            data = helper.calculateCartAmount(this.cartProductsList);
            this.totalCartAmount = data["amount"];
            this.totalCartItems = data["count"];
            if (this.totalCartItems < 1) {
                this.isCheckoutHide = false;
            }
        },
        cartItemAllRemove() {
            var scope = this;
            scope.cartProductsList = [];
            scope.cartProductsList = [];

            localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
            localStorage.setItem("cartItemIds", JSON.stringify(scope.cartProductsList));
            this.$root.$refs.header.updateCartList();
            scope.totalCartItems = scope.cartProductsList.length;
            var data = [];
            data = helper.calculateCartAmount(scope.cartProductsList);
            scope.totalCartAmount = data["amount"];
            scope.totalCartItems = data["count"];
            scope.isCheckoutHide = false;
            this.$toastr.s("Removed Successfully");
            this.$root.$refs.header.updateCartList();
        },
        loginDropdown() {},
        checkoutCartItemRemove(item) {
            var scope = this;
            if (scope.cartProductsList.includes(item)) {
                var prodIndex = scope.cartProductsList.indexOf(item);
            }
            if (prodIndex > -1) {
                scope.cartProductsList.splice(prodIndex, 1);
                scope.cartProductsIds.splice(scope.cartProductsIds.indexOf(item.id), 1);
                localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
                localStorage.setItem("cartItemIds", JSON.stringify(scope.cartProductsIds));
                scope.totalCartItems = scope.cartProductsList.length;
                if (scope.cartProductsList.length < 1) {
                    scope.isCheckoutHide = false;
                }
                var data = [];
                data = helper.calculateCartAmount(scope.cartProductsList);
                scope.totalCartAmount = data["amount"];
                scope.totalCartItems = data["count"];
                this.$toastr.s("Removed from Cart");
                this.$root.$refs.header.updateCartList();
            }
        },
        incrementItemValue(item) {
            var scope = this;
            var incrementCount = $("#count_" + item.id).val();
            scope.totalCartAmount += item.price;
            incrementCount++;
            $("#count_" + item.id).val(incrementCount);
            if (scope.cartProductsList.includes(item)) {
                var index = scope.cartProductsList.indexOf(item);
                scope.cartProductsList[index]["qty"] = incrementCount;
                localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
                this.$root.$refs.header.updateCartList();
            }
        },
        decrementItemValue(item) {
            var scope = this;
            var decrementCount = $("#count_" + item.id).val();
            if (decrementCount > 1) {
                scope.totalCartAmount -= item.price;
                decrementCount--;
                $("#count_" + item.id).val(decrementCount);
                if (scope.cartProductsList.includes(item)) {
                    var index = scope.cartProductsList.indexOf(item);
                    scope.cartProductsList[index]["qty"] = decrementCount;
                    localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
                    this.$root.$refs.header.updateCartList();
                }
            }
        },
        openMOdal() {
            var modal = document.getElementById("myLoginModal");
            var signUpModal = document.getElementById("mySignUpModal");

            // Get the button that opens the modal
            var loginbtn = document.getElementById("log-in");
            var signUp = document.getElementById("sign-up");

            // Get the <span> element that closes the modal
            var login = document.getElementById("login-close");
            var signUpClose = document.getElementById("sign-up-close");

            // When the user clicks the button, open the modal
            modal.style.display = "block";
            signUpModal.style.display = "none";

            // When the user clicks the button, open the modal
            loginbtn.onclick = function () {
                modal.style.display = "block";
                signUpModal.style.display = "none";
            };

            // When the user clicks the sign up button, open the modal
            signUp.onclick = function () {
                modal.style.display = "none";
                signUpModal.style.display = "block";
            };

            // When the user clicks on login (x), close the modal
            login.onclick = function () {
                modal.style.display = "none";
            };

            // When the user clicks on sign up (x), close the modal
            signUpClose.onclick = function () {
                signUpModal.style.display = "none";
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    signUpModal.style.display = "none";
                }
            };
        },
        login() {
            this.$v.loginForm.$touch();
            if (!this.$v.loginForm.$error) {
                this.loginForm.post("/api/auth/login").then((response) => {
                    if (response.user == null) {
                        this.$toastr.e("Invalid Email");
                    } else if (response.user != null && response.success == false) {
                        this.$toastr.e("Invalid Password");
                    } else {
                        localStorage.setItem("auth_token", response.token);
                        axios.defaults.headers.common["Authorization"] =
                            "Bearer " + localStorage.getItem("auth_token");
                        localStorage.setItem("user", JSON.stringify(response.user));
                        sessionStorage.setItem("is_login", true);
                        this.$toastr.s("Login successfully");
                        this.is_login = true;
                        var modal = document.getElementById("myLoginModal");
                        modal.style.display = "none";
                    }
                });
            }
        },
        singup() {
            this.$v.signupForm.$touch();
            if (!this.$v.signupForm.$error) {
                this.signupForm
                    .post("/api/auth/signup")
                    .then((response) => response)
                    .then(
                        (response) => {
                            if (response.success == true) {
                                localStorage.setItem("auth_token", response.token);
                                localStorage.setItem("user", JSON.stringify(response.user));
                                axios.defaults.headers.common["Authorization"] =
                                    "Bearer " + localStorage.getItem("auth_token");
                                sessionStorage.setItem("is_login", true);
                                this.$toastr.s("Login successfully");
                                this.is_login = true;
                                var signUpModal = document.getElementById("mySignUpModal");
                                signUpModal.style.display = "none";
                            } else {
                                this.$toastr.e(response.message);
                            }
                        },
                        function (error) {}
                    );
            }
        },
    },
};
</script>

<style scoped src="../../../css/modal.css"></style>
<style src="../../../css/cart.css"></style>
