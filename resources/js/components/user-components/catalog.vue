<template>
    <div>
        <section class="catalog catalog-page-tabs">
            <div class="t-panel t-nets catalog__pane catg active net-description" hidden>
                <div class="catalog__title mb42">CATALOG-1</div>
                <img class="lazy" src="/images/catalog-1.png" alt="" />
            </div>
            <div class="t-panel t-traps catalog__pane catg tarp-description" hidden>
                <div class="catalog__title mb42">CATALOG-2</div>
                <img class="lazy" src="/images/catalog-2.png" alt="" />
            </div>
            <div class="t-panel t-accessories catalog__pane catg accessory-description" hidden>
                <div class="catalog__title mb42">CATALOG-3</div>
                <img class="lazy" src="/images/catalog-3.png" alt="" />
            </div>
        </section>

        <section class="catalog-tab">
            <div class="catalog-tab__wrap center">
                <div class="catalog-tab__tabs catalog-page-tabs">
                    <ul class="catalog-nav-tabs">
                        <li v-for="item in categoryList">
                            <span
                                id="net-catalog"
                                :class="'category_' + item.name"
                                class="t-btn category tbtn"
                                @click="getProducts(item.id, item.name)"
                                >{{ item.name }}</span
                            >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="net-tab-view" class="t-panel t-nets tab-pane active">
                            <div class="catalog-tab__title">
                                <span id="nets-title" class="mb30 catg net-description" hidden
                                    >YOUR SUPPLIER OF NETS IN QUEBEC-5</span
                                >
                                <span id="tarp-title" class="mb30 catg tarp-description" hidden
                                    >THE LEADING MANUFACTURER OF TARPS IN QUEBEC</span
                                >
                                <span
                                    id="accessory-title"
                                    class="mb30 catg accessory-description"
                                    hidden
                                    >ACCESSORIES FOR YOUR TARPS AND NETS</span
                                >
                            </div>
                            <div
                                id="net-description"
                                class="catalog-tab__text catg or16 net-description"
                                hidden
                            >
                                As your preferred partner for the design and repair of nets in
                                Quebec, Mégatex offers you nets for various industries. These nets
                                have been designed with the highest quality materials in order to
                                optimize performance and reliability. If you are not sure what you
                                need, we invite you to discuss your needs with one of our experts
                                who will be able to recommend the best option.
                            </div>
                            <div
                                id="tarp-description"
                                class="catalog-tab__text catg or16 tarp-description"
                                hidden
                            >
                                Since 1992, Mégatex has been the leader in tarps in Quebec, the
                                Maritimes and Ontario. Our selection, which includes some
                                fire-resistant and others resistant to various chemical products,
                                remains vast to suit all uses, whether industrial or commercial. Not
                                sure which material is ideal for your application? Contact us and
                                a member of our team will be pleased to advise you. We also offer
                                a custom design service.
                            </div>
                            <div
                                id="accessory-description"
                                class="catalog-tab__text catg or16 accessory-description"
                                hidden
                            >
                                In addition to its wide variety of tarps and nets, Mégatex offers
                                you all the accessories potentially necessary for their use.
                                Whatever your sector of activity, we can offer you products
                                according to your needs. For more information, do not hesitate to
                                contact us.
                            </div>
                            <div class="catalog-tab__block">
                                <div v-for="item in productsList" class="product-item">
                                    <a href="#" class="product-item__image">
                                        <img class="lazy" :src="item.image" alt="" />
                                    </a>
                                    <div class="product-item__block bg4">
                                        <div class="product-item__top">
                                            <a href="#" class="product-item__name or16">
                                                {{ item.name }}
                                            </a>
                                        </div>
                                        <div class="product-item__bottom">
                                            <div class="product-item__price ob20">
                                                ${{ item.price }}
                                            </div>
                                            <div class="product-item__description">
                                                <a class="lu">Read description</a>
                                            </div>
                                            <div class="product-item__buttons">
                                                <button class="sb bsl" @click="addToCart(item)">
                                                    Cart
                                                </button>
                                                <button class="sbout" @click="addToWishList(item)">
                                                    Wish List
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
// import "../../main";
export default {
    name: "Catalog",
    data() {
        return {
            defaultCategoryId: 0,
            categoryList: [],
            productsList: [],
            cartProductsList: [],
            cartProductsIds: [],
        };
    },
    mounted() {
        this.displayCategoryView();
        this.getCategoryList();
        var cart = JSON.parse(localStorage.getItem("cart"));
        if (cart && cart.length > 0) {
            this.cartProductsList = cart;
        }
        var cart = JSON.parse(localStorage.getItem("cartItemIds"));
        if (cart && cart.length > 0) {
            this.cartProductsIds = cart;
        }
    },
    methods: {
        displayCategoryView() {
            $("#catalog-one").addClass("active");
            $("#net-tab-view").addClass("active");
            $("#net-catalog").addClass("active");
            $("#tarps-catalog").removeClass("active");
            $("#accessories-catalog").removeClass("active");
            $("#catalog-two").removeClass("active");
            $("#catalog-three").removeClass("active");
            $("#tarp-tab-view").removeClass("active");
            $("#accessories-tab-view").removeClass("active");
        },
        getCategoryList() {
            var scope = this;
            axios.post("/api/get/category/list").then((response) => {
                scope.categoryList = response.data.category;
                $.each(scope.categoryList, function (key, value) {
                    scope.getProducts(value.id, value.name);
                    return false;
                });
            });
        },
        getProducts(id, name) {
            var scope = this;
            $(".category").removeClass("active");
            $(".category_" + name).addClass("active");
            axios.get("/api/products/list/" + id).then((response) => {
                scope.productsList = response.data.data;
                $(".catg").attr("hidden", true);
                if (name == "Nets") {
                    $(".net-description").removeAttr("hidden");
                } else if (name == "Tarps") {
                    $(".tarp-description").removeAttr("hidden");
                } else {
                    $(".accessory-description").removeAttr("hidden");
                }
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
    },
};
</script>

<style scoped></style>
<style src="../../../css/catalog.css"></style>
