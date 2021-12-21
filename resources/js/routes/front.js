const frontRoutes = {
    path: "/",
    component: require("../layouts/layout").default,
    name: "front",
    meta: {
        validate: ["guest"],
    },
    children: [{
            path: "/",
            component: require("../components/user-components/home").default,
            name: 'main',
            meta: {
                title: "welcome",
            },
        },
        {
            path: "/login",
            component: require("../components/auth-components/login").default,
            name: 'login',
            meta: {
                title: "login",
                auth: false
            },
        },
        {
            path: "/signup",
            component: require("../components/auth-components/signup").default,
            name: 'signup',
            meta: {
                title: "signup",
                auth: false
            },
        },
        {
            path: "/about",
            component: require("../components/user-components/about").default,
            name: 'about',
            meta: {
                title: "about",
            },
        },
        {
            path: "/payment",
            component: require("../components/user-components/payment").default,
            name: 'payment',
            meta: {
                title: "payment",
                auth: true
            },
        },
        {
            path: "/shipping",
            component: require("../components/user-components/shipping").default,
            name: 'shipping',
            meta: {
                title: "shipping",
                auth: true
            },
        },
        {
            path: "/cart",
            component: require("../components/user-components/cart").default,
            name: 'cart',
            meta: {
                title: "cart",
                auth: true
            },
        },
        {
            path: "/catalog",
            component: require("../components/user-components/catalog").default,
            name: 'catalog',
            meta: {
                title: "catalog",
            },
        },
        {
            path: "/manufacturing",
            component: require("../components/user-components/manufacturing").default,
            name: 'manufacturing',
            meta: {
                title: "manufacturing",
            },
        },
        {
            path: "/distribution",
            component: require("../components/user-components/distribution").default,
            name: 'distribution',
            meta: {
                title: "distribution",
            },
        },
        {
            path: "/contact",
            component: require("../components/user-components/contact").default,
            name: 'contact',
            meta: {
                title: "contact",
            },
        },
        {
            path: "/careers",
            component: require("../components/user-components/careers").default,
            name: 'careers',
            meta: {
                title: "careers",
            },
        },
        {
            path: "/payment/successfull",
            component: require("../components/user-components/PaymentSuccessfull").default,
            name: 'paymentSuccessfull',
            meta: {
                title: "Success Payments",
                auth: true
            },
        },
    ],
};
export default frontRoutes;