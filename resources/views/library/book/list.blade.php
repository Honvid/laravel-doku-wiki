@extends('layouts.app')

@section('title', 'Laravel 7 中文文档')

@section('content')
    <div class="row">

        @include('partials.backlist')

        <div class="col-md-9 book-lists">
            @foreach($books as $book)
                <div class="card book-item">
                    <a href="/books/{{ $book->id }}">
                        <img src="{{ $book->cover ?: '/images/300x300.jpeg' }}" class="card-img-top"
                             alt="{{ $book->name }}">
                        <div class="card-body">
                            <h6 class="card-title">{{ $book->name }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection