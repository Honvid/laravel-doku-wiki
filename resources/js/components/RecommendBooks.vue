<template>
  <card class="recommend-books" :title="$t('recommend_books')">
    <ul class="recommend-book-list">
      <li v-for="book in books" :key="book.id" class="recommend-book-item">
        <router-link
          :to="{ name: 'libraries.books-view', params: {id: book.id} }"
          :active-class="'active'"
          class="text-decoration-none"
        >
          <font-awesome-icon icon="book" fixed-width />
          {{ book.name }}
        </router-link>
      </li>
    </ul>
  </card>
</template>

<script>
import { getRecommendBooks } from "~/apis/libraries";
import Card from "./Card.vue";

export default {
  components: { Card },
  name: "RecommendBooks",

  data() {
    return {
      books: [],
    };
  },

  mounted() {
    getRecommendBooks()
      .then((response) => {
        this.books = response.data;
      })
      .catch((error) => {
        console.log(error);
      })
      .finally(() => {});
  },
};
</script>
<style lang="scss">
.recommend-books {
  .card-body {
    padding: 0;
    .recommend-book-list {
      margin: 0;
      list-style: none;
      padding: 0.5rem 1rem;
      .recommend-book-item {
        margin: 0.2rem;
        list-style: none;
        line-height: 1.5rem;
      }
    }
  }
}
</style>
