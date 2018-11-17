<template>
  <div class="snackbar snackbar--animated" :class="{ 'snackbar--active': isActive }">
    <div class="snackbar__content">
      {{ message }}
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    show: {
      get () {
        return this.value
      },
      set (value) {
        console.log('set', value)
        this.$emit('input', value)
      }
    }
  },
  watch: {
    show (value) {
      if (value) {
        this.showSnackbar().then(() => {
          this.$emit('input', false)
        })
      }
    }
  },
  data () {
    return {
      isActive: false
    }
  },
  methods: {
    showSnackbar () {
      return new Promise((resolve, reject) => {
        this.isActive = true
        setTimeout(() => {
          this.isActive = false
          resolve()
        }, this.timeout)
      })
    }
  },
  props: {
    value: {
      type: Boolean,
      required: true
    },
    timeout: {
      type: Number,
      default: 1500
    },
    message: {
      type: String,
      required: true
    }
  }
}
</script>

<style lang="css" scoped>
</style>