const state = {
  user : {},
  isAuthenticated: !!localStorage.getItem('access_token'),
  token: localStorage.getItem('access_token') ? localStorage.getItem('access_token') : null
};

const mutations = {
  login(state, token) {
    state.token = token;
    state.isAuthenticated = true;
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

  logout(context) {
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
