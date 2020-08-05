<template>
    <div class="card">
        <div v-if="title" class="card-header">
            <h5>{{ title }}</h5>
        </div>

        <div class="card-body">
            <slot />
        </div>
        <div class="card-footer" v-if="hasFooter">
            <slot name="footer" />
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Card',

    props: {
      title: {type: String, default: null},
      hasFooter: {type: Boolean, default: false}
    }
  }
</script>
<style lang="scss">
    .card-header h5 {
        margin: 0;
    }
</style>
