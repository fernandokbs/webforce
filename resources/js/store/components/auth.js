const state = {
  user : {},
  token: localStorage.getItem('access_token') ? localStorage.getItem('access_token') : null
};

const mutations = {
  authSuccess(state, token) {
    state.token = token
  },
};

const actions = {
  saveToken(context, token) {
    context.commit('authSuccess', token)
  },
};

export default {
  state,
  actions,
  mutations
};
