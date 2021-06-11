import Vue from 'vue'
import VueRouter from 'vue-router'

// Import components

import Foo from './components/pages/Foo';

Vue.use(VueRouter)

const routes = [
  { path: '/', component: Foo }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router