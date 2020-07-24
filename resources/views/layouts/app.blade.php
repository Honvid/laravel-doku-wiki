<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@if(! empty($title)) | {{ $title }} - @endif {{ config('app.name', 'Laravel') }}</title>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('partials.header')

    <main class="main-container container mt-10">
        @yield('content')
    </main>
</div>
@section('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
@show
@yield('script-line')
</body>
</html>
