<template>
  <div class="todo card card--flat mb-4">
    <div class="todo__body">
      <div class="todo__media" v-if="image">
        <div class="todo__media-bg" :style="{ 'background-image': `url(/uploads/${image})` }"></div>
      </div>
      <div class="todo__text">{{ text }}</div>
    </div>
    <div class="postmeta flex ai-center mt-1">
      <div class="postmeta__item tip tip--cursor">
        <div class="iconbox">
          <i class="icon mdi mdi-account"></i>
          <div class="iconbox__text">{{ author }}</div>
        </div>
        <div class="tip__text">
          {{ email }}
        </div>
      </div>
      <div class="postmeta__item">
        <div class="iconbox">
          <i class="icon mdi mdi-calendar-range"></i>
          <div class="iconbox__text">{{ createdAt }}</div>
        </div>
      </div>
    </div>
    <div class="todo__actions">
      <div @click="editItem" class="btn btn--flat btn--icon btn--light">
        <div class="btn__content">
          <i class="icon mdi mdi-square-edit-outline"></i>
        </div>
      </div>
      <div @click="removeItem" class="btn btn--flat btn--icon btn--light red--text">
        <div class="btn__content">
          <i class="icon mdi mdi-trash-can-outline"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    editItem () {
      window.location.href = `/todo/edit/${this.id}`
    },
    removeItem () {
      window.location.href = `/todo/delete/${this.id}`
    }
  },
  props: ['id', 'text', 'status', 'author', 'email', 'image', 'createdAt']
}
</script>

<style lang="css" scoped>
</style>