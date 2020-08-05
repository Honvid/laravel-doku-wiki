<template>
    <div class="row page-contianer">
        <div class="col-md-3">
            <recommend-books></recommend-books>
            <toc-sidebar v-if="loading"></toc-sidebar>
        </div>

        <div class="col-md-9">
            <transition name="fade" mode="out-in">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ page.title }}</h5>
                        <div>
                            <router-link :to="'/users'" class="user-name">{{page.author}}</router-link>
                            <span> · 发布于 {{ page.created_at }} </span>
                            <span> · 最后由 <router-link :to="'/users'">{{page.author}}</router-link> 回复于 {{ page.updated_at }} </span>
                            <span> · 2 次阅读</span>
                        </div>
                    </div>

                    <div class="card-body page-content">
                        <markdown-render :content="page.content" :id="page.id" :toc="true" v-if="loading"></markdown-render>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>

  import {getPage} from '~/apis/libraries'
  import MarkdownRender from "~/components/MarkdownRender.vue";
  import TocSidebar from "../../../components/TocSidebar.vue";

  export default {
    components: {
      TocSidebar,
      MarkdownRender
    },
    middleware: 'auth',
    scrollToTop: true,

    metaInfo() {
      return {title: this.page.title + '|' + this.$t('books')}
    },

    data() {
      return {
        page: [],
        loading : false
      }
    },

    mounted() {
      getPage(this.$route.params.id).then(response => {
        this.page = response.data;
      }).catch(error => {
        console.log(error)
      }).finally(() => {
        this.loading = true
      });
    }
  }
</script>