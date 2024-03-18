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
        <!-- Offcanvas area start -->
        <div class="fix">
            <div class="offcanvas__area">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="{{ route('home')}}">
                                    <img src="{{ asset('frontend/assets/imgs/logo/logo-white.png') }}" alt="logo not found">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button class="offcanvas-close-icon animation--flip">
                                    <span class="offcanvas-m-lines">
                                  <span class="offcanvas-m-line line--1"></span><span class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>
        <div class="offcanvas__overlay-white"></div>
        <!-- Offcanvas area start -->
    
        <!-- Header area start -->
        <div id="header-sticky" class="header__area header-transparent">
            <div class="container">
                <div class="mega__menu-wrapper">
                    <div class="header__main">
                        <div class="header__left">
                            <div class="header__logo">
                                <a href="{{ route('home')}}">
                                    <img class="logo__white" src="{{ asset('frontend/assets/imgs/logo/logo-white.png') }}" alt="logo not found">
                                </a>
                            </div>
                        </div>
                        <div class="header__middle">
                            <div class="mean__menu-wrapper d-none d-lg-block">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul class="onepage-menu">
                                            <li>
                                                <a href="{{ route('home')}}"></a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Header area end -->
    
        <!-- Body glow start -->
        <div class="glow__area">
            <div class="body__color-glow"></div>
            <div class="body__color-glow glow-2"></div>
        </div>
        <!-- Body glow end -->
    
    
    <!-- Body main wrapper start -->
    <main>
        @yield('content')
    </main>
    <!-- Body main wrapper end -->
    

    {{-- @include('frontend.layouts.footer') --}}

    @include('frontend.layouts.script')

    @yield('footer_script')
    <!-- JS here -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
