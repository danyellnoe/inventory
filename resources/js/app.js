require('./bootstrap');

import AddProductForm from "./components/AddProductForm/AddProductForm";
import Vue from 'vue';
import VueCurrencyInput from 'vue-currency-input';

Vue.use(VueCurrencyInput, {
    globalOptions: {
        currency: process.env.MIX_CURRENCY,
        locale: process.env.MIX_CURRENCY_LOCALE,
    }
});

const app = new Vue({
    el: '#app',

    components: {
        AddProductForm
    },
});
