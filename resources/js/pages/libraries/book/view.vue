<template>
  <div class="row">
    <div class="col-md-3">
      <recommend-books></recommend-books>
    </div>

    <div class="col-md-9 book-detail">
      <transition name="fade" mode="out-in">
        <card :title="book.name">
          <div class="media">
            <img :src="book.cover" class="mr-3 w-25" :alt="book.cover" />
            <div class="media-body">
              <h5>{{book.name}}</h5>
              <p class="book-item">
                <span class="tag">作者</span>
                <router-link
                  :to="{ name: 'libraries.books-index', params: {author: author.id} }"
                  class="mr-2"
                  v-for="author in book.authors"
                  :key="author.id"
                >{{ author.name }}</router-link>
              </p>

              <p class="book-item">
                <span class="tag">分类</span>
                <router-link
                  :to="{ name: 'libraries.books-index', params: {category_id: category.id} }"
                  class="btn btn-primary btn-sm mr-2"
                  v-for="category in book.categories"
                  :key="category.id"
                >{{ category.name }}</router-link>
              </p>
              <p class="book-item">
                <span class="tag">版本</span>
                {{ book.edit_count}}
              </p>
              <p class="book-item">
                <span class="tag">最后更新</span>
                {{ book.updated_at}}
              </p>
              <p class="book-item">
                <span class="btn btn-primary btn-round mr-3">文章({{book.page_count}})</span>
                <span class="btn btn-success btn-round mr-3">阅读({{book.view_count}})</span>
                <span class="btn btn-info btn-round mr-3">评论({{book.comment_count}})</span>
              </p>
            </div>
          </div>
          <hr class="mb-3 mt-3" />
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                id="book-info-tab"
                data-toggle="tab"
                href="#book-info"
                role="tab"
                aria-controls="book-info"
                aria-selected="true"
              >简介</a>
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="book-blacklist-tab"
                data-toggle="tab"
                href="#book-blacklist"
                role="tab"
                aria-controls="book-blacklist"
                aria-selected="false"
              >目录</a>
            </li>
          </ul>
          <div class="tab-content">
            <div
              class="tab-pane fade show active"
              id="book-info"
              role="tabpanel"
              aria-labelledby="book-info-tab"
            >
              <markdown-render :content="book.desc" :id="book.id" v-if="book.desc"></markdown-render>
            </div>
            <div
              class="tab-pane fade"
              id="book-blacklist"
              role="tabpanel"
              aria-labelledby="book-blacklist-tab"
            >
              <blacklist :id="book.id" v-if="book.id"></blacklist>
            </div>
          </div>
        </card>
      </transition>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { getBook } from "~/apis/libraries";
import RecommendBooks from "~/components/RecommendBooks.vue";
import MarkdownRender from "~/components/MarkdownRender.vue";
import Blacklist from "~/components/Blacklist.vue";

export default {
  components: {
    Blacklist,
    MarkdownRender,
    RecommendBooks
  },
  middleware: "auth",
  scrollToTop: true,

  metaInfo() {
    return { title: this.book.name + "|" + this.$t("books") };
  },

  data() {
    return {
      book: []
    };
  },

  mounted() {
    getBook(this.$route.params.id)
      .then(response => {
        this.book = response.data;
      })
      .catch(error => {
        console.log(error);
      })
      .finally(() => {});
  }
};
</script>

<style lang="scss">
.book-detail {
  .card-body {
    .media-body {
      p.book-item {
        margin: 0.2rem 0;
        span.tag {
          display: inline-block;
          width: 70px;
          margin: 0 0.75rem 0 0;
          text-align: justify;
          text-align-last: justify;
        }
      }
    }
  }
}
</style>
