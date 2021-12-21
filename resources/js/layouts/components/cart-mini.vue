<template>
    <div class="cart-mini" @click="changeActiveCartClassStatus">
        <svg class="cart-mini__icon cart-show" :class="{ active: activeCartClass }">
            <svg id="cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M19.858 4.53a.756.756 0 00-.599-.287H4.198V5.64h14.045l-1.524 4.476H5.26v1.398h12a.738.738 0 00.706-.485l2-5.874a.668.668 0 00-.107-.626zM6.864 15.431c-1.334 0-2.42 1.025-2.42 2.285 0 1.26 1.086 2.284 2.42 2.284 1.335 0 2.42-1.025 2.42-2.284 0-1.26-1.085-2.285-2.42-2.285zm0 3.17c-.517 0-.938-.397-.938-.885 0-.489.42-.886.938-.886s.938.397.938.886c0 .488-.42.886-.938.886zm8.791-3.17c-1.335 0-2.42 1.025-2.42 2.285 0 1.26 1.085 2.284 2.42 2.284 1.333 0 2.42-1.025 2.42-2.284 0-1.26-1.087-2.285-2.42-2.285zm0 3.17c-.518 0-.939-.397-.939-.885 0-.489.42-.886.939-.886.517 0 .938.397.938.886 0 .488-.421.885-.938.885z"
                />
                <path
                    d="M5.802 14.732h11.531c.41 0 .74-.313.74-.7 0-.385-.33-.698-.74-.698h-10.9L4.311 1.054a.72.72 0 00-.605-.577L.867.01C.465-.056.082.2.012.58c-.07.38.2.742.603.808l2.32.381 2.137 12.376a.73.73 0 00.731.587z"
                />
            </svg>
        </svg>
        <i class="cart-mini__amount-item">{{ totalCartItems }}</i>

        <form id="cart-show" :class="{ active: activeCartClass }">
            <div class="cart-mini__wrap">
                <div v-if="totalCartItems < 1">
                    <p style="text-align: center; font-size: 65px; color: black; height: 0px">
                        Your cart is Empty
                    </p>
                </div>

                <div style="overflow-y: auto; height: 200px">
                    <div v-for="item in cartProductsList" class="cart-mini__item" :key="item.id">
                        <div class="cart-mini__image">
                            <a href="#"
                                ><img class="lazy" width="58" height="52" :src="item.image" alt=""
                            /></a>
                        </div>
                        <div class="cart-mini__block">
                            <a href="#" class="cart-mini__title ob12">{{ item.name }}</a>
                            <div class="cart-mini__price ob12">${{ item.price }}</div>
                        </div>
                        <div class="cart-mini__amount amount-product">
                            <button type="button" class="amount-minus" @click="decrementItem(item)">
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
                            <button type="button" class="amount-plus" @click="incrementItem(item)">
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
                            class="cart-mini__delete"
                            @click="cartItemRemove(item)"
                        >
                            <svg
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M0.170947 1.00134C-0.0540527 0.776337 -0.0540527 0.401861 0.170947 0.168994C0.403814 -0.0560059 0.770423 -0.0560059 1.00329 0.168994L5.99787 5.17197L11.0008 0.168994C11.2258 -0.0560059 11.6003 -0.0560059 11.8248 0.168994C12.0577 0.401861 12.0577 0.776861 11.8248 1.00134L6.83021 5.99644L11.8248 10.9994C12.0577 11.2244 12.0577 11.5989 11.8248 11.8318C11.5998 12.0568 11.2253 12.0568 11.0008 11.8318L5.99787 6.82879L1.00329 11.8318C0.770423 12.0568 0.403814 12.0568 0.170947 11.8318C-0.0540527 11.5989 -0.0540527 11.2239 0.170947 10.9994L5.16553 5.99644L0.170947 1.00134Z"
                                    fill="#1C1C1C"
                                />
                            </svg>
                        </p>
                    </div>
                </div>
                <div class="cart-mini__bottom">
                    <div class="cart-mini__total">
                        <div class="cart-mini__total-title ob16">TOTAL:</div>
                        <div class="cart-mini__total-price ob16" data-total-price="1&nbsp;040">
                            ${{ totalCartAmount }}
                        </div>
                    </div>
                    <p
                        v-if="isEmptyCart"
                        style="cursor: pointer"
                        class="cart-mini__order sb"
                        @click="checkout()"
                    >
                        Proceed to checkout
                    </p>
                    <router-link v-else to="/distribution" class="cart-mini__order sb">
                        Continue Shopping
                    </router-link>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import store from "vuex";
