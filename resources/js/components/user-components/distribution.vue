<template>
    <div class="site">
        <section class="about">
            <h1 class="about__title mb42">DISTRIBUTION</h1>
            <img class="lazy" src="/images/distribution-1.png" alt="" />
        </section>

        <section class="in-nets">
            <div class="in-nets__wrap center">
                <div class="in-nets__title mb30">RAW MATERIAL DISTRIBUTION</div>
                <div class="in-nets__text or16">
                    In addition to designing and repairing tarps and nets for industries and
                    businesses in Quebec, Canada and the United States, Mégatex is also a major
                    distributor of raw products in rolls or cut to size. In fact, most of our
                    materials are offered to you this way.
                </div>
            </div>
        </section>

        <section class="distribution">
            <div class="distribution__wrap center">
                <div class="distribution__title ob20">We Distribute the Following Products:</div>
                <div class="distribution__filter">
                    <input
                        id="myInput"
                        type="text"
                        class="input-field"
                        placeholder="Please enter a search term..."
                        @keyup="myFunction()"
                    />
                </div>
                <ul id="myUL" class="distribution__items">
                    <li v-for="item in productsList" class="product-item">
                        <a href="#" class="product-item__image">
                            <img class="lazy" :src="item.image" alt="" />
                        </a>
                        <div class="product-item__block bg4">
                            <div class="product-item__top">
                                <i
                                    ><a class="product-item__name or16">
                                        {{ item.name }}
                                    </a></i
                                >
                            </div>
                            <div class="product-item__bottom">
                                <div class="product-item__price ob20">${{ item.price }}</div>
                                <div class="product-item__description">
                                    <a class="lu">{{ item.description }}</a>
                                </div>
                                <div class="product-item__buttons">
                                    <button class="sb bsl" @click="addToCart(item)">Cart</button>
                                    <button class="sbout" @click="addToWishList(item)">
                                        Wish List
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</template>

<script>
// import "../../main";
export default {
    name: "Distribution",
    data() {
        return {
            productsList: [],
            cartProductsList: [],
            cartProductsIds: [],
        };
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            var scope = this;
            axios.get("/api/product/list").then((response) => {
                scope.productsList = response.data.data;
            });
        },
        addToCart(item) {
            var scope = this;
            var cart = JSON.parse(localStorage.getItem("cart"));
            if (cart && cart.length > 0) {
                scope.cartProductsList = cart;
            } else {
                scope.cartProductsList = [];
            }
            var cart = JSON.parse(localStorage.getItem("cartItemIds"));
            if (cart && cart.length > 0) {
                scope.cartProductsIds = cart;
            } else {
                scope.cartProductsIds = [];
            }
            if (!(scope.cartProductsIds && scope.cartProductsIds.includes(item.id))) {
                scope.cartProductsIds.push(item.id);
                item.qty = 1;
                scope.cartProductsList.push(item);
                localStorage.setItem("cart", JSON.stringify(scope.cartProductsList));
                localStorage.setItem("cartItemIds", JSON.stringify(scope.cartProductsIds));
                this.$root.$refs.header.updateCartList();
                this.$toastr.s("Added to Cart");
            } else {
                this.$toastr.e("Already in cart!");
            }
        },
        addToWishList(item) {
            var scope = this;
            var wishList = JSON.parse(localStorage.getItem("wishList"));
            if (wishList && wishList.length > 0) {
                scope.wishListProductsList = wishList;
            } else {
                scope.wishListProductsList = [];
            }
            var wishList = JSON.parse(localStorage.getItem("wishListItemIds"));
            if (wishList && wishList.length > 0) {
                scope.wishListProductsIds = wishList;
            } else {
                scope.wishListProductsIds = [];
            }
            if (!(scope.wishListProductsIds && scope.wishListProductsIds.includes(item.id))) {
                scope.wishListProductsIds.push(item.id);
                item.qty = 1;
                scope.wishListProductsList.push(item);
                localStorage.setItem("wishList", JSON.stringify(scope.wishListProductsList));
                localStorage.setItem("wishListItemIds", JSON.stringify(scope.wishListProductsIds));
                this.$root.$refs.header.updateCartList();
                this.$toastr.s("Added to Wish List");
            } else {
                this.$toastr.e("Already in Wish List!");
            }
        },
        myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("i")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        },
    },
};
</script>

<style scoped></style>
<style src="../../../css/distribution.css"></style>
