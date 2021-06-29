require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import Vuetify from 'vuetify'
import '@mdi/font/css/materialdesignicons.css' 
import JsonExcel from "vue-json-excel";
import VueSweetalert2 from 'vue-sweetalert2';


Vue.use(Vuetify);
Vue.use(VueSweetalert2);


Vue.component('base-component', require('./components/BaseComponent.vue').default);
Vue.component("downloadExcel", JsonExcel);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),

});

