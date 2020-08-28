<template>
  <card title="大纲" class="mt-10 sticky-top" :class="show">
    <div class="toc" ref="toc"></div>
  </card>
</template>
<script>
import * as tocbot from "tocbot";
export default {
  name: "TocSidebar",
  computed: {
    // 计算属性的 getter
    show: function () {
      let a = 'hide'
      console.log(this.$refs.toc);
        return a;
    }
  }
};
</script>
<style lang="scss">
@import "~tocbot/src/scss/tocbot";
</style>
