    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas__area">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="{{ route('home')}}">
                                <img src="{{ asset('uploads/logo') }}/{{ header_logo('header_logo') }}" alt="logo not found">
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
                    <div class="mobile-menu fix"></div>
                    <div class="offcanvas__social">
                        <h3 class="offcanvas__title mb-20">Subscribe & Follow</h3>
                        <ul>
                            {!! social_media('header') !!}
                            {{-- <li><a href="https://www.facebook.com/thefishermangroup/" aria-label="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/fisherman_group" aria-label="twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.youtube.com/@FishermanGroup-wq7zp" aria-label="youtube"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="https://www.instagram.com/fisherman_group/" aria-label="instagraminstagram"><i class="fab fa-instagram"></i></a></li> --}}
                        </ul>
                    </div>
                    <div class="offcanvas__btn">
                        <div class="header__btn-wrap">
                            @if(Auth::user() && Auth::user()->role == 'client')
                                <a class="bd-gradient-btn" href="{{ route('user.profile') }}"><i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i></a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="sub__btn sm" href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="feather icon-log-out"></i> Logout </a>
                                </form>
                            @elseif(Auth::user() && Auth::user()->role != 'client')
                                <a class="bd-gradient-btn" href="{{ route('superAdmin.dashboard') }}">Dashboard</a>
                            @else
                                <a class="sub__btn sm" href="{{ route('login') }}">Log In</a>
                                <a class="bd-gradient-btn" href="{{ route('demo.call') }}">demo call schedule</a>
                            @endif
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
                                <img class="logo__white" src="{{ asset('uploads/logo') }}/{{ header_logo('header_logo') }}" alt="logo not found">
                            </a>
                        </div>
                    </div>
                    <div class="header__middle">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul class="onepage-menu">
                                        {!! crateheader() !!}
                                        {{-- <li>
                                            <a href="{{ route('home')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about')}}">About</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('why.fisherman')}}">Why Fisherman</a>
                                        </li>
                                        <li class="has-dropdown has-mega-menu">
                                            <a href="javascript:void(0)">Resources</a>
                                            <ul class="mega-menu">
                                                <li style="display: block;margin: 0;"><a style="padding: 5px 0;"href="{{ route('blog')}}">Blog</a></li>
                                                <li style="display: block;margin: 0;"><a style="padding: 5px 0;"href="{{ route('video')}}">Video</a></li>
                                                <li style="display: block;margin: 0;"><a style="padding: 5px 0;"href="{{ route('faq')}}">FAQ</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                                <!-- for wp -->
                                <div class="header__hamburger ml-20 d-none">
                                    <button type="button" class="hamburger-btn offcanvas-open-btn">
                                        <span>01</span>
                                        <span>01</span>
                                        <span>01</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__right">
                        <div class="header__action d-flex align-items-center">
                            <div class="header__btn-wrap d-none d-xl-inline-flex">
                                @if(Auth::user() && Auth::user()->role == 'client')
                                    {{-- <a class="bd-gradient-btn" href="#" style=" visibility: hidden; "><i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i></a> --}}
                                    <a class="bd-gradient-btn" href="#" style=" visibility: hidden; "><i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i></a>
                                    <a class="bd-gradient-btn reomve_bg" href="{{ route('user.profile') }}"><i class="fa-solid fa-user fa-2xl" style="color: #63E6BE;"></i>
                                        <span>welcome {{ Auth::user()->first_name }} !!</span>
                                    </a>
                                    {{-- <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="sub__btn sm" href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="feather icon-log-out"></i> Logout </a>
                                    </form> --}}
                                @elseif(Auth::user() && Auth::user()->role != 'client')
                                    <a class="bd-gradient-btn" href="{{ route('superAdmin.dashboard') }}">Dashboard</a>
                                @else
                                    <a class="sub__btn sm" href="{{ route('login') }}">Log In</a>
                                    <a class="bd-gradient-btn" href="{{ route('demo.call') }}">demo call schedule</a>
                                @endif
                            </div>
                            <div class="header__hamburger ml-20 d-xl-none">
                                <div class="sidebar__toggle">
                                    <a class="bar-icon" href="javascript:void(0)">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
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