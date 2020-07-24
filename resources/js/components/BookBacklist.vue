<template>
    <div class="backlist-sidebar hide-ios">
        <div class="card">
            <div class="card-body">
                <h3>目录</h3>
                <ul class="backlist">
                    <li class="chapter-item">
                        <a href="/chapters"><i class="fa fa-caret-right"></i> 中国美协章程</a>
                    </li>
                    <li class="chapter-item active">
                        <a href="/books"><i class="fa fa-caret-down"></i> 中国文联美术艺术中心</a>
                        <i class="float-right text-info">3</i>
                        <ol>
                            <li><a href="#"><i class="fa fa-file-text"></i> 综合部</a></li>
                            <li><a href="#"><i class="fa fa-file-text"></i> 大型活动部</a></li>
                            <li><a href="#"><i class="fa fa-file-text"></i> 展览部</a></li>
                        </ol>
                    </li>

                    <li class="chapter-item"><a href="/pages"><i class="fa fa-caret-right"></i> 组织机构</a>
                        <ol>
                            <li><a href="#" class="page-item"><i class="fa fa-file-text"></i> 美协机关</a></li>
                            <li><a href="#" class="page-item"><i class="fa fa-file-text"></i> 中国文联美术艺术中心</a></li>
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
    props: {
      bookId: {
        type: Number,
        required: true,
        default: 0
      },
      pageId: {
        type: Number,
        required: true,
        default: 0
      }
    },
    created(){

    },
    mounted() {
      axios.get('/api/books/'+this.bookId+'/blacklist')
        .then(response => (console.log(response)))
    }
  }
</script>