// Register plugin
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Import components
import Home from './components/pages/Home';
import Login from './components/pages/auth/Login';
import Register from './components/pages/auth/Register';
import ProductShow from './components/pages/ProductShow';
import PageNotFound from './components/pages/errors/404';

// Admin routes
import AdminHome from './components/pages/admin/AdminHome';
import ProductIndex from './components/pages/admin/products/Index';
import ProductCreate from './components/pages/admin/products/Create';

// Client routes
import ClientHome from './components/pages/client/Home';

// Checkout
import Checkout from './components/pages/Checkout';

const routes = [
  // Auth components
  { path: '/login', component: Login, name: 'login' },
  { path: '/register', component: Register, name: 'register' },
  { path: '/', component: Home, name: 'home' },
  { path: '/:slug', component: ProductShow, name: 'product.show' },
  { path: '/checkout', component: Checkout, name: 'checkout' },

  {
    path: '/admin',
    component: AdminHome,
    name: 'admin',
    meta: { requiresAuth: true, requiresAdmin: true },
    children: [
      {
        path: 'products',
        component: ProductIndex
      },
      {
        path: 'products/new',
        component: ProductCreate,
        name: 'products.new'
      }
    ]
  },

  { path: "/404", component: PageNotFound, name: 'notfound' },
  { path: "*", redirect: "/404" }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router