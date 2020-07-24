<template>
    <div class="backlist-sidebar hide-ios">
        <div class="card">
            <div class="card-body">
                <h3>目录</h3>
                <ul class="backlist">
                    <li class="chapter-item" v-bind:data-id="item.id"
                        v-for="item in blacklist"
                        @mouseover="collapse(item.id, false)"
                        @mouseout="collapse(item.id, true)"
                        v-bind:class="{ active: item.id === current || active}">
                        <a href="/pages/1"><i class="fa fa-caret-right"></i> {{ item.title }}</a>
                        <ol v-if="item.children">
                            <li class="page-item"
                                v-for="child in item.children"
                                v-bind:data-id="child.id">
                                <a href="#"><i class="fa fa-file-text"></i> {{ child.title }}</a>
                            </li>
                        </ol>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: 'blacklist',
    data() {
      return {
        blacklist: [],
        current: 0,
        active: false
      }
    },
    props: {
      book: {
        type: Number,
        required: true
      },
      page: {
        type: Number,
        required: true
      }
    },
    created() {
    },
    methods: {
      collapse(id, isCollapse) {
        let items = document.querySelectorAll('.backlist .chapter-item');
        items.forEach((item) => {
          let currentId = parseInt(item.getAttribute('data-id'));
          item.classList.toggle('active', (currentId === this.current && isCollapse) || (currentId === id))
        })
      }
    },
    mounted() {
      axios.get('/api/books/' + this.book + '/blacklist')
        .then((response) => {
          for (let item of response.data) {
            if (item.id === this.page) {
              this.current = item.id;
              break;
            }
            if (item.children) {
              for (let child of item.children) {
                if (child.id === this.page) {
                  this.current = item.id;
                  break;
                }
              }
            }
          }
          this.blacklist = response.data
        })
    }
  }
</script>