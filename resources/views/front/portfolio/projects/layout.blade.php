<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@yield('seo')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Projet | Portfolio')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/project.js', 'assets') }}" type="module" defer></script>
    <script src="{{ mix('js/project-nomodule.js', 'assets') }}" nomodule defer></script>
{{--    <link rel="preload" href="{{asset('/assets/js/css-paint-polyfill-3105864d.js')}}" as="script">--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://unpkg.com" crossorigin="anonymous">
    <link rel="preload"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Rubik:wght@700&display=swap"
          as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Rubik:wght@700&display=swap">
    </noscript>
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

<!-- Styles -->

    <link href="{{ mix('css/project.css', 'assets') }}" rel="stylesheet">
</head>
<body>
@include('front.portfolio.partials.header')
<main class="page-main">
    @yield('content')
</main>
@include('front.portfolio.partials.footer')
</body>
</html>
