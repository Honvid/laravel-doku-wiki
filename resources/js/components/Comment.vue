<template>
    <div class="comment-container">
        <form accept-charset="UTF-8" method="POST" action="/comments">
            <div class="form-group">
                <label for="comment-title">标题</label>
                <input type="text" name="title" class="form-control" id="comment-title">
            </div>
            <div class="form-group">
                <label for="comment-content">内容</label>
                <div id="comment-content"></div>
            </div>
            <input type="hidden" name="content">
            <input type="hidden" :value="objectType" name="object_type">
            <input type="hidden" :value="objectId" name="object_id">
            <input type="hidden" :value="token" name="_token">
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
</template>

<script>
  import Vditor from 'vditor'

  export default {
    name: 'comment',
    data() {
      return {
        editor: '',
        token: '',
      }
    },
    props: {
      objectType: {
        type: String,
        required: true,
        default: ''
      },
      objectId: {
        type: Number,
        required: true,
        default: 0
      },
    },
    created() {
      this.token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
    },
    mounted() {
      this.init()
    },
    methods: {
      init() {
        const content = document.querySelector('input[name="content"]');
        this.editor = new Vditor('comment-content', {
          toolbarConfig: {
            pin: true,
          },
          cache: {
            enable: false,
          },
          after: () => {
            this.editor.setValue('支持 markdown 语法')
          },
          blur (md) {
            content.setAttribute('value',md)
          },
        })
      },
    }
  }
</script>

<style lang="scss">
    @import "~vditor/src/assets/scss/index";
</style>