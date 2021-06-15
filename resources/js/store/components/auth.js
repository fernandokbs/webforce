import axios from '../../request';

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

  setUser(state, user) {
    state.user = user;
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

  setUser(context) {
    if(state.isAuthenticated) {
      return new Promise((resolve, reject) => {
        axios.get('me')
          .then(response => {
              context.commit('setUser', response.data);
              resolve(response)
          })
          .catch(error => {
            reject(error)
          })
      })
    }
  },

  logout(context) {
    context.commit('logout');
  }
};

const getters = {
  isAuthenticated(state) {
    return state.isAuthenticated !== false;
  },

  isAdmin(state) {
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
