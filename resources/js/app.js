require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import App from './components/App';
import router from './router';
import store from './store/store';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});
