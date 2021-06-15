const state = {
  products: localStorage.getItem('products') ? JSON.parse(localStorage.getItem('products')) : []
};

const mutations = {
  addToCard(state, item) {
    state.products.push({item: item });
  },
};

const actions = {
  addToCart(context, productId) {
    context.commit('addToCard', productId);
  }
};

const getters = {
  getCart() {
    return state.products;
  }
};

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters
};
