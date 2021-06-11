import Vue from 'vue'
import VueRouter from 'vue-router'

// Import components

import Home from './components/pages/Home';

Vue.use(VueRouter)

const routes = [
  { path: '/', component: Home }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router