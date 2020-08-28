<template>
  <div class="row">
    <div class="col-md-3">
      <recommend-books></recommend-books>
    </div>

    <div class="col-md-9">
      <transition name="fade" mode="out-in">
        <card :title="$t('books')" :has-footer="true" class="books-card">
          <category-selecter @getBooks="getBooks" />

          <div class="row">
            <div v-for="book in books" :key="book.id" class="col-sm-6 col-md-3">
              <router-link
                :to="{ name: 'libraries.books.view', params: {id: book.id} }"
                class="text-decoration-none"
              >
                <div class="card">
                  <img :src="book.cover" class="card-img-top" :alt="book.name" />
                  <div class="card-body">
                    <h5 class="card-title">{{ book.name }}</h5>
                    <p v-if="book.authors.length > 1">
                      <small class="text-muted">
                        <span v-for="author in book.authors" :key="author.id">{{ author.name }}</span>
                      </small>
                    </p>
                    <p v-else>
                      <small class="text-muted">佚名</small>
                    </p>
                  </div>
                </div>
              </router-link>
            </div>
            <div v-if="books.length === 0" class="ml-3">
              <p>未找到对应书籍。</p>
            </div>
          </div>
          <template v-slot:footer v-if="total > 1">
            <paginate
              :value="page"
              :page-count="total"
              :click-handler="clickCallback"
              :first-last-button="true"
            ></paginate>
          </template>
        </card>
      </transition>
    </div>
  </div>
</template>

<script>
import merge from "webpack-merge";
import { mapGetters } from "vuex";
import { getBooks } from "~/apis/libraries";
import Paginate from "~/components/Paginate.vue";
import RecommendBooks from "~/components/RecommendBooks.vue";
import CategorySelecter from "~/components/CategorySelecter.vue";

export default {
  components: { RecommendBooks, Paginate, CategorySelecter },
  middleware: "auth",
  scrollToTop: true,

  metaInfo() {
    return { title: this.$t("books") };
  },

  data() {
    return {
      books: [],
      total: 0,
      page: this.$route.query.page | 1,
      loading: true,
    };
  },

  mounted() {
    this.getBooks();
  },

  watch: {
    $route(to, from) {
      if (to.hash === "") {
        this.getBooks();
      }
    },
  },
  methods: {
    clickCallback(pageNum) {
      this.page = pageNum;
      this.$router.push({
        query: merge(this.$route.query, { page: pageNum }),
      });
    },
    getBooks() {
      this.loading = false;
      getBooks(this.$route.query)
        .then((response) => {
          this.books = response.data.data;
          this.total = response.data.total;
          this.page = response.data.current_page;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.loading = false;
        });
    },
  },
};
</script>

<style lang="scss">
.books-card {
  .card-body {
    .card-img-top {
      margin-top: 5px;
    }
    .card-title {
      margin-bottom: 0;
    }
    p {
      margin-bottom: 0;
    }
  }
}
</style>
