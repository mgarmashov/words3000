export default {
  state: {
    modalLoginVisible: false,
  },
  mutations: {
    showModalLogin(state) {
      state.modalLoginVisible = true
    },
    hideModalLogin(state) {
      state.modalLoginVisible = false
    },
  },
  getters: {
    modalLoginVisible(state)  {
      return state.modalLoginVisible
    }
  },
  actions: {
    showModalLogin ({commit}) {
      commit('showModalLogin')
    },
    hideModalLogin ({commit}) {
      commit('hideModalLogin')
    }
  }

}