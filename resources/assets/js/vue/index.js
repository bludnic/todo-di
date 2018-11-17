import Vue from 'vue'

import store from './store'
import TodoItem from './components/TodoItem'
import TodoItems from './components/TodoItems'
import TodoItemAdd from './components/TodoItemAdd'
import AppSnackbar from './components/AppSnackbar'

// Vue.config.productionTip = false

const app = new Vue({
  store,
  components: {
    TodoItem,
    TodoItems,
    TodoItemAdd,
    AppSnackbar
  }
})

if (document.getElementById('app')) {
  app.$mount('#app')
}
