<template>
  <card title="大纲" class="mt-10 sticky-top" :class="show ? 'show':'hide'">
    <div class="toc"></div>
  </card>
</template>
<script>
import * as tocbot from "tocbot";
export default {
  name: "TocSidebar",
  data() {
    return {
      show: false,
    };
  },
  created() {},
  mounted() {},
};
</script>
<style lang="scss">
@import "~tocbot/src/scss/tocbot";
</style>
