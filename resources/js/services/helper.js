import axios from "axios";
export default {
    // to logout user
    logout() {
        return axios
            .post("/api/auth/logout")
            .then((response) => response.data)
            .then((response) => {
                localStorage.removeItem("per_details");
                toastr.success(response.message);
            })
            .catch((error) => {
                this.showDataErrorMsg(error);
            });
    },
    // to stopImpersonate user
    stopImpersonate() {
        return axios
            .get("/api/auth/stopimpersonate")
            .then((response) => response.data)
            .then((response) => {
                toastr.success(response.message);
            })
            .catch((error) => {
                this.showDataErrorMsg(error);
            });
    },

    // to get authenticated user data
    authUser() {
        return axios
            .get("/api/auth/user")
            .then((response) => response.data)
            .then((response) => {
                return response;
            })
            .catch((error) => {
                this.showDataErrorMsg(error);
            });
    },

    // to set notification position
    notification() {
        const notificationPosition = this.getConfig("notification_position") || "toast-top-right";
        toastr.options = {
            positionClass: notificationPosition,
        };
        this.setLastActivity();

        $("[data-toastr]").on("click", function() {
            const type = $(this).data("toastr");
            const message = $(this).data("message");
            const title = $(this).data("title");
            toastr[type](message, title);
        });
    },

    setLastActivity() {
        if (!this.isScreenLocked()) {
            this.$store.dispatch("setLastActivity");
        }
    },

    // to append filter variables in the URL
    getFilterURL(data) {
        let url = "";
        $.each(data, function(key, value) {
            url += value ? "&" + key + "=" + encodeURI(value) : "";
        });
        return url;
    },

    getTwoFactorCode() {
        return store.getters.getTwoFactorCode;
    },

    getLastActivity() {
        return store.getters.getLastActivity;
    },

    // to get Auth Status
    isAuth() {
        return store.getters.getAuthStatus;
    },
    // to get Auth Status
    isAuthStatus() {
        return store.getters.getAuthUserStatus;
    },

    // to get Auth user detail
    getAuthUser(name) {
        if (name === "full_name") {
            return (
                store.getters.getAuthUser("first_name") +
                " " +
                store.getters.getAuthUser("last_name")
            );
        } else if (name === "avatar") {
            return store.getters.getAuthUser("avatar");
        } else if (name === "user_type") {
            return store.getters.getAuthUser("user_type");
        } else {
            return store.getters.getAuthUser(name);
        }
    },

    // to get config
    getConfig(config) {
        return store.getters.getConfig(config);
    },
    // to get config
    getLocales() {
        return store.getters.getLocales;
    },

    // to get default role name of system
    getDefaultRole(role) {
        return store.getters.getDefaultRole(role);
    },
    getDefaultLocale() {
        return store.getters.getDefaultLocale || this.getConfig("locale");
    },

    // to check role of authenticated user
    hasRole(role) {
        // return store.getters.hasRole(this.getDefaultRole(role));
        return store.getters.hasRole(role);
    },

    // to check permission for authenticated user
    hasPermission(permission) {
        if (this.hasRole("superadmin")) {
            return true;
        } else {
            return store.getters.hasPermission(permission);
        }
    },

    // to check Admin role
    hasAdminRole() {
        if (this.hasRole("superadmin") || this.hasRole("admin")) {
            return 1;
        } else {
            return 0;
        }
    },

    // to check whether a given user has given role
    userHasRole(user, role_name) {
        if (!user.roles) {
            return false;
        }

        const user_role = user.roles.filter((role) => role.name === this.getDefaultRole(role_name));
        if (user_role.length) {
            return true;
        }
        return false;
    },

    // to check feature is available or not
    featureAvailable(feature) {
        return this.getConfig(feature);
    },

    // returns not accessible message if permission is denied
    notAccessibleMsg() {
        toastr.error(i18n.permission.permission_denied);
    },

    // returns feature not available message if permission is denied
    featureNotAvailableMsg() {
        toastr.error(i18n.general.feature_not_available);
    },

    // returns not accessible message if priority field is empty
    firstFillMsg() {
        toastr.error(i18n.user.first_fill_form);
    },

    // returns user status
    getUserStatus(user) {
        const status = [];

        if (user.status === "activated") {
            status.push({
                color: "success",
                label: i18n.user.status_activated,
            });
        } else if (user.status === "pending_activation") {
            status.push({
                color: "warning",
                label: i18n.user.status_pending_activation,
            });
        } else if (user.status === "pending_approval") {
            status.push({
                color: "warning",
                label: i18n.user.status_pending_approval,
            });
        } else if (user.status === "banned") {
            status.push({ color: "danger", label: i18n.user.status_banned });
        } else if (user.status === "disapproved") {
            status.push({
                color: "danger",
                label: i18n.user.status_disapproved,
            });
        }

        return status;
    },
    // returns user type
    getUserType(user) {
        const type = [];
        if (user.type == 1) {
            type.push({ color: "success", label: i18n.user.type_sale });
        } else if (user.type == 2) {
            type.push({ color: "warning", label: i18n.user.type_purchase });
        } else if (user.type == 3) {
            type.push({ color: "warning", label: i18n.user.type_support });
        } else if (user.type == 4) {
            type.push({ color: "danger", label: i18n.user.type_departed });
        }

        return type;
    },

    // returns user status
    getSellerStatus(seller) {
        const status = [];
        if (seller.verification_status == 1) {
            status.push({
                color: "success",
                label: i18n.seller.status_approve,
            });
        } else {
            status.push({
                color: "danger",
                label: i18n.seller.status_not_approve,
            });
        }

        return status;
    },

    // to mass assign one object in another object
    formAssign(form, data) {
        for (const key of Object.keys(form)) {
            if (
                key !== "originalData" &&
                key !== "errors" &&
                key !== "autoReset" &&
                key !== "providers"
            ) {
                form[key] = data[key] || "";
            }
        }
        return form;
    },

    // to get date in desired format
    formatDate(date) {
        if (!date) {
            return;
        }

        return moment(date).format(this.getConfig("date_format"));
    },
    formatDateNew(date) {
        if (!date) {
            return;
        }

        return moment(date).format("MM-DD-YYYY hh:mm");
    },

    // to get date time in desired format
    formatDateTime(date) {
        if (!date) {
            return;
        }

        const date_format = this.getConfig("date_format");
        const time_format = this.getConfig("time_format");

        return moment(date).format(date_format + " " + time_format);
    },

    // to get time from now
    formatDateTimeFromNow(datetime) {
        if (!datetime) {
            return;
        }

        return moment(datetime).fromNow();
    },

    // to change first character of every word to upper case
    ucword(value) {
        if (!value) {
            return;
        }

        return value.toLowerCase().replace(/\b[a-z]/g, function(value) {
            return value.toUpperCase();
        });
    },

    // to change string into human readable format
    toWord(value) {
        if (!value) {
            return;
        }

        value = value.replace(/-/g, " ");
        value = value.replace(/_/g, " ");

        return value.toLowerCase().replace(/\b[a-z]/g, function(value) {
            return value.toUpperCase();
        });
    },

    // shows toastr notification for axios request
    // shows toastr notification for axios request
    showDataErrorMsg(error) {
        this.setLastActivity();

        if (error.hasOwnProperty("error")) {
            if (error.error.indexOf(" ") >= 0) {
                toastr.error(error.error);
            } else {
                toastr.error(i18n.general[error.error]);
            }

            if (error.error === "token_expired") {
                router.push("/login");
            }
        } else if (error.hasOwnProperty("response")) {
            switch (error.response.status) {
                case 403:
                    toastr.error(i18n.general.permission_denied);
                    break;
                case 422:
                    if (error.response.data.hasOwnProperty("errors")) {
                        toastr.error(error.response.data.errors.message[0]);
                    } else {
                        toastr.error(error.response.data.error);
                    }
                    break;
                case 404:
                    toastr.error(i18n.general.invalid_link);
                    break;
                default:
            }
        } else if (isNaN(error)) {
            let errorsmsg = "";
            $.each(error, function(key, value) {
                errorsmsg += toastr.error(value[0]);
            });
            return errorsmsg;
        }
    },

    // returns error message for axios request
    fetchDataErrorMsg(error) {
        return error.response.data.errors.message[0];
    },

    // shows toastr notification for axios form request
    showErrorMsg(error) {
        this.setLastActivity();
        if (error.hasOwnProperty("error")) {
            if (error.error.indexOf(" ") >= 0) {
                toastr.error(error.error);
            } else {
                toastr.error(i18n.general[error.error]);
            }

            if (error.error === "token_expired") {
                router.push("/login");
            }
        } else if (error.hasOwnProperty("response") && error.response.status == 403) {
            toastr.error(i18n.general.permission_denied);
        } else if (
            error.hasOwnProperty("response") &&
            error.response.status == 422 &&
            error.response.data.hasOwnProperty("error")
        ) {
            toastr.error(error.response.data.error);
        } else if (
            error.hasOwnProperty("response") &&
            error.response.status == 422 &&
            error.response.data.hasOwnProperty("errors")
        ) {
            toastr.error(error.response.data.errors.message[0]);
        } else if (error.hasOwnProperty("response") && error.response.status == 404) {
            toastr.error(i18n.general.invalid_link);
        } else if (error.errors && error.errors.hasOwnProperty("message")) {
            toastr.error(error.errors.message[0]);
        } else if (
            error.response &&
            error.response.data &&
            error.response.data.errors &&
            error.response.data.errors.hasOwnProperty("message")
        ) {
            toastr.error(error.errors.message[0]);
        } else {
            if (error.message) {
                toastr.error(error.message);
            } else {
                let errorsmsg = "";
                $.each(error, function(key, value) {
                    errorsmsg += toastr.error(value[0]);
                });
                toastr.error(errorsmsg);
            }
        }
    },

    // returns error message for axios form request
    fetchErrorMsg(error) {
        return error.errors.message[0];
    },

    // returns error message for axios form request
    fetchFormErrorMsg(errors) {
        let errorsmsg = "";
        $.each(errors, function(key, value) {
            errorsmsg += toastr.error(value[0]);
        });
        return errorsmsg;
    },

    // round numbers as given precision
    roundNumber(number, precision) {
        precision = Math.abs(parseInt(precision)) || 0;
        const multiplier = Math.pow(10, precision);
        return Math.round(number * multiplier) / multiplier;
    },

    // round numbers as given precision
    formatNumber(number, decimal_place) {
        if (decimal_place === undefined) {
            decimal_place = 2;
        }
        return this.roundNumber(number, decimal_place);
    },

    // fill number with padding
    formatWithPadding(n, width, z) {
        z = z || "0";
        n = n + "";
        return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
    },

    // generates random string of certain length
    randomString(length) {
        if (length === undefined) {
            length = 40;
        }
        const chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let result = "";
        for (let i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
        return result;
    },

    // google map parse map address
    parseMapResult(obj) {
        // Construct basic data.
        const result = {
            address: obj.formatted_address,
            lat: obj.geometry.location.lat(),
            lng: obj.geometry.location.lng(),
        };

        // Add place ID.
        if (obj.place_id) {
            result.place_id = obj.place_id;
        }

        // Add place name.
        if (obj.name) {
            result.name = obj.name;
        }

        // Create search map for address component data.
        const map = {
            street_number: ["street_number"],
            street_name: ["street_address", "route"],
            city: ["locality"],
            state: [
                "administrative_area_level_1",
                "administrative_area_level_2",
                "administrative_area_level_3",
                "administrative_area_level_4",
                "administrative_area_level_5",
            ],
            post_code: ["postal_code"],
            country: ["country"],
        };

        // Loop over map.
        for (const k in map) {
            const keywords = map[k];

            // Loop over address components.
            for (let i = 0; i < obj.address_components.length; i++) {
                const component = obj.address_components[i];
                const component_type = component.types[0];

                // Look for matching component type.
                if (keywords.indexOf(component_type) !== -1) {
                    // Append to result.
                    result[k] = component.long_name;

                    // Append short version.
                    if (component.long_name !== component.short_name) {
                        result[k + "_short"] = component.short_name;
                    }
                }
            }
        }

        return result;
    },
    calculateCartAmount(list) {
        let amount = 0;
        let count = 0;
        const arr = [];
        $.each(list, function(key, value) {
            amount += value.qty * value.price;
            count += value.qty;
        });
        arr.amount = amount;
        arr.count = count;
        return arr;
    },
};