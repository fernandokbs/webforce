require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import Vuetify from 'vuetify'
import App from './components/App';
import router from './router';

Vue.use(Vuetify)

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    vuetify : new Vuetify(),
    router
});
