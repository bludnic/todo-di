import axios from 'axios'

const state = () => ({
  todos: []
})

const mutations = {
  setTodos (state, todos) {
    state.todos = todos
  }
}

const actions = {
  fetchTodos ({ commit }) {
    axios.get('/api/todos')
      .then(todos => {
        commit('setTodos', todos)
      })
  }
}

export default {
  state,
  mutations,
  actions,
  namespaced: true
}
