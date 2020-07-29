@extends('layouts.app')

@section('title', 'Laravel 7 中文文档')

@section('content')
    <div class="row">

        @include('partials.backlist')

        <div class="col-md-9 book-detail">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h2>{{ $book->name }}</h2>
                            <div class="description">
                                <div class="meta" style="line-height:24px">
                                    <a href="https://learnku.com/docs/laravel/7.x/lifecycle/7453">
                                        <i class="icon clock"></i> 更新于 <span title="2020-07-14 06:07:03">3天前</span>
                                    </a>
                                </div>
                            </div>
                            <div class="extra">
                                <div style="font-weight:bold;font-size: 13px;margin-top: 18px;display: block;color: #5a5a5a;border-left: 6px solid #d6d6d6;padding-left: 10px;">
                                    <p>作者：{{ $book->authors }}</p>
                                    <p>文章数量：75 篇</p>
                                    <p>文字总数：24.62 万</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-3">
                            <img class="rounded-circle" src="{{ $book->cover ?: '/images/300x300.jpeg' }}">
                        </div>
                    </div>
                </div>

                <div class="card-body markdown">
                    <article>
                        <h1>简介</h1>
                        <editor-preview id="{{ 'book-' . $book->id }}" content="{{ $book->desc }}" :toc="false"></editor-preview>
                        <h1 style="margin-top: 1.2em" id="目录">目录</h1>
                        <ol class="sorted_table tree " data-chapterid="0" data-filetype="chapter">
                            @foreach($pages as $page)
                                <li class="item">
                                    <i class="fa fa-file-text"></i>
                                    <a href="/pages/{{ $page['id'] }}">{{ $page['title'] }}</a>
                                    @if(isset($page['children']))
                                        <ol class="chapter-container">
                                            @foreach($page['children'] as $child)
                                                <li class="item">
                                                    <i class="fa fa-file-text"></i>
                                                    <a href="/pages/{{ $child['id'] }}">{{ $child['title'] }}</a>
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection