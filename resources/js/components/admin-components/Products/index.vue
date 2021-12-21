<template>
    <div id="main">
        <div id="app">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none"
                    ><i class="bi bi-justify fs-3"
                /></a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-heading">
                            <h3>Product List</h3>
                        </div>
                        <div class="page-content">
                            <section class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-title text-end p-4">
                                            <router-link to="/product/edit">
                                                <a class="btn btn-success">Add New Product </a>
                                            </router-link>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Image</th>
                                                                <th>Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="item in List.data">
                                                                <td class="text-bold-500">
                                                                    {{ item.name }}
                                                                </td>
                                                                <td>
                                                                    <img
                                                                        v-if="item.image"
                                                                        :src="item.image"
                                                                        width="50"
                                                                        height="50"
                                                                    />
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    {{ item.price }}
                                                                </td>
                                                                <td class="text-bold-500">
                                                                    <router-link
                                                                        :to="`/product/${item.id}/edit`"
                                                                    >
                                                                        <button
                                                                            type="button"
                                                                            class="
                                                                                btn
                                                                                btn-warning
                                                                                btn-sm
                                                                            "
                                                                        >
                                                                            <i
                                                                                class="bi bi-pencil"
                                                                            />
                                                                        </button>
                                                                    </router-link>
                                                                    <button
                                                                        type="button"
                                                                        class="
                                                                            btn btn-danger btn-sm
                                                                        "
                                                                        @click="deleteItem(item.id)"
                                                                    >
                                                                        <i class="bi bi-trash" />
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <pagination
                                                        :data="List"
                                                        @pagination-change-page="getList"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import router from "../../../routes/router";

export default {
    name: "Index",
    data() {
        return {
            name: "",
            image: "",
            price: "",
            brand: "",
            description: "",
            ingredients: "",
            code: "",
            category_id: "",
            List: {},
            deleteId: 0,
            editId: 0,
            pendings: {},
            EditOrCreate: "Add Product",
            btnEditOrCreate: "Create",
        };
    },
    mounted() {
        this.getList();
    },
    methods: {
        getList(page) {
            if (typeof page === "undefined") {
                page = 1;
            }
            var scope = this;
            axios.get("/api/get/product/list").then(
                function (result) {
                    scope.List = result.data;
                },
                function (error) {}
            );
        },
        deleteItem(id) {
            var result = confirm("Are you sure to delete?");
            if (result) {
                var scope = this;
                scope.deleteId = id;
                axios.delete("/api/product/" + id).then(
                    function (result) {
                        scope.getList();
                        scope.$toastr.e("Product deleted successfully");
                    },
                    function (error) {}
                );
            }
        },
    },
};
</script>

<style scoped src="../../../../css/sidebar/bootstrap.css"></style>
