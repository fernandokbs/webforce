require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import App from './components/App';
import router from './router';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
