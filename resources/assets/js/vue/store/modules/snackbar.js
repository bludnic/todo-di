const state = () => ({
  snackbar: {
    show: false,
    message: ''
  }
})

const mutations = {
  show (state, { message }) {
    state.snackbar.message = message
    state.snackbar.show = true
  },
  changeState (state, value) {
    state.snackbar.show = value
  }
}

export default {
  state,
  mutations,
  namespaced: true
}
