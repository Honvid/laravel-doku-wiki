@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <blacklist :book="{{ $page->book_id }}" :page="{{ $page->id }}"></blacklist>
            <div id="toc-container" class="markdown-toc sticky-top"></div>
        </div>

        <div class="col-md-9 page-detail">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $page->title }}</h1>
                    <div class="infos">
                        <a href="/wiki/the-rails-doctrine/comments">
                            18 条评论
                        </a>,
                        54 次修正，43572 次阅读， 最後更新於 <abbr class="timeago" title="2018年05月28日">{{ $page->updated_at }}</abbr>
                    </div>
                </div>


                <div class="card-body markdown">
                    <article>
                        <editor-preview content="{{ $page->content }}"></editor-preview>
                    </article>
                </div>

                <div class="card-footer editors clearfix">
                    <div class="heading">
                        本頁貢獻者:
                        <span class="pull-right"><div class="social-share-button"
                                                      data-title="The Rails Doctrine - Rails 信条 via: @ " data-img=""
                                                      data-url="" data-desc="" data-via="">
<a rel="nofollow " data-site="twitter" class="ssb-icon ssb-twitter" onclick="return SocialShareButton.share(this);"
   title="分享到 Twitter" href="#"></a>
<a rel="nofollow " data-site="weibo" class="ssb-icon ssb-weibo" onclick="return SocialShareButton.share(this);"
   title="分享到 新浪微博" href="#"></a>
<a rel="nofollow " data-site="facebook" class="ssb-icon ssb-facebook" onclick="return SocialShareButton.share(this);"
   title="分享到 Facebook" href="#"></a>
<a rel="nofollow " data-site="wechat" class="ssb-icon ssb-wechat" onclick="return SocialShareButton.share(this);"
   title="分享到 微信" data-wechat-footer="打開微信，點擊底部的 “發現”，<br/> 使用 “掃一掃” 即可將網頁分享至朋友圈。" href="#"></a>
</div></span>
                    </div>
                    <div class="avatars">
                        <a title="huacnlee (李华顺)" href="/huacnlee"><img class="media-object avatar-16"
                                                                        src="https://l.ruby-china.com/user/avatar/2/de6df3.png!xs"></a>
                        <a title="lyfi2003 (windy)" href="/lyfi2003"><img class="media-object avatar-16"
                                                                          src="https://l.ruby-china.com/user/avatar/121/3c26ea.png!xs"></a>
                        <a title="dotnil (dotnil)" href="/dotnil"><img class="media-object avatar-16"
                                                                       src="https://l.ruby-china.com/user/avatar/134.jpg!xs"></a>
                        <a title="miclle (Miclle Zheng)" href="/miclle"><img class="media-object avatar-16"
                                                                             src="https://l.ruby-china.com/user/avatar/250.jpg!xs"></a>
                        <a title="shawnyu (tooooolong)" href="/shawnyu"><img class="media-object avatar-16"
                                                                             src="https://l.ruby-china.com/user/avatar/703.png!xs"></a>
                        <a title="juanito (Juanito Fatas)" href="/juanito"><img class="media-object avatar-16"
                                                                                src="https://l.ruby-china.com/user/avatar/1510/1a2540.jpg!xs"></a>
                        <a title="jude (yiyizym)" href="/jude"><img class="media-object avatar-16"
                                                                    src="https://l.ruby-china.com/user/avatar/20167.jpg!xs"></a>
                    </div>
                    <div class="buttons hide-ios">
                        <a class="btn btn-success" href="/wiki/the-rails-doctrine/comments#new_comment">发表评论</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection