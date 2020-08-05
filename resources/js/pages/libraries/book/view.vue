<template>
    <div class="row">
        <div class="col-md-3">
            <recommend-books></recommend-books>
        </div>

        <div class="col-md-9">
            <transition name="fade" mode="out-in">
                <div class="card">
                    <div class="card-header">
                         <h5>{{ book.name }} <small>{{ book.author }} - {{ book.created_at }}</small></h5>
                    </div>

                    <div class="card-body">
                        <markdown-render :content="book.desc" :id="book.id" v-if="book.desc"></markdown-render>
                        <blacklist :id="book.id" v-if="book.id"></blacklist>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from 'vuex'
  import {getBook} from '~/apis/libraries'
  import RecommendBooks from "~/components/RecommendBooks.vue";
  import MarkdownRender from "~/components/MarkdownRender.vue";
  import Blacklist from "~/components/Blacklist.vue";

  export default {
    components: {
      Blacklist,
      MarkdownRender,
      RecommendBooks
    },
    middleware: 'auth',
    scrollToTop: true,

    metaInfo() {
      return {title: this.book.name + '|' + this.$t('books')}
    },

    data() {
      return {
        book: [],
      }
    },

    mounted() {
      getBook(this.$route.params.id).then(response => {
        this.book = response.data;
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
