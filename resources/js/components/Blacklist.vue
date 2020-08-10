<template>
  <ul class="list-group list-group-flush blacklist">
    <li v-for="blacklist in blacklists" :key="blacklist.id" class="list-group-item">
      <router-link
        class="text-decoration-none"
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
            class="text-decoration-none pl-2"
          >
            <span>{{ child.title }}</span>
          </router-link>
        </li>
      </ol>
    </li>
  </ul>
</template>

<script>
import { getBookBlacklist } from "~/apis/libraries";

export default {
  name: "Blacklist",

  data() {
    return {
      blacklists: [],
    };
  },

  props: {
    id: {
      type: Number,
      required: true,
    },
  },

  mounted() {
    getBookBlacklist(this.id)
      .then((response) => {
        this.blacklists = response.data;
      })
      .catch((error) => {
        console.log(error);
      })
      .finally(() => {});
  },
};
</script>
<style lang="scss">
.blacklist {
  .list-group-item {
    line-height: 2rem;
    margin: 0.5rem 1rem 0;
    border-style: dashed;
    padding: 0;
    a {
      display: inline-block;
      width: 100%;
      padding-left: 0.5rem;
      &:hover {
        background-color: rgba(0, 0, 0, 0.05);
      }
    }
    ol,
    li {
      padding: 0;
      list-style: none;
      border-bottom: 1px dashed rgba(0, 0, 0, 0.125);
      a {
        display: inline-block;
        width: 100%;
        &:hover {
          background-color: rgba(0, 0, 0, 0.05);
        }
        span {
          padding-left: 2rem !important;
        }
      }
      &:last-child {
        border: none;
      }
    }
  }
}
</style>
