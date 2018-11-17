<template>
  <div>
    <input style="display:none" type="file" :value="imageId" @change="onFileSelected" :name="name" ref="fileInput">

    <div v-if="selectedFile">
      <div class="flex ai-center jc-between">
        <button class="btn btn--flat btn--light btn--gray" @click.prevent="selectImage">
          <div class="btn__content">
            {{ selectedFile.name }}
          </div>
        </button>
        <img v-if="imageBuffer" :src="imageBuffer" width="100px" height="auto" class="img"/>
      </div>
    </div>

    <!-- Selected -->
    <div v-else>
      <!-- Upload -->
      <div v-if="!imageUrl">
        <button class="btn btn--flat btn--light btn--gray" @click.prevent="$refs.fileInput.click()">
          <div class="btn__content">
            Select Image
          </div>
        </button>
      </div>

      <!-- Remove -->
      <div v-if="imageUrl">
        <img :src="imageUrl" width="100px" height="auto">
        <button @click.prevent="removeImage">Remove Image</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  computed: {
    imageId: {
      get () {
        return this.value
      },
      set (value) {
        this.$emit('input', value)
      } 
    },
    imageUrl: {
      get () {
        return this.url
      },
      set (value) {
        this.$emit('update:url', value)
      } 
    }
  },
  watch: {
    selectedFile (val) {
      this.$emit('select', val)
    }
  },
  data () {
    return {
      selectedFile: null,
      imageBuffer: ''
    }
  },
  methods: {
    selectImage () {
      this.$refs.fileInput.click()
    },
    clearImage () {
      this.selectedFile = null
    },
    onFileSelected () {
      this.selectedFile = event.target.files[0]

      this.getImageBuffer()
        .then(buffer => {
          this.imageBuffer = buffer
        })
      
      console.log(event.target.files[0])
    },
    onUpload () {
      const fd = new FormData()
      fd.append('image', this.selectedFile, this.selectedFile.name)

      axios.post('/image')
        .then(res => {
          console.log('Uploaded succesfully', res)
        })
        .catch(err => {
          console.error(err)
        })
    },
    removeImage () {
      this.imageId = ''
      this.imageUrl = ''
    },
    getImageBuffer () {
      return new Promise((resolve, reject) => {
        const reader = new FileReader()
        reader.onload = (e) => {
          resolve(e.target.result)
        }
        reader.readAsDataURL(this.selectedFile);
      })
    }
  },
  props: ['value', 'url', 'name']
}
</script>

<style lang="stylus" scoped>
.btn--gray {
  background-color: #f1f1f1 !important
}

.img {
  display: block
  margin-bottom: 8px
}
</style>