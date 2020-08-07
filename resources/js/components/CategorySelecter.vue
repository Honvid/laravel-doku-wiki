<template>
  <div class="media categories">
    <h6 class="mr-3 mt-1">分类</h6>
    <div class="media-body mb-3">
      <nav class="nav category-parent">
        <span class="nav-link rounded" :class="categoryId === 0 ? 'active' : ''" @click="all()">全部</span>
        <span
          class="nav-link rounded"
          v-for="category in categories"
          :key="category.id"
          :class="categoryId === category.id ? 'active': ''"
          @click="categoryQuery(category.id)"
        >{{ category.name }}</span>
      </nav>
      <div class="category-children" v-if="children.length > 1">
        <span class="btn btn-sm" :class="childId === 0 ? 'active' : ''" @click="allChild()">全部</span>
        <span
          v-for="child in children"
          :key="child.id"
          class="btn btn-sm"
          :class="childId === child.id ? 'active': ''"
          @click="childQuery(child.id)"
        >{{ child.name }}</span>
      </div>
    </div>
  </div>
</template>
<script>
import merge from "webpack-merge";
import { getCategories } from "~/apis/category";
export default {
  name: "CategorySelecter",
  data() {
    return {
      categoryId: this.$route.query.category_id | 0,
      categories: [],
      children: [],
      childId: 0
    };
  },
  mounted() {
    getCategories()
      .then(response => {
        for (let category of response.data) {
          if (this.categoryId === category.id) {
            this.children =
              category.children.length > 0 ? category.children : [];
            break;
          }
          if (category.children) {
            for (let child of category.children) {
              if (this.categoryId === child.id) {
                this.categoryId = category.id;
                this.childId = child.id;
                this.children = category.children;
                break;
              }
            }
          }
        }
        this.categories = response.data;
      })
      .catch(error => {})
      .finally(() => {});
  },
  methods: {
    categoryQuery(id) {
      this.categoryId = id;
      this.setChildren();
      this.makeQuery(id);
    },
    all() {
      this.categoryId = 0;
      this.childId = 0;
      this.children = [];
      this.makeQuery(0, true);
    },
    allChild() {
      this.childId = 0;
      this.makeQuery(this.categoryId);
    },
    childQuery(id) {
      this.childId = id;
      this.makeQuery(id);
    },
    setChildren() {
      for (let category of this.categories) {
        if (this.categoryId === category.id) {
          this.children = category.children.length > 0 ? category.children : [];
        }
      }
    },
    makeQuery(id, clear) {
      if (clear) {
        let newQuery = JSON.parse(JSON.stringify(this.$route.query)); // 深拷贝
        delete newQuery.category_id;
        this.$router.replace({ query: newQuery });
      } else {
        this.$router.push({
          query: merge(this.$route.query, { category_id: id })
        });
      }
    }
  }
};
</script>
<style lang="scss">
.categories {
  .nav-link {
    color: rgba(0, 0, 0, 0.9);
    background-color: rgba(0, 0, 0, 0.1);
    padding: 0.2rem 0.4rem;
    font-size: 0.9rem;
    &.active,
    &:hover {
      color: rgba(255, 255, 255, 0.9);
      background-color: rgba(0, 0, 0, 0.7);
    }
    cursor: pointer;
    margin: 0 0.2rem;
  }
  .category-children {
    span {
      padding: 0.1rem 0.3rem;
      font-size: 0.8rem;
      margin: 0.5rem 0.2rem;
      background-color: rgba(0, 0, 0, 0.02);

      &.active,
      &:hover {
        color: rgba(0, 0, 0, 1);
        font-weight: 600;
        background-color: rgba(0, 0, 0, 0.1);
      }
    }
  }
}
</style>
