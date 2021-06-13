import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import auth from './components/auth';
import cart from './components/cart';

export default new Vuex.Store({
  modules: {
     auth,
     cart
   }
});