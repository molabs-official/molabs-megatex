<template>
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active ps">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <!--<div class="logo">-->
                    <a href="/">
                        <img src="/images/Logo.png" style="width: 250px; height: 125px" />
                    </a>
                    <!--</div>-->
                    <div class="toggler">
                        <a class="sidebar-hide d-xl-none d-block"
                            ><i class="bi bi-x bi-middle"
                        /></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li
                        id="dashboard-sidebar"
                        class="sidebar-item active"
                        @click="activeItem($event)"
                    >
                        <router-link to="/dashboard" class="sidebar-link">
                            <i class="bi bi-grid-fill" />
                            <span>Dashboard</span>
                        </router-link>
                    </li>
                    <li
                        v-if="isAdmin"
                        id="category-sidebar"
                        class="sidebar-item"
                        @click="activeItem($event)"
                    >
                        <router-link to="/category" class="sidebar-link">
                            <i class="bi bi-grid-fill" />
                            <span>Category</span>
                        </router-link>
                    </li>

                    <li
                        v-if="isAdmin"
                        id="product-sidebar"
                        class="sidebar-item"
                        @click="activeItem($event)"
                    >
                        <router-link to="/product" class="sidebar-link">
                            <i class="bi bi-grid-fill" />
                            <span>Product</span>
                        </router-link>
                    </li>
                    <li class="sidebar-item">
                        <a href="/login" class="btn btn-danger btn-block" @click="logoutUser()">
                            <b>Log out</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideBar",
    data() {
        return {
            isAdmin: false,
        };
    },
    mounted() {
        this.checkUserType();
    },
    methods: {
        activeItem(e) {
            $(".sidebar-item").removeClass("active");
            var id = event.currentTarget.id;
            $("#" + id).addClass("active");
        },
        logoutUser() {
            axios.get("/api/logout").then((response) => {
                localStorage.removeItem("auth_token");
                sessionStorage.setItem("is_login", "false");
                // location.reload();
                // this.$router.push('/login');
            });
        },
        checkUserType() {
            axios.get("/api/check/type").then((response) => {
                if (response.data.user.user_type === 0) {
                    this.isAdmin = true;
                }
            });
        },
    },
};
</script>

<style scoped src="../../../css/sidebar/bootstrap.css"></style>
<style src="../../../css/sidebar/sidebar.css"></style>
<style src="../../../css/sidebar/sidebarIcons.css"></style>
