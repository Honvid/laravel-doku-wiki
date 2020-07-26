<template>
<div class="recomend-sidebar hide-ios">
        <div class="card">
            <div class="card-body">
                <h5>推荐书籍</h5>
                <ul class="books">
                    <li class="book-item">
                        <a href="#">脉经</a>
                    </li>
                    <li class="book-item">
                        <a href="#">景岳全书</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'recomend',
    data() {
      return {
        blacklist: [],
        current: 0,
        active: false
      }
    },
    created() {
    },
    methods: {
      
    },
    mounted() {
      
    }
  }
</script>