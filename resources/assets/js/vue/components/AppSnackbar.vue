<template>
  <snackbar
    v-model="show"
    :message="message"
  />
</template>

<script>
import Snackbar from './Snackbar'

export default {
  computed: {
    show: {
      get () {
        return this.$store.state.snackbar.snackbar.show
      },
      set (value) {
        this.$store.commit('snackbar/changeState', value)
      }
    },
    message () {
      return this.$store.state.snackbar.snackbar.message
    }
  },
  components: {
    Snackbar
  }
}
</script>

<style lang="css" scoped>
</style>