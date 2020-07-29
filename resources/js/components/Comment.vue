<template>
    <div id="replies" class="card">
        <div class="card-body">
            <div class="reply" v-for="comment in comments">
                <div class="avatar">
                    <a href="https://learnku.com/users/29228">
                        <img class="rounded-circle avatar-48"
                             src="https://cdn.learnku.com/uploads/avatars/29228_1535631675.jpeg!/both/100x100">
                    </a>
                </div>
                <div class="content">
                    <div class="reply-header">
                        <div class="meta">
                            <a class="author" href="https://learnku.com/users/29228">{{ comment.user.name }}</a>
                            <div class="metadata">
                                <a class="ml-1 mr-1 hide-on-mobile"
                                   href="https://learnku.com/users/29228/reputation_logs">
                                    <i class="icon trophy"></i>0 声望
                                </a>
                            </div>
                        </div>
                        <div class="reaction">
                            <a href="javascript:void(0)" onclick="replyOne('qingdiao');" title="回复 qingdiao">
                                <i style="color:rgba(0, 0, 0, 0.3);" class="fa fa-reply"></i>
                            </a>
                        </div>
                    </div>

                    <div class="reply-body">
                        <editor-preview :id="'comment-'+comment.id" :content="comment.content" :toc="false"></editor-preview>
                    </div>

                    <div class="reply-footer">
                        <a :title="comment.created_at" href="javascript:;">
                            <i class="fa fa-clock"></i> 1个月前
                        </a>
                        <a href="javascript:;" class="ml-2">
                            <i class="fa fa-comment"></i>评论
                        </a>
                        <a data-content="举报违规内容，共建品质社区" href="javascript:void(0)" class="ml-2">
                            <i class="fa fa-flag"></i> 举报
                        </a>
                        <a href="javascript:;" title="为此评论点赞" class="ml-2">
                            <i class="fa fa-heart"></i> 点赞 <span class="vote-count">20</span>
                        </a>
                        <a title="此评论的链接" href="https://learnku.com/articles/45524#reply146877" class="ml-2">
                            <i class="fa fa-hashtag"></i> 链接
                        </a>
                    </div>

                    <div class="comments">
                        <div class="reply-child">
                            <div class="reply-header">
                                <a class="" href="https://learnku.com/users/49033"
                                   style="position: relative;top: 4px;">
                                    <img src="https://cdn.learnku.com/uploads/avatars/49033_1568605590.jpeg!/both/100x100"
                                         style="width:22px;height:22px">
                                </a>

                                <a class="meta" href="https://learnku.com/users/49033">zdg1992</a>
                                <span class="time mt-2 ml-2" title="2020-06-12 16:28:09">1个月前</span>
                            </div>
                            <div class="reply-body">
                                比如我们有记录nginx访问日志，并发一高，日志写入压力是很大的，这时候就需要用到队列了，我们用的是kafka
                            </div>

                            <div class="reply-footer">
                                <a href="javascript:;" title="为此评论点赞">
                                    <i class="fa fa-heart"></i> 点赞 <span class="vote-count">20</span>
                                </a>
                                <a href="javascript:;" class="ml-2">
                                    <i class="fa fa-comment"></i> 回复
                                </a>
                                <a data-content="举报违规内容，共建品质社区" href="javascript:void(0)" class="ml-2">
                                    <i class="fa fa-flag"></i> 举报
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form accept-charset="UTF-8" method="POST" action="/comments">
                <div class="form-group">
                    <label for="comment-content">内容</label>
                    <div id="comment-content"></div>
                </div>
                <input type="hidden" name="content">
                <input type="hidden" :value="type" name="object_type">
                <input type="hidden" :value="id" name="object_id">
                <input type="hidden" :value="token" name="_token">
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
</template>

<script>
  import Vditor from 'vditor'
  import axios from 'axios';

  export default {
    name: 'comment',
    data() {
      return {
        comments: [],
        editor: '',
        token: '',
      }
    },
    props: {
      type: {
        type: String,
        required: true,
        default: ''
      },
      id: {
        type: Number,
        required: true,
        default: 0
      },
    },
    created() {
      this.token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
    },
    mounted() {
      axios.get('/api/' + this.type + '/' + this.id + '/comments')
        .then(response => {
          this.comments = response.data;
        });
    },
    methods: {
      init() {
        const content = document.querySelector('input[name="content"]');
        this.editor = new Vditor('comment-content', {
          toolbarConfig: {
            pin: true,
          },
          cache: {
            enable: false,
          },
          after: () => {
            this.editor.setValue('支持 markdown 语法')
          },
          blur(md) {
            content.setAttribute('value', md)
          },
        })
      },
    }
  }
</script>

<style lang="scss">
    @import "~vditor/src/assets/scss/index";
</style>