require('./bootstrap');

window.Vue = require('vue').default;

import ExampleComponent from './components/ExampleComponent';

const app = new Vue({
    el: '#app',
    components: {
        ExampleComponent
    }
});
