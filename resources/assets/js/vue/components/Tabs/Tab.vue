<template>
  <a class="tabs__bar-item" :class="{ 'tabs__bar-item--active': isActive }" @click="toggle">
    <div class="tabs__bar-item-content">
      <slot></slot>
    </div>
  </a>
</template>

<script>
export default {
  computed: {
    isActive () {
      return this.$parent.tab === this.id
    }
  },
  methods: {
    toggle () {
      // document.getElementById(this.href).classList.toggle('.is-active')
      this.$parent.tab = this.id
    }
  },
  props: ['id']
}
</script>

<style lang="css" scoped>
</style>