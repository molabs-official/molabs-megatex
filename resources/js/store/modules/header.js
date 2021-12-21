export default {
    namespaced: true,
    state: {
        activeCartClass: false,
        activeUserClass: false,
        activeBurgerClass: false
    },
    mutations: {
        CHANGE_ACTIVE_CART_CLASS_STATUS(state) {
            state.activeCartClass = !state.activeCartClass;
        },
        CHANGE_ACTIVE_USER_CLASSS_STATUS(state) {
            state.activeUserClass = !state.activeUserClass;
        },
        CHANGE_ACTIVE_BURGER_CLASSS_STATUS(state) {
            if (state.activeBurgerClass) {
                $("html").removeClass("overflowhidden burgeropened");
            } else {
                $("html").toggleClass("overflowhidden burgeropened");
            }
            state.activeBurgerClass = !state.activeBurgerClass;
        },
        CHANGE_ALL_ACTIVE_CLASS_STATUS(state, status) {
            state.activeCartClass = status;
            state.activeUserClass = status;
        },
    },
    actions: {
        changeActiveCartClassStatus({ commit, state }) {
            if (state.activeCartClass) {
                commit("CHANGE_ALL_ACTIVE_CLASS_STATUS", false);
            } else {
                commit("CHANGE_ALL_ACTIVE_CLASS_STATUS", false);
                commit("CHANGE_ACTIVE_CART_CLASS_STATUS");
            }
        },
        changeActiveUserClassStatus({ commit, state }) {
            if (state.activeUserClass) {
                commit("CHANGE_ALL_ACTIVE_CLASS_STATUS", false);
            } else {
                commit("CHANGE_ALL_ACTIVE_CLASS_STATUS", false);
                commit("CHANGE_ACTIVE_USER_CLASSS_STATUS");
            }
        },
        changeActiveBurgerClassStatus({ commit, state }) {
            commit("CHANGE_ACTIVE_BURGER_CLASSS_STATUS");
        },
        changeAllActiveClassStatus({ commit }, status) {
            commit("CHANGE_ALL_ACTIVE_CLASS_STATUS", status);
        },
    },
};