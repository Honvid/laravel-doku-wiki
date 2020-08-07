<template>
  <div class="book-blacklist">
    <h1>目录</h1>
    <ul class="list-group list-group-flush">
      <li v-for="blacklist in blacklists" :key="blacklist.id" class="list-group-item">
        <router-link
          :to="{ name: 'libraries.pages-view', params: { id: blacklist.id} }"
        >{{ blacklist.title }}</router-link>
        <ol v-if="blacklist.children">
          <li
            class="page-item"
            v-for="child in blacklist.children"
            :data-id="child.id"
            :key="child.id"
          >
            <router-link
              :to="{ name: 'libraries.pages-view', params: { id: child.id} }"
            >{{ child.title }}</router-link>
          </li>
        </ol>
      </li>
    </ul>
  </div>
</template>

<script>
import { getBookBlacklist } from "~/apis/libraries";

export default {
  name: "Blacklist",

  data() {
    return {
      blacklists: []
    };
  },

  props: {
    id: {
      type: Number,
      required: true
    }
  },

  mounted() {
    getBookBlacklist(this.id)
      .then(response => {
        this.blacklists = response.data;
      })
      .catch(error => {
        console.log(error);
      })
      .finally(() => {});
  }
};
</script>
<style>
.recommend-books .card-body {
  padding: 0;
}
</style>
