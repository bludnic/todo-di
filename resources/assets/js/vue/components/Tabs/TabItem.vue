<template>
  <div class="tabs__content" v-show="isActive">
    <slot></slot>
  </div>
</template>

<script>
export default {
  computed: {
    isActive () {
      return this.id === this.$parent.value
    }
  },
  props: ['id']
}
</script>

<style lang="css" scoped>
</style>