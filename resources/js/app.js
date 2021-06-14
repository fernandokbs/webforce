require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import App from './components/App';
import router from './router';
import store from './store/store';

router.beforeEach(async (to, from, next) => {
    // set the current user on every request
    await store.dispatch("auth/setUser");

    
    next();
});

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});
