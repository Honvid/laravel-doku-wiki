<template>
    <div class="editor-preview-container">
        <div id="editor-preview-box" class="editor-preview"></div>
    </div>
</template>

<script>
  import Vditor from 'vditor'
  import * as tocbot from 'tocbot'

  export default {
    name: 'editor-preview',
    props: {
      content: {
        type: String,
        required: true,
        default: ''
      }
    },
    created() {
    },
    mounted() {
      this.vditor = Vditor.preview(document.querySelector('#editor-preview-box'), this.content, {
        speech: {
          enable: true,
        },
        anchor: 1,
        after() {
          if (window.innerWidth <= 768) {
            return
          }
          if (document.querySelector('#toc-container')) {
            tocbot.init({
              tocSelector: '#toc-container',
              contentSelector: '.markdown',
              headingSelector: 'h1, h2, h3',
              hasInnerContainers: false,
            })
          }
        },
      })
    }
  }
</script>

<style lang="scss">
    @import "~tocbot/src/scss/tocbot-core";

    #toc-container {
        ul, ol, li {
            /*font-size: 0.8rem !important;*/
            list-style: none;
        }
        h1::before, h2::before, h3::before, h4::before, h5::before, h6::before {
            display: block;
            content: " ";
            height: 60px;
            margin-top: -60px;
            visibility: hidden;
        }
        .toc-link::before {
            background-color: #eee;
            content: ' ';
            display: inline-block;
            height: inherit;
            left: 0;
            margin-top: -1px;
            position: absolute;
            width: 2px;
        }

        .is-active-link::before {
            background-color: #54BC4B;
        }
    }
</style>