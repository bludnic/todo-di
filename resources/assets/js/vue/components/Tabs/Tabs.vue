<template>
  <div class="tabs">
    <div class="tabs__bar">
      <slot></slot>
    </div>
    <slot name="items"></slot>
  </div>
</template>

<script>
export default {
  computed: {
    tab: {
      get () {
        return this.value
      },
      set (value) {
        this.$emit('input', value)
      }
    }
  },
  props: ['value']
}
</script>

<style lang="css" scoped>
</style>