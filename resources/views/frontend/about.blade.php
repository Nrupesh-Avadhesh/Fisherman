@extends('frontend.layouts.app')
@section('title', ' / '.$data['title'])
@section('description', $data['description'])
@section('keywords', $data['keywords'])
@section('header_link')
@endsection
@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area breadcrumb-space theme-bg-1 valign p-relative z-index-11 fix">
        <div class="breadcrumb__glow">
            <div class="glow-1"></div>
            <div class="glow-2"></div>
        </div>
        <div class="round__shape">
            @if($banner && $banner->image)
                <img src="{{ asset('uploads/banner_img') }}/{{ $banner->image }}" alt="image not found">
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-8">
                    <div class="breadcrumb__title-wraper">
                        <span class="section__subtitle-7 wow fadeIn mb-20" data-wow-delay=".3s">{{ @$banner->sub_title }}</span>
                        <h2 class="breadcrumb__title wow fadeIn" data-wow-delay=".5s">{{ @$banner->headline }}
                            @if($banner && $banner->sub_headline)
                                <span class="gradient-text-3">{{ $banner->sub_headline }}</span>
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->
    @if($vision)
    <!-- Our Mission area start -->
    <section class="mission__area o-xs section-space">
        <div class="container">
            <div class="row gy-50 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="mission__thumb wow fadeInLeft animated" data-wow-delay=".6s">
                        @if($vision && $vision->image)
                            <img src="{{ asset('uploads/vision_img') }}/{{ $vision->image }}" alt="image not found">
                        @endif
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="mission__content wow fadeInRight animated" data-wow-delay=".6s">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-7 mb-20">{{ @$vision->sub_title }}</span>
                            <h1 class="section__title mb-20">{{ @$vision->headline }}</h1>
                        </div>
                        <p>{!! nl2br(@$vision->description) !!}</p>
                        @if($vision && $vision->url)
                            <div class="btn__wrapper">
                                <a class="bd-gradient-btn" href="{{ $vision->url }}">{{ $vision->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Our Mission area end -->
    <div class="section__devider ">
        <div class="container">
            <hr>
        </div>
    </div>
    @endif


    @if($mission)
    <!-- Our Mission area start -->
    <section class="mission__area o-xs section-space">
        <div class="container">
            <div class="row gy-50 align-items-center">
                
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="mission__content wow fadeInRight animated" data-wow-delay=".6s">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-7 mb-20">{{ @$mission->sub_title }}</span>
                            <h2 class="section__title mb-20">{{ @$mission->headline }}</h2>
                        </div>
                        <p>{!! nl2br(@$mission->description) !!}</p>
                        @if($mission && $mission->url)
                            <div class="btn__wrapper">
                                <a class="bd-gradient-btn" href="{{ $mission->url }}">{{ $mission->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="mission__thumb wow fadeInLeft animated" data-wow-delay=".6s">
                        @if($mission && $mission->image)
                            <img src="{{ asset('uploads/mission_img') }}/{{ $mission->image }}" alt="image not found">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Mission area end -->
    <div class="section__devider ">
        <div class="container">
            <hr>
        </div>
    </div>
    @endif
    
    <!-- Our Value area start -->
    <section class="our-values__area theme-bg-5 section-space section-rounded-60 section-space">
        <div class="container">
            <div class="row gy-50">
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="our-values__content-wrapper wow fadeIn" data-wow-delay=".3s">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-7 mb-20">{{ @$values->sub_title }}</span>
                            <h2 class="section__title mb-25">{{ @$values->sub_title }}</h2>
                        </div>
                        <p class="mb-0">{{ @$values->description }}</p>
                        @if($values && $values->url)
                            <div class="btn__wrapper">
                                <a class="bd-gradient-btn" href="{{ $values->url }}">{{ $values->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7">
                    <div class="row g-5">
                        @if(@$values->icon_1)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="our-values__item wow fadeIn" data-wow-delay=".4s">
                                <div class="our-values__icon">
                                    <span>{!! nl2br(@$values->icon_1) !!} </span>
                                </div>
                                <div class="our-values__content">
                                    <h3>{{ @$values->title_1 }}</h3>
                                    <p>{{ @$values->detail_1 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(@$values->icon_2)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="our-values__item is-mainly-red wow fadeIn" data-wow-delay=".5s">
                                <div class="our-values__icon">
                                    <span>{!! nl2br(@$values->icon_2) !!}</span>
                                </div>
                                <div class="our-values__content">
                                    <h3>{{ @$values->title_2 }}</h3>
                                    <p>{{ @$values->detail_2 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(@$values->icon_3)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="our-values__item is-mainly-pink wow fadeIn" data-wow-delay=".6s">
                                <div class="our-values__icon">
                                    <span>{!! nl2br(@$values->icon_3) !!}</span>
                                </div>
                                <div class="our-values__content">
                                    <h3>{{ @$values->title_3 }}</h3>
                                    <p>{{ @$values->detail_3 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(@$values->icon_4)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="our-values__item is-mainly-blue wow fadeIn" data-wow-delay=".7s">
                                <div class="our-values__icon">
                                    <span>{!! nl2br(@$values->icon_4) !!}</span>
                                </div>
                                <div class="our-values__content">
                                    <h3>{{ @$values->title_4 }}</h3>
                                    <p>{{ @$values->detail_4 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Revolution area start -->
    <section class="revolution__area section-space wow fadeIn" data-wow-delay=".6s">
        <div class="container">
            <div class="revolution__wrapper">
                <div class="revolution__shape"></div>
                <div class="row gy-5 align-items-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <div class="revolution__intro section__title-space">
                            <h3>{{ @$count->headline }} <span class="text-paragraph">{{ @$count->sub_headline }}</span> </h3>
                        </div>
                    </div>
                </div>
                @if(@$count->name_1 || @$count->name_2 || @$count->name_3 || @$count->name_4)
                <div class="revolution__grid">
                    @if(@$count->name_1)
                        <div class="revolution__item text-center">
                            <div class="revolution__content">
                                <div class="revolution__number">
                                    @php $data_1 = number_format_short($count->count_1); @endphp
                                    <h2><span class="counter">{{ $data_1['n_format'] }}</span>{{ $data_1['suffix'] }}+</h2>
                                </div>
                                <p>{{ $count->name_1 }}</p>
                            </div>
                        </div>
                    @endif
                    @if(@$count->name_2)
                    <div class="revolution__item text-center is-mainly-red">
                        <div class="revolution__content">
                            <div class="revolution__number">
                                @php $data_2 = number_format_short($count->count_2); @endphp
                                <h2><span class="counter">{{ $data_2['n_format'] }}</span>{{ $data_2['suffix'] }}+</h2>
                            </div>
                            <p>{{ $count->name_2 }}</p>
                        </div>
                    </div>
                    @endif
                    @if(@$count->name_3)
                    <div class="revolution__item text-center is-mainly-blue">
                        <div class="revolution__content">
                            <div class="revolution__number">
                                @php $data_3 = number_format_short($count->count_3); @endphp
                                <h2><span class="counter">{{ $data_3['n_format'] }}</span>{{ $data_3['suffix'] }}+</h2>
                            </div>
                            <p>{{ $count->name_3 }}</p>
                        </div>
                    </div>
                    @endif
                    @if(@$count->name_4)
                    <div class="revolution__item text-center is-mainly-pink">
                        <div class="revolution__content">
                            <div class="revolution__number">
                                @php $data_4 = number_format_short($count->count_4); @endphp
                                <h2><span class="counter">{{ $data_4['n_format'] }}</span>{{ $data_4['suffix'] }}+</h2>
                            </div>
                            <p>{{ $count->name_4 }}</p>
                        </div>
                    </div>
                    @endif
                    
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Revolution area end -->
    <div class="section__devider ">
        <div class="container">
            <hr>
        </div>
    </div>
    
    <!-- Our Values area end -->

    <!-- Team area start -->
    {{-- <section class="team__area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="section__title-wrapper text-center section__title-space">
                        <span class="section__subtitle-7 mb-20">Our Team</span>
                        <h2 class="section__title">Our Leadership</h2>
                    </div>
                </div>
            </div>
            <div class="row wow fadeIn animated" data-wow-delay=".3s">
                <div class="col-xxl-12">
                    <div class="team__carousel">
                        <div class="swiper team__carousel-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="team__item text-center">
                                        <div class="team__thumb">
                                            <img src="{{ asset('frontend/assets/imgs/team/01.png') }}" alt="image not found">
                                        </div>
                                        <div class="team__contenrt">
                                            <h3><a href="#">James B. Carnes</a></h3>
                                            <span>Managing Director</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team__item text-center">
                                        <div class="team__thumb">
                                            <img src="{{ asset('frontend/assets/imgs/team/02.png') }}" alt="image not found">
                                        </div>
                                        <div class="team__contenrt">
                                            <h3><a href="#">Robert M. Williams</a></h3>
                                            <span>CEO & Founder</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team__item text-center">
                                        <div class="team__thumb">
                                            <img src="{{ asset('frontend/assets/imgs/team/03.png') }}" alt="image not found">
                                        </div>
                                        <div class="team__contenrt">
                                            <h3><a href="#">Claire T. Brown</a></h3>
                                            <span>Finance Head</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="common__nav-pre pagination__wrappper">
                                <!-- If we need navigation buttons -->
                                <div class="common__navigation">
                                    <button class="common__slider-button-prev"><i
                                class="fa-regular fa-angle-left"></i></button>
                                    <!-- If we need pagination -->
                                    <div class="why__choos-pagination">
                                        <div class="bd-swiper-dot text-center"></div>
                                    </div>
                                    <button class="common__slider-button-next"><i
                                class="fa-regular fa-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Team area end -->

    <!-- Section devider -->
    <div class="section__devider">
        <div class="container">
            <hr>
        </div>
    </div>

    <!-- Finance area start -->
    {{-- <section class="finance__area section-space">
        <div class="container">
            <div class="row gy-50 justify-content-center wow fadeIn" data-wow-delay=".3s">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="finance__content">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-7 mb-20">{{ @$finance->sub_title }}</span>
                            <h2 class="section__title mb-20">{{ @$finance->headline }}</h2>
                        </div>
                        <p>{{ @$finance->description }}</p>
                        @if($finance && $finance->url)
                            <div class="btn__wrapper">
                                <a class="bd-gradient-btn" href="{{ $finance->url }}">{{ $finance->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="finance__map-wrapper p-relative ">
                        <div class="finance__map-bg">
                            @if($finance && $finance->image)
                                <img src="{{ asset('uploads/finance_img') }}/{{ $finance->image }}" alt="image not found">
                            @endif
                        </div>
                        @if($finance && $finance->address)
                            <div class="lacation__item">
                                <div class="dot dot-1"></div>
                                <div class="location__map-info">
                                    <div class="location__content">
                                        <div class="location__top-info">
                                            <p>Main Street</p>
                                            @if($finance && $finance->distance_minutes)
                                                <span>{{ $finance->distance_minutes }} min</span>
                                            @endif
                                        </div>
                                        <div class="location__info">
                                            <div class="location__info-item">
                                                <div class="location__info-icon">
                                                    <span>
                                                        <svg width="15" height="20" viewBox="0 0 15 20" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.5 0C3.365 0 0 3.38833 0 7.55417C0 13.4733 6.795 19.585 7.08417 19.8417C7.20333 19.9475 7.35167 20 7.5 20C7.64833 20 7.79667 19.9475 7.91583 19.8425C8.205 19.585 15 13.4733 15 7.55417C15 3.38833 11.635 0 7.5 0ZM7.5 11.6667C5.2025 11.6667 3.33333 9.7975 3.33333 7.5C3.33333 5.2025 5.2025 3.33333 7.5 3.33333C9.7975 3.33333 11.6667 5.2025 11.6667 7.5C11.6667 9.7975 9.7975 11.6667 7.5 11.6667Z"
                                                                fill="#089EFF" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="location__info-text">
                                                    <p>
                                                        <a target="_blank" href="{{ $finance->map_url }}">{{ $finance->address }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <!--<div class="location__info-item">
                                                <div class="location__info-icon">
                                                    <span>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.00036 18C13.9631 18 18 13.9626 18 9C18 4.03742 13.9631 0 9.00036 0C4.03758 0 0 4.03742 0 9C0 13.9626 4.03758 18 9.00036 18ZM7.93447 3.70985V3.46542C7.93447 2.87636 8.41127 2.39957 9.00036 2.39957C9.58873 2.39957 10.0662 2.87636 10.0662 3.46542V3.71127C11.3346 3.98342 12.289 5.11322 12.289 6.46187C12.289 7.05021 11.8115 7.52771 11.2231 7.52771C10.634 7.52771 10.1572 7.05021 10.1572 6.46187C10.1572 6.08598 9.85093 5.77972 9.47503 5.77972H8.51929C8.14338 5.77972 7.83712 6.08598 7.83712 6.46187C7.83712 6.67717 7.94015 6.88181 8.11354 7.00971L9.00036 7.66627L11.1549 9.26078C11.8626 9.78446 12.289 10.6222 12.2947 11.5033V11.5133C12.2996 12.265 12.0118 12.9742 11.4832 13.5092C11.0909 13.9064 10.6006 14.1729 10.0662 14.2852V14.5346C10.0662 15.1236 9.58873 15.6004 9.00036 15.6004C8.41127 15.6004 7.93447 15.1236 7.93447 14.5346V14.2887C7.41431 14.1779 6.93609 13.9221 6.54953 13.5398C6.01445 13.0118 5.71742 12.307 5.71316 11.5552C5.7096 10.9668 6.18357 10.4865 6.77194 10.4829H6.77904C7.36457 10.4829 7.84138 10.9562 7.84493 11.5424C7.84635 11.9103 8.14232 12.2203 8.53066 12.2203C9.11959 12.2167 8.90023 12.218 9.48498 12.2146C9.8633 12.2116 10.1658 11.9046 10.1629 11.5275V11.5175C10.1615 11.3044 10.0584 11.1011 9.88646 10.9739L9.00036 10.3181L6.84513 8.72359C6.1317 8.19493 5.70534 7.34936 5.70534 6.46187C5.70534 5.11037 6.66251 3.97987 7.93447 3.70985Z"
                                                                fill="#FB5141" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="location__info-text">
                                                    <ul>
                                                        <li>Cash Withdraw </li>
                                                        <li>Balance Check </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                            <div class="lacation__link">
                                                <a class="lacation__btn" href={{ $finance->map_url }}"><span><i
                                            class="fa-regular fa-arrow-right"></i></span>Get Direction</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lacation__item">
                                <div class="dot dot-2"></div>
                            </div>
                            <div class="lacation__item">
                                <div class="dot dot-3"></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Finance area end -->


    <!-- Brand area start -->
    {{-- <div class="brand__area-6 theme-bg-1 section-rounded-60 section-space">
        <div class="container">
            <div class="swiper brnad__active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-01.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-02.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-03.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-04.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-05.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-06.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item text-center">
                            <div class="brand__thumb">
                                <img src="{{ asset('frontend/assets/imgs/brand/brand-02.png') }}" alt="image not found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Brand area end -->

@endsection
@section('footer_script')
@endsection