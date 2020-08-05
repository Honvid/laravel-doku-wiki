<template>
    <card title="大纲" class="mt-10 sticky-top">
        <div class="toc"></div>
    </card>
</template>
<script>
  import * as tocbot from 'tocbot';
  export default {
    name: 'TocSidebar'
  }
</script>
<style lang="scss">
    @import "~tocbot/src/scss/tocbot";
</style>