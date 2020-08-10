<template>
  <div :id="'markdown-render' + id" class="markdown"></div>
</template>
<script>
import Vditor from "vditor";
export default {
  name: "MarkdownRender",
  props: {
    id: [Number, String],
    toc: {
      type: Boolean,
      default: false,
    },
    content: {
      type: String,
      default: "",
    },
  },
  methods: {
    previewRender(id) {
      Vditor.preview(
        document.querySelector("#markdown-render" + id),
        this.content,
        {
          speech: {
            enable: true,
          },
          after: () => {
            if (window.innerWidth <= 768) {
              return;
            }
            if (this.toc && document.querySelector(".toc")) {
              tocbot.init({
                tocSelector: ".toc",
                contentSelector: ".page-content",
                headingSelector: "h1, h2, h3",
                hasInnerContainers: false,
              });
            }
          },
        }
      );
    },
  },
  mounted() {
    this.previewRender(this.id);
  },
};
</script>
