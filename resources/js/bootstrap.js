import Vue from "vue";
import Form from "./services/form";

window.Form = Form;

try {
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
    require("slick-carousel");
    require("./index");
    require("./main");
} catch (e) {}