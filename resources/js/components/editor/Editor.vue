<template>
    <div class="editor-preview-container">
        <div id="editor-preview-box" class="editor-preview"></div>
    </div>
</template>

<script>
  import Vditor from 'vditor'

  export default {
    name: 'editor',
    data() {
      return {
        vditor: ''
      }
    },
    props: {
      content: {
        type: String,
        required: true
      }
    },
    created() {
    },
    mounted() {
      this.init()
    },
    methods: {
      init() {
        this.vditor = new Vditor('editor-preview-box', {
          markdown: {

          },
          toolbarConfig: {
            pin: true,
          },
          cache: {
            enable: false,
          },
          after: () => {
            this.vditor.setValue('hello, Vditor + Vue!')
          },
        }).renderPreview(this.content)
      },
    }
  }
</script>

<style lang="scss">
@import "~vditor/src/assets/scss/index";
</style>