<template>
  <form @submit.prevent="onSubmit" class="mt-2">
    <div class="flex flex-wrap">
      <div class="xs12 mb-1">
        <input
        v-model="authorSync"
        type="text"
        name="Name"
        placeholder="Name"
        required
        >
      </div>
      <div class="xs12 mb-1"> 
        <input
        v-model="emailSync"
        type="email"
        name="email"
        placeholder="E-mail"
        required
        >
      </div>
      <div class="xs12 mb-1">
        <textarea
        v-model="textSync"
        name="Todo text"
        placeholder="Todo text"
        required
        />
      </div>
      <div class="xs12 mb-1">
        <image-upload
          name="img"
          :url="imageSync"
          @select="onImageSelect"
        />
      </div>
      <div class="xs12">
        <button class="btn" type="submit">
          <div class="btn__content">Add</div>
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import ImageUpload from './ImageUpload'

export default {
  computed: {
    idSync: {
      get () {
        return this.id
      },
      set (value) {
        this.$emit('update:id', value)
      }
    },
    authorSync: {
      get () {
        return this.author
      },
      set (value) {
        this.$emit('update:author', value)
      }
    },
    emailSync: {
      get () {
        return this.email
      },
      set (value) {
        this.$emit('update:email', value)
      }
    },
    textSync: {
      get () {
        return this.text
      },
      set (value) {
        this.$emit('update:text', value)
      }
    },
    imageSync: {
      get () {
        return this.image
      },
      set (value) {
        this.$emit('update:image', value)
      }
    }
  },
  methods: {
    onSubmit () {
      this.$emit('submit')
    },
    onImageSelect (file) {
      console.log('Image selected', file)
      this.imageSync = file
    }
  },
  components: {
    ImageUpload
  },
  props: {
    id: {
      type: Number
    },
    author: {
      type: String,
      required: true
    },
    email: {
      type: String,
      required: true
    },
    text: {
      type: String,
      required: true
    },
    image: {
      type: null // asbtract, can be Image URL (String) or type File
    }
  }
}
</script>

<style lang="css" scoped>
</style>