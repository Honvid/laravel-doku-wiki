<template>
  <div class="row">
    <div class="col-md-3">
      <sidebar-blacklist v-if="loading" :book="page.book_id" :id="page.id"></sidebar-blacklist>
      <toc-sidebar v-if="loading" class="toc-container"></toc-sidebar>
    </div>

    <div class="col-md-9 page-contianer">
      <transition name="fade" mode="out-in">
        <div class="card">
          <div class="card-header">
            <h5>
              {{ page.title }}
              <router-link
                :to="{name:'libraries.pages.edit', params: {id: page.id}}"
                class="float-right"
              >
                <font-awesome-icon icon="edit" fixed-width />
              </router-link>
            </h5>
            <small>
              <router-link :to="'/users'" class="user-name">{{page.author}}</router-link>
              <span v-if="page.authors"><e v-for="author in page.authors" v-bind:key="author.id">{{author.name}}</e></span>
              <span v-if="page.editor">
                · 最后由
                <router-link :to="'/users/' + page.editor.id">{{page.editor.name}}</router-link>
                回复于 {{ page.updated_at }}
              </span>
              <span v-if="page.editor">
                · 最后由
                <router-link :to="'/users/' + page.editor.id">{{page.editor.name}}</router-link>
                回复于 {{ page.updated_at }}
              </span>
              <span>· {{ page.view_count }} 次阅读</span>
            </small>
          </div>
          <div class="card-body page-content">
            <markdown-render :content="page.content" :id="page.id" :toc="true" v-if="loading"></markdown-render>
          </div>
          <scroll-top />
        </div>
      </transition>
    </div>
  </div>
</template>
<script>
import { getPage } from "~/apis/libraries";
import MarkdownRender from "~/components/MarkdownRender.vue";
import TocSidebar from "~/components/TocSidebar.vue";
import SidebarBlacklist from "~/components/SidebarBlacklist.vue";
import ScrollTop from "~/components/ScrollTop.vue";

export default {
  components: {
    TocSidebar,
    ScrollTop,
    MarkdownRender,
    SidebarBlacklist,
  },
  middleware: "auth",
  scrollToTop: true,

  metaInfo() {
    return { title: this.page.title + "|" + this.$t("books") };
  },

  data() {
    return {
      page: {},
      loading: false,
    };
  },

  props: ["id"],

  mounted() {
    this.getPage();
  },

  methods: {
    getPage() {
      this.loading = false;
      getPage(this.id)
        .then((response) => {
          this.page = response.data;
          this.$nextTick(() => {
            this.loading = true;
          });
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {});
    },
  },
  watch: {
    $route(to, from) {
      if (to.hash === "") {
        this.getPage();
      }
    },
  },
};
</script>
<style lang="scss">
.recommend-books {
  margin-bottom: 1rem;
}
.page-contianer {
  .card {
    margin-bottom: 2rem;
    .card-header h5 {
      margin-bottom: 0.5rem;
    }
  }
}
</style>
