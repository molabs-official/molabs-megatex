<template>
    <div>
        <div class="site">
            <section class="shipping">
                <h1 class="shipping__title center mb42">SHIPPING</h1>
                <div class="order-steps center">
                    <span class="or14">1. Shopping Cart</span>
                    <span class="or14 active">2. Shipping</span>
                    <span class="or14">3. Payment Method</span>
                </div>
                <div class="shipping__wrap center">
                    <div class="shipping__left">
                        <div class="shipping__top">
                            <div class="shipping__subtitle mb20">SHIPPING ADDRESS</div>
                            <div class="shipping__radio radio-block or16">
                                <span>
                                    <input
                                        id="radio-1"
                                        checked
                                        type="radio"
                                        name="radio"
                                        value=""
                                        checked
                                    />
                                    <label for="radio-1">Use an existing address</label>
                                </span>
                                <span>
                                    <input id="radio-2" type="radio" name="radio" value="" />
                                    <label for="radio-2">Add a new address</label>
                                </span>
                            </div>
                        </div>
                        <div class="shipping__bottom">
                            <input
                                v-model="shippingForm.address"
                                class="input-field"
                                placeholder="Address"
                                @input="$v.shippingForm.address.$touch()"
                            />
                            <div v-if="$v.shippingForm.address.$error">
                                <span style="color: red">Address is Required</span>
                            </div>
                            <div class="fields-body">
                                <div class="fields-body__left">
                                    <div>
                                        <input
                                            v-model="shippingForm.name"
                                            type="text"
                                            class="input-field"
                                            placeholder="Name"
                                            @input="$v.shippingForm.name.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.name.$error">
                                            <span style="color: red">Name is Required</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input
                                            v-model="shippingForm.business_name"
                                            type="text"
                                            class="input-field"
                                            placeholder="Business name"
                                            @input="$v.shippingForm.business_name.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.business_name.$error">
                                            <span style="color: red"
                                                >Business Name is Required</span
                                            >
                                        </div>
                                    </div>
                                    <div>
                                        <input
                                            v-model="shippingForm.address_1"
                                            type="text"
                                            class="input-field"
                                            placeholder="Address"
                                            @input="$v.shippingForm.address_1.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.address_1.$error">
                                            <span style="color: red">Address is Required</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input
                                            v-model="shippingForm.address_2"
                                            type="text"
                                            class="input-field"
                                            placeholder="Address-1"
                                            @input="$v.shippingForm.address_2.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.address_2.$error">
                                            <span style="color: red">Address is Required</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input
                                            v-model="shippingForm.address_3"
                                            type="text"
                                            class="input-field"
                                            placeholder="Address-2"
                                            @input="$v.shippingForm.address_3.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.address_3.$error">
                                            <span style="color: red">Address is Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="fields-body__right">
                                    <div>
                                        <input
                                            v-model="shippingForm.address_4"
                                            type="text"
                                            class="input-field"
                                            placeholder="Address-3"
                                            @input="$v.shippingForm.address_4.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.address_4.$error">
                                            <span style="color: red">Address is Required</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input
                                            v-model="shippingForm.phone"
                                            type="number"
                                            class="input-field"
                                            placeholder="Phone"
                                            @input="$v.shippingForm.phone.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.phone.$error">
                                            <span style="color: red">Phone is Required</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input
                                            v-model="shippingForm.address_5"
                                            type="text"
                                            class="input-field"
                                            placeholder="Address-4"
                                            @input="$v.shippingForm.address_5.$touch()"
                                        />
                                        <div v-if="$v.shippingForm.address_5.$error">
                                            <span style="color: red">Address is Required</span>
                                        </div>
                                    </div>
                                    <select
                                        v-model="shippingForm.address_6"
                                        class="select-dropdown select-2 or16"
                                    >
                                        <option value="">select</option>
                                        <option value="address-1">address-1</option>
                                        <option value="address-2">address-2</option>
                                    </select>
                                    <select
                                        v-model="shippingForm.select_address"
                                        class="select-dropdown select-2 or16"
                                        @input="$v.shippingForm.select_address.$touch()"
                                    >
                                        <option value="">select</option>
                                        <option value="address-1">address-3</option>
                                        <option value="address-2">address-4</option>
                                    </select>
                                    <div v-if="$v.shippingForm.select_address.$error">
                                        <span style="color: red">Address is Required</span>
                                    </div>
                                </div>
                            </div>
                            <div class="fields-body__bottom">
                                <div class="fields-body__textarea">
                                    <textarea
                                        id=""
                                        v-model="shippingForm.order_comment"
                                        name="textarea"
                                        class="bg4 or16"
                                        placeholder="Order comment"
                                    />
                                </div>
                                <div class="shipping-method">
                                    <div class="shipping-method__title mb20">SHIPPING METHOD</div>
                                    <div class="shipping__radio-price radio-block or16">
                                        <span>
                                            <input
                                                id="shipping-method-1"
                                                v-model="shippingForm.post_type"
                                                class="canada_post"
                                                type="radio"
                                                name="shipping-method-1"
                                                value="0"
                                                checked
                                            />
                                            <label for="shipping-method-1">
                                                <span>Canada Post</span>
                                                <span>$11.95</span>
                                            </label>
                                        </span>
                                        <span>
                                            <input
                                                id="shipping-method-2"
                                                v-model="shippingForm.post_type"
                                                class="courier_post"
                                                type="radio"
                                                name="shipping-method-1"
                                                value="1"
                                            />
                                            <label for="shipping-method-2">
                                                <span>Courier</span>
                                                <span>$19.95</span>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="shipping-method__checkbox">
                                        <button
                                            class="bb bsl"
                                            :disabled="isDisabled"
                                            @click="saveShipping()"
                                        >
                                            Payment
                                        </button>
                                        <span class="or12">
                                            <input
                                                id="checkbox-2"
                                                class="term"
                                                type="checkbox"
                                                name="checkbox"
                                                required
                                                @click="validateTerm()"
                                            />
                                            <label for="checkbox-2"
                                                >I agree to the terms of the
                                                <a class="lu">privacy policy</a></label
                                            >
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <side-bar />
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import sideBar from "./payment-side-bar";
import { required, email } from "vuelidate/lib/validators";
// import "../../main";
export default {
    name: "Shipping",
    components: { sideBar },
    data() {
        return {
            isDisabled: true,
            shippingForm: {
                address: "",
                name: "",
                business_name: "",
                address_1: "",
                address_2: "",
                address_3: "",
                address_4: "",
                phone: "",
                address_5: "",
                address_6: "",
                select_address: "",
                order_comment: "",
                post_type: 0,
            },
        };
    },
    validations: {
        shippingForm: {
            address: { required },
            name: { required },
            business_name: { required },
            address_1: { required },
            address_2: { required },
            address_3: { required },
            address_4: { required },
            phone: { required },
            address_5: { required },
            address_6: { required },
            select_address: { required },
            order_comment: { required },
        },
    },
    methods: {
        saveShipping() {
            this.$v.shippingForm.$touch();
            if (!this.$v.shippingForm.$error) {
                localStorage.setItem("shipping", JSON.stringify(this.shippingForm));
                this.$router.push("/payment");
            }
        },
        validateTerm() {
            if ($(".term").is(":checked")) {
                this.isDisabled = false;
            } else {
                this.isDisabled = true;
            }
        },
        saveCourierType() {
            if ($(".courier_post").is(":checked")) {
                this.shippingForm.post_type = 1;
            }
        },
        savePostType() {
            if ($(".canada_post").is(":checked")) {
                this.shippingForm.post_type = 0;
            }
        },
    },
};
</script>

<style scoped></style>
<style src="../../../css/shipping.css"></style>
