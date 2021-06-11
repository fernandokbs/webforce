// Register plugin
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Import components
import Home from './components/pages/Home';
import Login from './components/pages/auth/Login';
import Register from './components/pages/auth/Register';

const routes = [
  // Auth components
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/', component: Home },
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router