<template>
  <div>
    <tabs v-model="currentTab">
      <tab
        v-for="tab in tabs"
        :key="tab.id"
        :id="tab.id"
      >
        <div class="iconbox">
          <i class="icon mdi" :class="tab.icon"></i>
          <div class="iconbox__text">{{ tab.name }}</div>
        </div>
      </tab>

      <tab-items v-model="currentTab" slot="items">
        <tab-item id="1">
          <todo-item-form
            :id="todo.id"
            :author.sync="todo.author"
            :email.sync="todo.email"
            :text.sync="todo.text"
            :image.sync="todo.image"
            @submit="onSubmit"
          />
        </tab-item>

        <tab-item id="2">
          <div class="mt-2">
            Preview
          </div>
        </tab-item>
      </tab-items>
    </tabs>
  </div>
</template>

<script>
import axios from 'axios'

import Tab from './Tabs/Tab'
import Tabs from './Tabs/Tabs'
import TabItem from './Tabs/TabItem'
import TabItems from './Tabs/TabItems'
import TodoItemForm from './TodoItemForm'

export default {
  data () {
    return {
      todo: {
        id: null,
        author: '',
        email: '',
        text: '',
        image: ''
      },
      currentTab: '1',
      tabs: [
        {
          id: '1',
          name: 'Todo',
          icon: 'mdi-file-document-box-outline'
        },
        {
          id: '2',
          name: 'Preview',
          icon: 'mdi-eye-outline'
        }
      ]
    }
  },
  methods: {
    onSubmit () {
      const fd = new FormData()

      if (this.todo.image && this.todo.image instanceof File) {
        fd.append('image', this.todo.image, this.todo.image.name)
      }

      fd.append('author', this.todo.author)
      fd.append('email', this.todo.email)
      fd.append('text', this.todo.text)

      axios.post('/todo', fd)
        .then(res => {
          console.log('Todo created')
          this.resetForm()
          this.$store.commit('snackbar/show', { message: 'Todo created succesfully' })
          location.reload() // @TODO create endpoint /api/todo and update Todos list via Vuex
        })
        .catch(err => {
          console.error(err)
        })
    },
    resetForm () {
      this.author = ''
      this.email = ''
      this.text = ''
      this.image = ''
    }
  },
  components: {
    Tab,
    Tabs,
    TabItem,
    TabItems,
    TodoItemForm
  }
}
</script>
