<template>
    <div class="row">
        <div class="col-md-3">
            <recommend-books></recommend-books>
        </div>

        <div class="col-md-9">
            <transition name="fade" mode="out-in">
                <card :title="$t('books')" class="books-card">
                    <div class="row">
                        <div v-for="book in books" class="col-sm-6 col-md-3">
                            <router-link :to="{ name: 'libraries.books-view', params: {id: book.id} }">
                            <div class="card">
                                <img src="https://img10.360buyimg.com/n1/jfs/t17938/59/1142276947/38769/2cd5ad43/5abb7e21Ne769a7b3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ book.name }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ book.author }}, {{ book.created_at }}</small></p>
                                </div>
                            </div>
                            </router-link>
                        </div>
                    </div>
                </card>
            </transition>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from 'vuex'
  import {getBooks} from '~/apis/libraries'
  import RecommendBooks from "~/components/RecommendBooks.vue";

  export default {
    components: {RecommendBooks},
    middleware: 'auth',
    scrollToTop: true,

    metaInfo() {
      return {title: this.$t('books')}
    },

    data() {
      return {
        books: [],
      }
    },

    computed: {
      ...mapGetters({
        user: 'auth/user'
      })
    },

    mounted() {
      getBooks().then(response => {
        this.books = response.data;
      }).catch(error => {
        console.log(error)
      }).finally(() => {
      });
    }
  }
</script>

<style lang="scss">
    .books-card {
        .card-body {
            .card-img-top {
                margin-top: 5px;
            }
        }
    }
</style>
