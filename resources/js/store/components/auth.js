const state = {
  user : {},
  isAuthenticated: false,
  token: localStorage.getItem('access_token') ? localStorage.getItem('access_token') : null
};

const mutations = {
  login(state, token) {
    state.token = token
  },

  logout(state) {
    state.token = null;
    state.user = {};
    state.isAuthenticated = false;
  }
};

const actions = {
  login(context, token) {
    context.commit('login', token);
  },

  logout(context, token) {
    context.commit('logout');
  }
};

const getters = {
  isAuthenticated(state) {
    return state.isAuthenticated !== false;
  }
}

export default {
  state,
  actions,
  getters,
  mutations
};
