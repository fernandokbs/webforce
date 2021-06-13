const state = {
  user : {},
  isAuthenticated: !!localStorage.getItem('access_token'),
  token: localStorage.getItem('access_token') ? localStorage.getItem('access_token') : null
};

const mutations = {
  login(state, token, user) {
    state.user = user;
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
  login(context, token, user) {
    context.commit('login', token, user);
  },

  logout(context) {
    context.commit('logout');
  }
};

const getters = {
  isAuthenticated(state) {
    return state.isAuthenticated !== false;
  },

  isAdmin() {
    return state.user.admin;
  }
}

export default {
  namespaced: true,
  state,
  actions,
  getters,
  mutations
};
