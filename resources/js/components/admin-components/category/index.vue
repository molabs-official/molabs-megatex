<template>
    <div id="main">
        <div id="app">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none"
                    ><i class="bi bi-justify fs-3"
                /></a>
            </header>
            <div class="container-fluid">
                <div data-v-3991b978="" class="row">
                    <div data-v-3991b978="" class="col">
                        <div data-v-3991b978="" class="page-heading">
                            <h3 data-v-3991b978="">Category List</h3>
                        </div>
                        <div data-v-3991b978="" class="page-content">
                            <section data-v-3991b978="" class="row">
                                <div data-v-3991b978="" class="col-12">
                                    <div data-v-3991b978="" class="card">
                                        <div data-v-3991b978="" class="card-title text-end p-4">
                                            <button
                                                data-toggle="modal"
                                                data-target="#createCategoryModal"
                                                class="btn btn-success"
                                                @click="nameChange()"
                                            >
                                                Add New Category
                                            </button>
                                        </div>
                                        <div data-v-3991b978="" class="card-content">
                                            <div data-v-3991b978="" class="card-body">
                                                <div data-v-3991b978="" class="table-responsive">
                                                    <table
                                                        data-v-3991b978=""
                                                        class="table table-lg"
                                                    >
                                                        <thead data-v-3991b978="">
                                                            <tr data-v-3991b978="">
                                                                <th data-v-3991b978="">Name</th>
                                                                <th data-v-3991b978="">Image</th>
                                                                <th data-v-3991b978="">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-v-3991b978="">
                                                            <tr
                                                                v-for="item in List.data"
                                                                data-v-3991b978=""
                                                            >
                                                                <td
                                                                    data-v-3991b978=""
                                                                    class="text-bold-500"
                                                                >
                                                                    {{ item.name }}
                                                                </td>
                                                                <td data-v-3991b978="">
                                                                    <img
                                                                        v-if="item.image"
                                                                        data-v-3991b978=""
                                                                        :src="item.image"
                                                                        width="50"
                                                                        height="50"
                                                                    />
                                                                </td>
                                                                <td
                                                                    data-v-3991b978=""
                                                                    class="text-bold-500"
                                                                >
                                                                    <button
                                                                        type="button"
                                                                        class="
                                                                            btn btn-warning btn-sm
                                                                        "
                                                                        @click="editItem(item)"
                                                                    >
                                                                        <i
                                                                            data-v-3991b978=""
                                                                            class="bi bi-pencil"
                                                                        />
                                                                    </button>
                                                                    <button
                                                                        type="button"
                                                                        class="
                                                                            btn btn-danger btn-sm
                                                                        "
                                                                        @click="deleteItem(item.id)"
                                                                    >
                                                                        <i
                                                                            data-v-3991b978=""
                                                                            class="bi bi-trash"
                                                                        />
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
                            <div
                                id="createCategoryModal"
                                data-v-3991b978=""
                                tabindex="-1"
                                aria-labelledby="createCategoryModal"
                                aria-modal="true"
                                role="dialog"
                                class="modal fade text-left show"
                                style="display: none; background: rgba(0, 0, 0, 0.5)"
                            >
                                <div
                                    data-v-3991b978=""
                                    role="document"
                                    class="modal-dialog modal-dialog-scrollable"
                                >
                                    <div data-v-3991b978="" class="modal-content">
                                        <form
                                            method="POST"
                                            enctype="multipart/form-data"
                                            @submit.prevent="handleSubmit($event)"
                                        >
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white">
                                                    {{ EditOrCreate }}
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                    @click="closeModel"
                                                >
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input
                                                        v-model="name"
                                                        type="text"
                                                        placeholder="Category Name"
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
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    data-bs-dismiss="modal"
                                                    class="btn btn-light-secondary"
                                                >
                                                    <i class="bx bx-x d-block d-sm-none" />
                                                    <span
                                                        class="d-none d-sm-block"
                                                        @click="closeModel()"
                                                        >Close</span
                                                    >
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary ml-1 hide-category-modal"
                                                >
                                                    {{ btnEditOrCreate }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import "../../../../css/toast/js/toast";
import "../../../../css/sidebar/js/image-preview";
// import '../../../../css/sidebar/js/main';
// import '../../../../css/sidebar/js/scrollbar';
// import '../../../../css/sidebar/js/bootstrap.min';
// import '../../../../css/sidebar/js/apexchart';

export default {
    name: "Index",
    data() {
        return {
            name: "",
            image: "",
            myImage: "",
            List: {},
            deleteId: 0,
            editId: 0,
            pendings: {},
            EditOrCreate: "Add Category",
            btnEditOrCreate: "Create",
            url: null,
        };
    },
    mounted() {
        this.getList();
    },
    methods: {
        chooseImage() {},
        nameChange() {
            this.url = "";
            this.EditOrCreate = "Add Category";
            this.btnEditOrCreate = "Create";
            this.name = "";
        },
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
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        handleSubmit(e) {
            var scope = this;
            const formData = new FormData();
            formData.append("name", scope.name);
            formData.append("image", scope.image);
            formData.append("is_edit", scope.btnEditOrCreate);
            formData.append("id", scope.editId);
            axios
                .post("/api/category", formData)
                .then((response) => response)
                .then(
                    (response) => {
                        if (response.data.success === true) {
                            $("#createCategoryModal").hide();
                            if (response.data.edit === true) {
                                scope.$toastr.s("Category Updated successfully");
                            } else {
                                scope.$toastr.s("Category Created successfully");
                            }
                            scope.getList();
                            scope.clearFields();
                        } else {
                            scope.$toastr.e(response.data.message);
                        }
                    },
                    function (error) {
                        console.log(error);
                    }
                );
        },
        getList(page) {
            if (typeof page === "undefined") {
                page = 1;
            }
            var scope = this;
            axios.get("/api/get/category/list").then(
                function (response) {
                    scope.List = response.data;
                },
                function (error) {}
            );
        },
        deleteItem(id) {
            var result = confirm("Are you sure to delete?");
            if (result) {
                var scope = this;
                scope.deleteId = id;
                axios.delete("/api/category/" + id).then(
                    function (result) {
                        scope.getList();
                        scope.$toastr.e("Category deleted successfully");
                    },
                    function (error) {}
                );
            }
        },
        editItem(item) {
            var scope = this;
            scope.EditOrCreate = "Edit Category";
            scope.btnEditOrCreate = "Update";
            scope.editId = item.id;
            scope.name = item.name;
            scope.url = item.image;
            $("#createCategoryModal").show();
        },
        clearFields() {
            var scope = this;
            scope.name = "";
            // scope.image = '';
            scope.EditOrCreate = "Add category";
            scope.btnEditOrCreate = "Create";
        },
        closeModel() {
            $("#createCategoryModal").hide();
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

