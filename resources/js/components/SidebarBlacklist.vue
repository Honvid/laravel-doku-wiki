<template>
  <card :title="'目录'">
    <ul class="backlist-sidebar hide-ios">
      <li
        class="chapter-item"
        :key="item.id"
        :data-id="item.id"
        v-for="item in blacklist"
        :class="{ active: item.id === current || active}"
      >
        <router-link
          :to="{ name: 'libraries.pages.view', params: { id: item.id} }"
          :active-class="'active'"
        >{{ item.title }}</router-link>
        <ol v-if="item.children">
          <li v-for="child in item.children" :key="child.id" :data-id="child.id">
            <router-link
              :to="{ name: 'libraries.pages.view', params: { id: child.id} }"
              :active-class="'active'"
            >{{ child.title }}</router-link>
          </li>
        </ol>
      </li>
    </ul>
  </card>
</template>

<script>
import { getBookBlacklist } from "~/apis/libraries";

export default {
  name: "SidebarBlacklist",
  data() {
    return {
      blacklist: [],
      current: 0,
      active: false,
    };
  },
  props: {
    book: {
      type: Number,
      required: true,
    },
    id: {
      type: Number,
      required: true,
    },
  },
  methods: {
    collapse(id, isCollapse) {
      let items = document.querySelectorAll(".chapter-item");
      items.forEach((item) => {
        let currentId = parseInt(item.getAttribute("data-id"));
        item.classList.toggle(
          "active",
          (currentId === this.current && isCollapse) ||
            (currentId === id && !isCollapse)
        );
      });
    },
  },
  mounted() {
    getBookBlacklist(this.book)
      .then((response) => {
        for (let item of response.data) {
          if (item.id === this.id) {
            this.current = item.id;
            break;
          }
          if (item.children) {
            for (let child of item.children) {
              if (child.id === this.id) {
                this.current = item.id;
                break;
              }
            }
          }
        }
        this.blacklist = response.data;
      })
      .catch((error) => {
        console.log(error);
      })
      .finally(() => {});
  },
};
</script>
<style lang="scss">
.card {
  margin-bottom: 1rem;
  .backlist-sidebar {
    padding: 0;
    font-size: 0.9rem !important;
    list-style: none;
    li,
    ol,
    ol li {
      padding: 0;
      list-style: none;
      a {
        font-size: 1rem;
        padding-left: 0.5rem;
        line-height: 1.8rem;
        text-decoration: none;
        &.active {
          width: 100%;
          display: block;
          border-radius: 5px;
          background-color: rgba(0, 0, 0, 0.05);
        }
      }
    }
    li {
      &.active {
        ol {
          display: block;
        }
      }
      &:hover{
          ol {
          display: block;
        }
      }
      ol {
        display: none;
        a {
          padding-left: 1.2rem;
        }
      }
    }
  }
}
</style>
