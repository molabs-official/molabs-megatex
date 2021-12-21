<template>
    <div id="main">
        <div id="app">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none"
                    ><i class="bi bi-justify fs-3"
                /></a>
            </header>
            <div class="container-fluid">
                <div class="page-heading">
                    <h3>Product {{ nameCreate }}</h3>
                </div>
                <div class="page-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form
                                    method="POST"
                                    enctype="multipart/form-data"
                                    @submit.prevent="handleSubmit($event)"
                                >
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input
                                                    v-model="productForm.name"
                                                    type="text"
                                                    placeholder="Product Name"
                                                    class="form-control"
                                                />
                                                <!--<div v-if="$v.productForm.name.$error"><span>Name is required</span></div>-->
                                            </div>

                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select
                                                    v-model="productForm.category"
                                                    class="form-select select-category-option"
                                                >
                                                    <option value="">Select Category</option>
                                                    <option
                                                        v-for="cat in categoryList"
                                                        :value="cat.id"
                                                    >
                                                        {{ cat.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input
                                                    v-model="productForm.code"
                                                    type="text"
                                                    placeholder="Product Code"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <input
                                                    v-model="productForm.brand"
                                                    type="text"
                                                    placeholder="Product Brand"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div
                                                    class="base-image-input vue-dropify"
                                                    @click="chooseImage"
                                                >
                                                    <span v-if="!url" class="placeholder">
                                                        Choose an Image
                                                    </span>
                                                    <div v-if="url" id="preview">
                                                        <img v-if="url" :src="url" />
                                                    </div>
                                                    <input
                                                        class="vue-dropify__input"
                                                        type="file"
                                                        name="photo"
                                                        accept="image/*"
                                                        @change="onImageChange"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input
                                                    v-model="productForm.price"
                                                    type="number"
                                                    placeholder="Product Price"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea
                                                    v-model="productForm.description"
                                                    rows="4"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="productIngredient">Ingredient</label>
                                                <textarea
                                                    id="productIngredient"
                                                    v-model="productForm.ingredient"
                                                    rows="3"
                                                    class="form-control"
                                                />
                                            </div>
                                            <button
                                                type="submit"
                                                class="btn btn-success"
                                                style="float: right"
                                            >
                                                {{ nameCreate }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import {required, email} from "vuelidate/lib/validators";
export default {
    name: "Create",
    data() {
        return {
            id: this.$route.params.id,
            productForm: new Form({
                id: this.$route.params.id,
                name: "",
                category: 0,
                code: "",
                brand: "",
                image: "",
                description: "",
                price: "",
                ingredient: "",
            }),
            nameCreate: "Create",
            categoryList: [],
            url: null,
        };
    },
    // validations: {
    //     productForm:{
    //         name: {required},
    //     }
    // },
    mounted() {
        this.getCategoryList();
        if (!(typeof this.id === "undefined")) {
            this.getProductDetails();
            this.nameCreate = "Update";
        }
    },
    methods: {
        chooseImage() {},
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.url = URL.createObjectURL(files[0]);
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.productForm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        handleSubmit(e) {
            var scope = this;
            scope.productForm
                .post("/api/product")
                .then((response) => response)
                .then(
                    (response) => {
                        if (response.success === true) {
                            if (response.edit === true) {
                                scope.$toastr.s("Product updated successfully");
                            } else {
                                scope.$toastr.s("Product created successfully");
                            }
                            scope.$router.push("/product");
                        } else {
                            $.each(response.message, function (key, value) {
                                scope.$toastr.e(value);
                            });
                        }
                    },
                    function (error) {
                        console.log(error);
                    }
                );
        },
        getCategoryList() {
            axios
                .post("/api/category/list")
                .then((response) => response.data)
                .then((response) => {
                    this.categoryList = response.category;
                });
        },
        getProductDetails() {
            var scope = this;
            axios
                .get("/api/product/details/" + scope.id)
                .then((response) => response.data)
                .then((response) => {
                    scope.productForm.name = response.data.name;
                    scope.productForm.code = response.data.product_code;
                    scope.productForm.brand = response.data.product_brand;
                    scope.productForm.description = response.data.description;
                    scope.productForm.category = response.data.category_id;
                    scope.productForm.price = response.data.price;
                    scope.url = response.data.image;
                    scope.productForm.image = 1;
                    scope.productForm.ingredient = response.data.ingredients;
                });
        },
    },
    chooseImage() {
        this.$refs.fileInput.click();
    },
};
</script>
<style>
.base-image-input {
    display: block;
    cursor: pointer;
    background-size: cover;
    background-position: center center;
}
.placeholder {
    background: #f0f0f0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #333;
    font-size: 18px;
    font-family: Helvetica;
}
.placeholder:hover {
    background: #e0e0e0;
}
.file-input {
    display: none;
}
#preview {
    display: flex;
    justify-content: center;
    align-items: center;
}

#preview img {
    max-width: 100%;
    max-height: 500px;
}
</style>
<style scoped src="../../../../css/sidebar/bootstrap.css"></style>
<style scoped src="../../../../css/sidebar/category.css"></style>
