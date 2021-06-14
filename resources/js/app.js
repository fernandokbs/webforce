require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import App from './components/App';
import router from './router';
import store from './store/store';

router.beforeEach(async (to, from, next) => {
    // set the current user on every request
    await store.dispatch("auth/setUser");

    // Check if route needs auth
    if ((to.path == "/login" || to.path == "/register") && store.getters['auth/isAuthenticated']) {
        next({ name: 'home' })
    }

    // Check if the route needs admin permission
    if(to.matched.some(record => record.meta.requiresAdmin)) {
        console.log("Admin is required");
        if(store.getters['auth/isAdmin']) {
            next();
        } else {
            next({ name: 'notfound' });
        }
    }
    
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
