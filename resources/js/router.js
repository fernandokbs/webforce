// Register plugin
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Import components
import Home from './components/pages/Home';
import Login from './components/pages/auth/Login';
import Register from './components/pages/auth/Register';
import ProductShow from './components/pages/ProductShow';

// Admin routes
import AdminHome from './components/pages/admin/AdminHome';
import ProductIndex from './components/pages/admin/products/Index';

// Client routes
import ClientHome from './components/pages/client/Home';

const routes = [
  // Auth components
  { path: '/login', component: Login, name: 'login' },
  { path: '/register', component: Register, name: 'register' },
  { path: '/', component: Home, name: 'home' },
  { path: '/:slug', component: ProductShow, name: 'product.show' },

  {
    path: '/admin',
    component: AdminHome,
    name: 'admin',
    children: [
      {
        path: 'products',
        component: ProductIndex,
        meta: { requiresAuth: true }
      }
    ]
  },
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router