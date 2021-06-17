require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import Vuetify from 'vuetify'
import '@mdi/font/css/materialdesignicons.css' 

Vue.use(Vuetify);


Vue.component('base-component', require('./components/BaseComponent.vue').default);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),

});
