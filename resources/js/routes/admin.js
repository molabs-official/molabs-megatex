const adminRoutes = {
    path: "/seller",
    component: require("../components/admin-components/common").default,
    name: "admin",
    meta: {},
    children: [
        {
            path: "/dashboard",
            component: require("../components/admin-components/dashboard").default,
            meta: {
                title: "Dashboard",
            },
        },
        {
            path: "/product",
            component: require("../components/admin-components/Products/index").default,
            meta: {
                title: "Product",
            },
        },
        {
            path: "/product/:id?/edit",
            component: require("../components/admin-components/Products/create").default,
            meta: {
                title: "Edit Product",
            },
        },
        {
            path: "/category",
            component: require("../components/admin-components/category/index").default,
            meta: {
                title: "category",
            },
        },
    ],
};
export default adminRoutes;
