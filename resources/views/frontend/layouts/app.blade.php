<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.login_title') }} @yield('title')</title>
    {{-- <meta name="og:title" content="@yield('title')"> --}}
    <meta name="description" content="@yield('description')">
    {{-- <meta name="og:description" content="@yield('description')"> --}}
    <meta name="keywords" content="@yield('keywords')">
    {{-- <meta name="og:keywords" content="@yield('keywords')"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.layouts.link')
    @yield('header_link')
</head>

<body>

    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

    <!-- Preloder start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloder start -->

    <!-- Backtotop start -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->
    @include('frontend.layouts.header')
    
    
    <!-- Body main wrapper start -->
    <main>
        @yield('content')
    </main>
    <!-- Body main wrapper end -->
    @php 
        $url = explode('?', $_SERVER['REQUEST_URI']);
    @endphp
    @if ($url[0] != '/blog'&& $url[0] != '/blog-detail' && $url[0] != '/contact'&& $url[0] != '/' && $url[0] != '/public/blog'&& $url[0] != '/public/blog-detail' && $url[0] != '/public/contact' && $url[0] != '/public/' && $url[0] != '/privacy-policy' && $url[0] != '/public/privacy-policy')
        @include('frontend.layouts.BVF')
    @endif
    <!-- Footer area start -->

    <input type="hidden" id="REQUEST_URI" value="{{ $_SERVER['REQUEST_URI'] }}">
    @php
        $url_q_data = explode('?', $_SERVER['REQUEST_URI']);
    @endphp
    <input type="hidden" id="url_q_data" value="{{ $url_q_data[0] }}">
    @if ($url[0] != '/'&& $url[0] != '/public/')
        @include('frontend.layouts.footer')
    @endif
    @include('frontend.layouts.script')

    @yield('footer_script')
    <!-- JS here -->

</body>

</html>
