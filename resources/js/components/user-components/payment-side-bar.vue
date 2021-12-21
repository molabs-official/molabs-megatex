<template>
    <div class="shipping__right bg4">
        <div class="y-order">
            <div class="y-order__title mb20">YOUR ORDER</div>
            <div class="y-order__items">
                <div v-for="item in cartProductsList" class="y-order__product">
                    <div class="y-order__product-image">
                        <img class="lazy" :src="item.image" alt="" />
                    </div>
                    <div class="y-order__product-info">
                        <div class="y-order__product-name ob14">
                            {{ item.name }}
                        </div>
                        <div class="y-order__product-price">
                            <span class="or12">{{ item.qty }} x</span>
                            <span class="ob12">
                                {{ item.price }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="y-order__subtitle">
                    <span class="ob14">Subtotal</span>
                    <span class="ob16">{{ totalCartAmount }}</span>
                </div>

                <div class="y-order__subtitle">
                    <span class="ob14">Shipping</span>
                    <span class="ob16">$11</span>
                </div>

                <div class="y-order__subtitle">
                    <span class="ob14">Canada GST</span>
                    <span class="ob16">$4</span>
                </div>
            </div>
            <div class="y-order__bottom">
                <span class="ob14">Total</span>
                <span class="cart-total__red ob20">{{ totalCartAmount + 11 + 4 }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import helper from "../../services/helper";
// import "../../main";
export default {
    name: "PaymentSideBar",
    data() {
        return {
            productsList: [],
            cartProductsList: [],
            totalCartAmount: 0,
        };
    },
    created() {
        this.$root.$refs.shipping = this;
    },
    mounted() {
        this.cartProductsList = JSON.parse(localStorage.getItem("cart"));
        var data = [];
        data = helper.calculateCartAmount(this.cartProductsList);
        this.totalCartAmount = data["amount"];
    },
    methods: {
        updateShippingList: function () {
            this.cartProductsList = JSON.parse(localStorage.getItem("cart"));
            var data = [];
            data = helper.calculateCartAmount(this.cartProductsList);
            this.totalCartAmount = data["amount"];
        },
    },
};
</script>

<style scoped></style>
<style scoped src="../../../css/shipping.css"></style>
