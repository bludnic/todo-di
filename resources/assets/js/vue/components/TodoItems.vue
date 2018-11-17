<template>
  <div>
    <todo-item
      v-for="todo in todos"
      :key="todo.id"
      :id="todo.id"
      :text="todo.text"
      :status="todo.status"
      :author="todo.author"
      :email="todo.email"
      :image="todo.image"
      :created-at="todo.created_at"
    />
  </div>
</template>

<script>
import cloneDeep from 'lodash/cloneDeep'
import TodoItem from './TodoItem'

export default {
  mounted () {
    this.todos = cloneDeep(this.items)
  },
  data () {
    return {
      todos: []
    }
  },
  components: {
    TodoItem
  },
  props: ['items']
}
</script>

<style lang="css" scoped>
</style>