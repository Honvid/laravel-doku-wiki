<template>
    <div class="card recommend-books">
        <div class="card-header">
            {{ $t('recommend_books') }}
        </div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li v-for="book in books" :key="book.id" class="list-group-item">
                    <router-link :to="{ name: 'libraries.books-view', params: {id: book.id} }">
                        <i class="fa fa-book"></i>
                        {{ book.name }}
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
  import {getRecommendBooks} from '~/apis/libraries'

  export default {
    name: 'RecommendBooks',

    data() {
      return {
        books: []
      }
    },

    mounted() {
      getRecommendBooks().then(response => {
        this.books = response.data;
      }).catch(error => {
        console.log(error)
      }).finally(() => {
      });
    }
  }
</script>
<style>
    .recommend-books .card-body {
        padding: 0;
    }
</style>