export default {
    name: "CartComponent",
    data() {
        return {
            productsList: [],
            cartProductsList: [],
            totalCartAmount: 0,
            totalCartItems: 0,
            isEmptyCart: true,
            cartProductsIds: [],
            cartItemsIncrementCount: [],
            quantity: 1,
        };
    },
    computed: {
        ...store.mapState("header", ["activeCartClass"]),
    },
    methods: {
        changeActiveCartClassStatus(e) {
            e.stopPropagation();
            this.$store.dispatch("header/changeActiveCartClassStatus");
        },
    },
    // mounted() {
    //     this.cartProductsList = JSON.parse(localStorage.getItem("cart"));
    //     this.cartProductsIds = JSON.parse(localStorage.getItem("cartItemIds"));
    //     this.wishListProducts = JSON.parse(localStorage.getItem("wishList"));
    //     var data = [];
    //     data = helper.calculateCartAmount(this.cartProductsList);
    //     this.totalCartAmount = data["amount"];
    //     this.totalCartItems = data["count"];
    //     if (this.totalCartItems < 1) {
    //         this.isEmptyCart = false;
    //     } else {
    //         this.isEmptyCart = true;
    //     }
    // },
    // methods: {
    //     updateCartList: function () {
    //         this.cartProductsList = JSON.parse(localStorage.getItem("cart"));
    //         this.cartProductsIds = JSON.parse(localStorage.getItem("cartItemIds"));
    //         this.wishListProducts = JSON.parse(localStorage.getItem("wishList"));
    //         var data = [];
    //         data = helper.calculateCartAmount(this.cartProductsList);
    //         this.totalCartAmount = data["amount"];
    //         this.totalCartItems = data["count"];
    //         if (this.totalCartItems < 1) {
    //             this.isEmptyCart = false;
    //         } else {
    //             this.isEmptyCart = true;
    //         }
    //     },
    //     removeLoginDropdown() {
    //         $("#show-login-dropdown").toggleClass("active");
    //         this.$router.push("/login");
    //     },
    //     removeSignupDropdown() {
    //         $("#show-login-dropdown").toggleClass("active");
    //         this.$router.push("/signup");
    //     },
    //     getImgUrl() {
    //         return require("../../../asset/images/LOGO.png");
    //     },
    //     cartItemRemove(item) {
    //         var scope = this;
    //         if (scope.cartProductsList.includes(item)) {
    //             var prodIndex = scope.cartProductsList.indexOf(item);
    //         }
    //         if (prodIndex > -1) {
    //             scope.cartProductsList.splice(prodIndex, 1);
    //             scope.cartProductsIds.splice(scope.cartProductsIds.indexOf(item.id), 1);
    //             localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
    //             localStorage.setItem("cartItemIds", JSON.stringify(scope.cartProductsIds));
    //             scope.totalCartItems = scope.cartProductsList.length;
    //             if (scope.cartProductsList.length < 1) {
    //                 scope.isEmptyCart = false;
    //             }
    //             var data = [];
    //             data = helper.calculateCartAmount(this.cartProductsList);
    //             this.totalCartAmount = data["amount"];
    //             this.totalCartItems = data["count"];
    //             this.$toastr.s("Remove From Cart");
    //             var url = this.$route.path;
    //             if (url === "/shipping" || url === "/payment") {
    //                 this.$root.$refs.shipping.updateShippingList();
    //             }
    //             if (url === "/cart") this.$root.$refs.cart.updateCartList();
    //         }
    //     },
    //     checkout() {
    //         $("#cart-show").toggleClass("active");
    //         this.$router.push("/cart");
    //     },
    //     incrementItem(item) {
    //         var scope = this;
    //         var incrementCount = $("#count_" + item.id).val();
    //         scope.cartAmount += item.price;
    //         incrementCount++;
    //         $("#count_" + item.id).val(incrementCount);
    //         if (scope.cartProductsList.includes(item)) {
    //             var index = scope.cartProductsList.indexOf(item);
    //             scope.cartProductsList[index]["qty"] = incrementCount;
    //             localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
    //             var data = [];
    //             data = helper.calculateCartAmount(this.cartProductsList);
    //             this.totalCartAmount = data["amount"];
    //             this.totalCartItems = data["count"];
    //             var url = this.$route.path;
    //             if (url === "/shipping" || url === "/payment") {
    //                 this.$root.$refs.shipping.updateShippingList();
    //             }
    //             if (url === "/cart") this.$root.$refs.cart.updateCartList();
    //         }
    //     },
    //     decrementItem(item) {
    //         var scope = this;
    //         var decrementCount = $("#count_" + item.id).val();
    //         if (decrementCount > 1) {
    //             scope.totalCartAmount -= item.price;
    //             decrementCount--;
    //             $("#count_" + item.id).val(decrementCount);
    //             if (scope.cartProductsList.includes(item)) {
    //                 var index = scope.cartProductsList.indexOf(item);
    //                 scope.cartProductsList[index]["qty"] = decrementCount;
    //                 localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
    //                 var data = [];
    //                 data = helper.calculateCartAmount(this.cartProductsList);
    //                 this.totalCartAmount = data["amount"];
    //                 this.totalCartItems = data["count"];
    //                 var url = this.$route.path;
    //                 if (url === "/shipping" || url === "/payment") {
    //                     this.$root.$refs.shipping.updateShippingList();
    //                 }
    //                 if (url === "/cart") this.$root.$refs.cart.updateCartList();
    //             }
    //         }
    //     },
    // }
};
</script>

<style></style>
