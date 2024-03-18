@extends('frontend.layouts.app')
@section('title', ' / '.$data['title'])
@section('description', $data['description'])
@section('keywords', $data['keywords'])
@section('header_title', '')
@section('sub_page', '')
@section('header_link')
@endsection
@section('content')


    <!-- Banner area start -->
    <section class="banner__area banner-6 p-relative z-index-11 x-clip">
        <div class="banner__glow-6">
            <div class="glow-1 d-none d-md-block"></div>
            <div class="glow-2"></div>
        </div>
        <div class="container">
            <div class="row gy-50 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-6">
                    <div class="banner__content-5 wow fadeInLeft animated" data-wow-delay=".6s">
                        <span class="banner__subtitle-5 uppercase mb-25">{{ @$banner->sub_title }}</span>
                        <h2 class="banner__title-5">{{ @$banner->headline }}</h2>
                        @if(@$banner->description)
                        <p>{{ @$banner->description }}</p>
                        @endif
                        @if(@$banner->youtube_url || @$banner->url)
                            <div class="btn__wrapper">
                                <div class="banner__btn-group">
                                    @if(@$banner->url)
                                        <a class="bd-gradient-btn" href="{{ @$banner->url }}">{{ @$banner->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                                    @endif
                                    @if(@$banner->youtube_url)
                                        <a class="banner__play popup-video" href="{{ @$banner->youtube_url }}">
                                            <span>
                                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.9919 7.50438L4.1875 0.684375C3.85007 0.484739 3.4658 0.377998 3.07375 0.375C2.45745 0.375 1.8664 0.619823 1.43061 1.05561C0.994823 1.4914 0.75 2.08245 0.75 2.69875V17.3356C0.750078 17.7446 0.859712 18.1461 1.0675 18.4984C1.27529 18.8506 1.57365 19.1408 1.93156 19.3387C2.28947 19.5366 2.69386 19.635 3.10268 19.6237C3.5115 19.6124 3.90983 19.4918 4.25625 19.2744L16.0744 11.8081C16.4418 11.5782 16.7435 11.2569 16.9499 10.8757C17.1562 10.4945 17.2604 10.0663 17.252 9.63288C17.2437 9.19947 17.1233 8.77559 16.9024 8.40257C16.6816 8.02955 16.3679 7.7201 15.9919 7.50438Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-6">
                    <div class="banner__thumb-wrapper-5 d-flex justify-content-end wow fadeInRight animated" data-wow-delay=".6s">
                        <div class="banner__thumb-5">
                            @if(@$banner->image)
                                <img src="{{ asset('uploads/banner_img') }}/{{ $banner->image }}" alt="image not found">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner area end -->

    <!-- why choose area start -->
    <section id="homechouse" class="why__choose-area  section-space">
        <div class="container">
            <div class="row gy-5 align-items-end section__title-space">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section__title-wrapper">
                        <span class="section__subtitle uppercase mb-20">{{ @$chooseUs->sub_title }}</span>
                        <h2 class="section__title mb-20">{{ @$chooseUs->headline }}</h2>
                        <p class="mb-0">{{ @$chooseUs->description }}</p>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="btn-wrapper d-flex justify-content-lg-end">
                        @if(@$chooseUs->url)
                            <a class="bd-gradient-btn" href="{{ @$chooseUs->url }}">{{ @$chooseUs->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                        @endif
                    </div>
                </div>
            </div>
            @if(sizeof($chooseUs_list) != 0)
                @php $classA = ['', 'is-brick-red', 'is-mainly-blue', 'is-mainly-green', 'is-mainly-pink']; $cou = 0; @endphp
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="swiper common__carousel-active">
                            <div class="swiper-wrapper">
                                @foreach ($chooseUs_list as $ser_val)
                                    <div class="swiper-slide">
                                        <div class="why__choose-item {{ $classA[$cou] }} wow fadeIn" data-wow-delay=".3s">
                                            <div class="why-choose__content">
                                                <div class="why__choose-icon">
                                                    <span>{!! nl2br($ser_val->icon) !!}</span>
                                                    <h3><a href="#">{{ $ser_val->title }}</a></h3>
                                                    <p>{{ $ser_val->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $cou++;
                                        if($cou == sizeof($classA)){
                                            $cou=0;
                                        }
                                    @endphp
                                @endforeach
                                {{-- <div class="swiper-slide">
                                    <div class="why__choose-item is-brick-red wow fadeIn" data-wow-delay=".5s">
                                        <div class="why-choose__content">
                                            <div class="why__choose-icon">
                                                <span><img src="{{ asset('frontend/assets/imgs/why-choose/why-choose-01.png') }}" alt="image not found"></span>
                                                <h3><a href="#">Banking Security</a></h3>
                                                <p>Banks is typically ge revenue by the charging interest in loansAliquiam in hendrerit urna amlet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="why__choose-item is-mainly-blue wow fadeIn" data-wow-delay=".7s">
                                        <div class="why-choose__content">
                                            <div class="why__choose-icon">
                                                <span><img src="{{ asset('frontend/assets/imgs/why-choose/why-choose-03.png') }}" alt="image not found"></span>
                                                <h3><a href="#">Best support</a></h3>
                                                <p>Banks is typically ge revenue by the charging interest in loansAliquiam in hendrerit urna amlet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- If we need pagination -->
                            <div class="pagination__wrappper">
                                <div class="bd-swiper-dot text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- why choose area end -->

    <!-- Service area start -->
    <section class="service__area section-is-rounded theme-bg-5 section-space">
        <div class="container">
            <div class="row gy-5">
                <div class="col-xxl-6 colxl-6 col-lg-6">
                    <div class="service__content wow fadeInUp" data-wow-delay=".3s">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-3 uppercase mb-20">{{ @$service->sub_title }}</span>
                            <h2 class="section__title">{{ @$service->headline }}</h2>
                        </div>
                        <div class="btn__wrapper">
                            @if(@$service->url)
                                <a class="bd-gradient-btn" href="{{ @$service->url }}">{{ @$service->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            @endif
                            {{-- <a class="bd-gradient-btn" href="service-details.html">Explore More<span><i class="fa-regular fa-angle-right"></i></span></a> --}}
                        </div>
                    </div>
                </div>
                @if(@$service->icon_1)                    
                <div class="col-xxl-6 colxl-6 col-lg-6">
                    <div class="service__item-2 is-light-purple wow fadeInUp" data-wow-delay=".5s">
                        <div class="service__icon-2">
                            <span>{!! nl2br(@$service->icon_1) !!}</span>
                        </div>
                        <div class="service__content-2">
                            <h3><a href="{{ @$service->url_1?@$service->url_1:'#' }}">{{ @$service->title_1 }}</a></h3>
                            <p>{{ @$service->detail_1 }}</p>
                            @if(@$service->url_1)
                            <a class="text__link uppercase" href="{{ @$service->url_1 }}">{{ @$service->button_name_1 }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                @if(@$service->icon_2)                    
                <div class="col-xxl-6 colxl-6 col-lg-6">
                    <div class="service__item-2 is-brick-red wow fadeInUp" data-wow-delay=".5s">
                        <div class="service__icon-2">
                            <span>{!! nl2br(@$service->icon_2) !!}</span>
                        </div>
                        <div class="service__content-2">
                            <h3><a href="{{ @$service->url_2?@$service->url_2:'#' }}">{{ @$service->title_2 }}</a></h3>
                            <p>{{ @$service->detail_2 }}</p>
                            @if(@$service->url_2)
                            <a class="text__link uppercase" href="{{ @$service->url_2 }}">{{ @$service->button_name_2 }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                @if(@$service->icon_3)                    
                <div class="col-xxl-6 colxl-6 col-lg-6">
                    <div class="service__item-2 wow fadeInUp" data-wow-delay=".5s">
                        <div class="service__icon-2">
                            <span>{!! nl2br(@$service->icon_3) !!}</span>
                        </div>
                        <div class="service__content-2">
                            <h3><a href="{{ @$service->url_3?@$service->url_3:'#' }}">{{ @$service->title_3 }}</a></h3>
                            <p>{{ @$service->detail_3 }}</p>
                            @if(@$service->url_3)
                            <a class="text__link uppercase" href="{{ @$service->url_3 }}">{{ @$service->button_name_3 }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </section>
    <!-- Service area end -->

    <!-- Key Features area start -->
    <section class="Key-features__area  section-space">
        <div class="container">
            <div class="row gy-50">
                <div class="col-xxl-6 col-xl-6 col-lg-5">
                    <div class="Key-features__content-wrapper wow fadeIn" data-wow-delay=".3s">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-5 uppercase mb-20">{{ @$key_features->sub_title }}</span>
                            <h2 class="section__title mb-25">{{ @$key_features->headline }}</h2>
                        </div>
                        <p>{{ @$key_features->description }}</p>
                        <div class="btn__wrapper">
                            @if(@$key_features->url)
                                <a class="bd-gradient-btn" href="{{ @$key_features->url }}">{{ @$key_features->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            @endif
                            {{-- <a class="bd-gradient-btn" href="service-details.html">Know More<span><i class="fa-regular fa-angle-right"></i></span></a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-7">
                    <div class="row gy-50">
                        @if(@$key_features->icon_1)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="Key-features__item wow fadeIn" data-wow-delay=".3s">
                                <div class="Key-features__icon">
                                    <span>{!! nl2br(@$key_features->icon_1) !!}</span>
                                </div>
                                <div class="Key-features__content">
                                    <h4>{{ @$key_features->title_1 }}</h4>
                                    <p>{{ @$key_features->detail_1 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(@$key_features->icon_2)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="Key-features__item is-mainly-red wow fadeIn" data-wow-delay=".5s">
                                <div class="Key-features__icon">
                                    <span>{!! nl2br(@$key_features->icon_2) !!}</span>
                                </div>
                                <div class="Key-features__content">
                                    <h4>{{ @$key_features->title_2 }}</h4>
                                    <p>{{ @$key_features->detail_2 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(@$key_features->icon_3)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="Key-features__item is-mainly-blue wow fadeIn" data-wow-delay=".7s">
                                <div class="Key-features__icon">
                                    <span>{!! nl2br(@$key_features->icon_3) !!}</span>
                                </div>
                                <div class="Key-features__content">
                                    <h4>{{ @$key_features->title_3 }}</h4>
                                    <p>{{ @$key_features->detail_3 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(@$key_features->icon_4)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="Key-features__item is-pink wow fadeIn" data-wow-delay=".9s">
                                <div class="Key-features__icon">
                                    <span>{!! nl2br(@$key_features->icon_4) !!}</span>
                                </div>
                                <div class="Key-features__content">
                                    <h4>{{ @$key_features->title_4 }}</h4>
                                    <p>{{ @$key_features->detail_4 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Key Features area end -->

    

    <!-- Banner area start -->
    <section class="income__area o-xs section-space">
        <div class="container">
            <div class="row gy-50 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="income__thumb wow fadeInLeft animated" data-delay=".6s">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://www.tradingview-widget.com/embed-widget/market-overview/?locale=in#%7B%22colorTheme%22%3A%22light%22%2C%22dateRange%22%3A%2212M%22%2C%22showChart%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22isTransparent%22%3Afalse%2C%22showSymbolLogo%22%3Atrue%2C%22showFloatingTooltip%22%3Afalse%2C%22width%22%3A400%2C%22height%22%3A660%2C%22plotLineColorGrowing%22%3A%22rgba(41%2C%2098%2C%20255%2C%201)%22%2C%22plotLineColorFalling%22%3A%22rgba(41%2C%2098%2C%20255%2C%201)%22%2C%22gridLineColor%22%3A%22rgba(240%2C%20243%2C%20250%2C%200)%22%2C%22scaleFontColor%22%3A%22rgba(106%2C%20109%2C%20120%2C%201)%22%2C%22belowLineFillColorGrowing%22%3A%22rgba(41%2C%2098%2C%20255%2C%200.12)%22%2C%22belowLineFillColorFalling%22%3A%22rgba(41%2C%2098%2C%20255%2C%200.12)%22%2C%22belowLineFillColorGrowingBottom%22%3A%22rgba(41%2C%2098%2C%20255%2C%200)%22%2C%22belowLineFillColorFallingBottom%22%3A%22rgba(41%2C%2098%2C%20255%2C%200)%22%2C%22symbolActiveColor%22%3A%22rgba(41%2C%2098%2C%20255%2C%200.12)%22%2C%22tabs%22%3A%5B%7B%22title%22%3A%22Indices%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22d%22%3A%22US%20100%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3ADJI%22%2C%22d%22%3A%22Dow%2030%22%7D%2C%7B%22s%22%3A%22INDEX%3ANKY%22%2C%22d%22%3A%22Nikkei%20225%22%7D%2C%7B%22s%22%3A%22INDEX%3ADEU40%22%2C%22d%22%3A%22DAX%20Index%22%7D%2C%7B%22s%22%3A%22FOREXCOM%3AUKXGBP%22%2C%22d%22%3A%22UK%20100%22%7D%5D%2C%22originalTitle%22%3A%22Indices%22%7D%2C%7B%22title%22%3A%22Futures%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME_MINI%3AES1!%22%2C%22d%22%3A%22S%26P%20500%22%7D%2C%7B%22s%22%3A%22CME%3A6E1!%22%2C%22d%22%3A%22Euro%22%7D%2C%7B%22s%22%3A%22COMEX%3AGC1!%22%2C%22d%22%3A%22Gold%22%7D%2C%7B%22s%22%3A%22NYMEX%3ACL1!%22%2C%22d%22%3A%22Oil%22%7D%2C%7B%22s%22%3A%22NYMEX%3ANG1!%22%2C%22d%22%3A%22Gas%22%7D%2C%7B%22s%22%3A%22CBOT%3AZC1!%22%2C%22d%22%3A%22Corn%22%7D%5D%2C%22originalTitle%22%3A%22Futures%22%7D%2C%7B%22title%22%3A%22Bonds%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22CME%3AGE1!%22%2C%22d%22%3A%22Eurodollar%22%7D%2C%7B%22s%22%3A%22CBOT%3AZB1!%22%2C%22d%22%3A%22T-Bond%22%7D%2C%7B%22s%22%3A%22CBOT%3AUB1!%22%2C%22d%22%3A%22Ultra%20T-Bond%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBL1!%22%2C%22d%22%3A%22Euro%20Bund%22%7D%2C%7B%22s%22%3A%22EUREX%3AFBTP1!%22%2C%22d%22%3A%22Euro%20BTP%22%7D%2C%7B%22s%22%3A%22EUREX%3AFGBM1!%22%2C%22d%22%3A%22Euro%20BOBL%22%7D%5D%2C%22originalTitle%22%3A%22Bonds%22%7D%2C%7B%22title%22%3A%22Forex%22%2C%22symbols%22%3A%5B%7B%22s%22%3A%22FX%3AEURUSD%22%2C%22d%22%3A%22EUR%20to%20USD%22%7D%2C%7B%22s%22%3A%22FX%3AGBPUSD%22%2C%22d%22%3A%22GBP%20to%20USD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDJPY%22%2C%22d%22%3A%22USD%20to%20JPY%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCHF%22%2C%22d%22%3A%22USD%20to%20CHF%22%7D%2C%7B%22s%22%3A%22FX%3AAUDUSD%22%2C%22d%22%3A%22AUD%20to%20USD%22%7D%2C%7B%22s%22%3A%22FX%3AUSDCAD%22%2C%22d%22%3A%22USD%20to%20CAD%22%7D%5D%2C%22originalTitle%22%3A%22Forex%22%7D%5D%2C%22utm_source%22%3A%22jinimarkets.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22market-overview%22%2C%22page-uri%22%3A%22jinimarkets.com%2Flive-charts%2F%22%7D" title="market overview TradingView widget" lang="en" style="user-select: none; box-sizing: border-box; display: block; height: 500px; width: 100%;"></iframe>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="income__thumb wow fadeInRight animated" data-delay=".6s">
                        <iframe title="advanced chart TradingView widget" lang="en" id="tradingview_6013a" frameborder="0" allowtransparency="true" scrolling="" allowfullscreen="true" src="https://s.tradingview.com/widgetembed/?hideideas=1&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=in#%7B%22symbol%22%3A%22FX%3AEURUSD%22%2C%22frameElementId%22%3A%22tradingview_6013a%22%2C%22interval%22%3A%22D%22%2C%22symboledit%22%3A%221%22%2C%22saveimage%22%3A%221%22%2C%22studies%22%3A%22%5B%5D%22%2C%22theme%22%3A%22light%22%2C%22style%22%3A%221%22%2C%22timezone%22%3A%22Etc%2FUTC%22%2C%22studies_overrides%22%3A%22%7B%7D%22%2C%22utm_source%22%3A%22jgcfx.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22chart%22%2C%22utm_term%22%3A%22FX%3AEURUSD%22%2C%22page-uri%22%3A%22jgcfx.com%2Flivechart.php%22%7D" style="width: 100%; height: 500px; margin: 0px !important; padding: 0px !important;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner area end -->

    <!-- Income area start  -->
    <section class="income__area o-xs section-space">
        <div class="container">
            <div class="row gy-50 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="income__thumb wow fadeInLeft animated" data-delay=".6s">
                        @if($static && $static->image)
                            <img src="{{ asset('uploads/static_img') }}/{{ $static->image }}" alt="image not found">
                        @endif
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="income__content wow fadeInRight animated" data-wow-delay=".6s">
                        <div class="section__title-wrapper mb-30">
                            <span class="section__subtitle-6 uppercase mb-20">{{ @$static->sub_title }}</span>
                            <h2 class="section__title">{{ @$static->headline }}</h2>
                        </div>
                        <p>{!! nl2br(@$static->description) !!}</p>
                        <div class="info__list">
                            <ul>
                                @if($static && $static->point_1)
                                        <li>{{ $static->point_1 }}</li>
                                    @endif
                                    @if($static && $static->point_2)
                                        <li>{{ $static->point_2 }}</li>
                                    @endif
                                    @if($static && $static->point_3)
                                        <li>{{ $static->point_3 }}</li>
                                    @endif
                                    @if($static && $static->point_4)
                                        <li>{{ $static->point_4 }}</li>
                                    @endif
                            </ul>
                        </div>
                        @if($static && $static->url)
                            <div class="btn__wrapper">
                                <a class="bd-gradient-btn" href="{{ $static->url }}">{{ $static->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Income area end  -->


@endsection
@section('footer_script')
@endsection