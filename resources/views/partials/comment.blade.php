<div id="replies" class="card" data-last-floor="7">
    <div class="items card-body">
        <div class="reply" data-id="361386" id="reply1">
            <div id="reply-361386" data-floor="1">
                <div class="avatar"><a title="hong_xin (楊竑昕)" href="/hong_xin"><img class="rounded-circle avatar-48"
                                                                                    src="https://ruby-china.org/system/letter_avatars/h.png"></a>
                </div>
                <div class="infos">
                    <div class="info">
          <span class="name">
            <a class="user-name" data-name="楊竑昕" href="/hong_xin">hong_xin</a>
          </span>
                        <span class="sub-info">
            <span class="floor">#1</span> ·
            <a class="time" href="#reply-361386"><abbr class="timeago" title="2020年05月31日">2 月前</abbr></a>
          </span>
                        <span class="opts float-right">
              <span class="hideable">
              <a class="edit fa fa-edit" data-uid="28796" title="修改回帖" href="/topics/39925/replies/361386/edit"></a>
              <a data-id="361386" data-login="hong_xin" title="回复此楼" class="btn-reply fa fa-reply" href="#"></a>
              </span>
              <a title="赞" data-count="0" data-state="deactive" data-type="Reply" data-id="361386"
                 class="likeable deactive" href="#"><i class="fa fa-heart"></i> <span></span></a>
          </span>
                    </div>

                    <div class="markdown">
                        <p>獲益良多，推</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="reply" data-id="361387" id="reply2">
            <div id="reply-361387" data-floor="2">
                <div class="avatar"><a title="yfractal (yang)" href="/yfractal"><img class="rounded-circle avatar-48"
                                                                                     src="https://l.ruby-china.com/user/avatar/7072/6d7458.jpeg!md"></a>
                </div>
                <div class="infos">
                    <div class="info">
          <span class="name">
            <a class="user-name" data-name="yang" href="/yfractal">yfractal</a>
          </span>
                        <span class="sub-info">
            <span class="floor">#2</span> ·
            <a class="time" href="#reply-361387"><abbr class="timeago" title="2020年05月31日">2 月前</abbr></a>
          </span>
                        <span class="opts float-right">
              <span class="hideable">
              <a class="edit fa fa-edit" data-uid="7072" title="修改回帖" href="/topics/39925/replies/361387/edit"></a>
              <a data-id="361387" data-login="yfractal" title="回复此楼" class="btn-reply fa fa-reply" href="#"></a>
              </span>
              <a title="赞" data-count="0" data-state="deactive" data-type="Reply" data-id="361387"
                 class="likeable deactive" href="#"><i class="fa fa-heart"></i> <span></span></a>
          </span>
                    </div>

                    <div class="markdown">
                        <p>感谢分享，</p>

                        <p>想请教楼主一个问题：</p>

                        <p>redis 多线程了，那单个 client 的请求，redis 还能保证处理和返回的时序性吗？</p>

                        <p>就是同一个 client，发给 redis 指令顺序是什么，redis 处理的书序就应该是什么，并且以同样的顺序返回。</p>

                        <p>我在 Stack Overflow 上也问了，不过没人回我 <code>https://stackoverflow.com/questions/62097897/will-redis-6-guarantee-client-requests-order</code>
                            <img title=":sob:" alt="😭" src="https://twemoji.ruby-china.com/2/svg/1f62d.svg"
                                 class="twemoji"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="reply" data-id="361390" id="reply3">
            <div id="reply-361390" data-floor="3">
                <div class="avatar"><a title="early (渔人)" href="/early"><img class="rounded-circle avatar-48"
                                                                             src="https://l.ruby-china.com/user/avatar/24967.jpg!md"></a>
                </div>
                <div class="infos">
                    <div class="info">
          <span class="name">
            <a class="user-name" data-name="渔人" href="/early">early</a>
          </span>
                        <span class="sub-info">
            <span class="floor">#3</span> ·
            <a class="time" href="#reply-361390"><abbr class="timeago" title="2020年05月31日">2 月前</abbr></a>
          </span>
                        <span class="opts float-right">
              <span class="hideable">
              <a class="edit fa fa-edit" data-uid="24967" title="修改回帖" href="/topics/39925/replies/361390/edit"></a>
              <a data-id="361390" data-login="early" title="回复此楼" class="btn-reply fa fa-reply" href="#"></a>
              </span>
              <a data-count="1" data-state="deactive" data-type="Reply" data-id="361390"
                 class="likeable deactive tooltipstered" href="#"><i class="fa fa-heart"></i> <span>1 个赞</span></a>
          </span>
                    </div>
                    <div class="reply-to-block" data-reply-to-id="361387">
                        <div class="info">
                            对
                            <a data-remote="true" href="/topics/39925/replies/361390/reply_to">
                                <img class="media-object avatar-16"
                                     src="https://l.ruby-china.com/user/avatar/7072/6d7458.jpeg!xs"><span
                                        class="user-name">yfractal</span>
                                <span class="reply-floor">#2</span>
                            </a> 回复
                        </div>
                    </div>

                    <div class="markdown">
                        <p>这个问题很棒。</p>

                        <p>分为两种情况，看如何定义单个 client。</p>

                        <p>情况一： 单个 client 和 redis 保持一个长连接，每个请求都是通过这个长连接发出。这个长连接在 redis 这边来看就是一个 socket。多线程 IO 是针对 socket
                            并发的，单个 socket 的内容 (例如 pipeline 一堆命令)，都是顺序执行的。不存在乱序问题，命令的执行本身没有并发，依然是单线程串行执行的。多线程 IO 是并发读写
                            socket，并不处理命令。命令的执行顺序就是 tcp 发包的顺序，这个是有序的。</p>

                        <p>情况二： 你说的 client，每发送一个命令都用一个新的 TCP 连接，在 redis 来看就是多个 socket(也是多个 client)，此时谁先处理完就说不清楚了。</p>

                        <p>我画的图上有些歧义，我先改一下</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="reply" data-id="361391" id="reply4">
            <div id="reply-361391" data-floor="4">
                <div class="avatar"><a title="yfractal (yang)" href="/yfractal"><img class="rounded-circle avatar-48"
                                                                                     src="https://l.ruby-china.com/user/avatar/7072/6d7458.jpeg!md"></a>
                </div>
                <div class="infos">
                    <div class="info">
          <span class="name">
            <a class="user-name" data-name="yang" href="/yfractal">yfractal</a>
          </span>
                        <span class="sub-info">
            <span class="floor">#4</span> ·
            <a class="time" href="#reply-361391"><abbr class="timeago" title="2020年05月31日">2 月前</abbr></a>
          </span>
                        <span class="opts float-right">
              <span class="hideable">
              <a class="edit fa fa-edit" data-uid="7072" title="修改回帖" href="/topics/39925/replies/361391/edit"></a>
              <a data-id="361391" data-login="yfractal" title="回复此楼" class="btn-reply fa fa-reply" href="#"></a>
              </span>
              <a data-count="2" data-state="deactive" data-type="Reply" data-id="361391"
                 class="likeable deactive tooltipstered" href="#"><i class="fa fa-heart"></i> <span>2 个赞</span></a>
          </span>
                    </div>
                    <div class="reply-to-block" data-reply-to-id="361390">
                        <div class="info">
                            对
                            <a data-remote="true" href="/topics/39925/replies/361391/reply_to">
                                <img class="media-object avatar-16"
                                     src="https://l.ruby-china.com/user/avatar/24967.jpg!xs"><span class="user-name">early</span>
                                <span class="reply-floor">#3</span>
                            </a> 回复
                        </div>
                    </div>

                    <div class="markdown">
                        <p>我消化下，感谢。</p>

                        <p>感觉第二种应该就没办法了</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="reply reply-system" data-id="361392" id="reply5">
            <div id="reply-361392" data-floor="5">
                <a title="xiaoronglv (吕小荣)" href="/xiaoronglv"><img class="media-object avatar-16"
                                                                    src="https://l.ruby-china.com/user/avatar/1638.jpg!xs"></a>
                <a class="user-name" data-name="吕小荣" href="/xiaoronglv">xiaoronglv</a>
                将本帖设为了精华贴

                <span class="time">05月31日 16:31</span>

            </div>
        </div>

    </div>
</div>