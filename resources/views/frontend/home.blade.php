@extends('frontend.layouts.app')
@section('title', ' / '.$data['title'])
@section('description', $data['description'])
@section('keywords', $data['keywords'])
@section('header_link')
<style>
    .prefix {
        position: relative;
        right: -1px;
        color: white;
        top: 45px;
        background-color: #98959554;
        padding: 22px 8px 22px 9px;
        border-radius: 5px 0 0 5px;
    }

    input.has-prefix {
        padding-left: 30px;
        /* margin-left: -50px */
    }

    input[type=range] {
        -webkit-appearance: none;
        width: calc(100% - 30px);
    }
    input[type=range]:focus {
        outline: none;
    }
    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        background: #d3d3d3;
        border-radius: 10px;
        border: 0.2px solid #010101;
        /* background: linear-gradient(to right, rgb(4, 170, 109) 0.15%, transparent 0.15%); */
        /* box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d; */
    }
    input[type=range]::-webkit-slider-thumb {
        /* box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d; */
        /* border: 1px solid #000000; */
        height: 15px;
        width: 15px;
        border-radius: 100%;
        border: 3px solid #fff;
        background: #04AA6D;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #d3d3d3;
    }
    input[type=range]::-moz-range-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        background: #d3d3d3;
        border-radius: 10px;
        border: 0.2px solid #010101;
    }
    input[type=range]::-moz-range-thumb {
        height: 15px;
        width: 15px;
        border-radius: 100%;
        border: 3px solid #fff;
        background: #04AA6D;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]::-ms-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        background: #d3d3d3;
        border-radius: 10px;
        border: 0.2px solid #010101;
    }
    input[type=range]::-ms-fill-lower {
    background: #04AA6D;
    border: 0.2px solid #010101;
    border-radius: 2.6px;
    }
    input[type=range]::-ms-fill-upper {
    background: #04AA6D;
    border: 0.2px solid #010101;
    border-radius: 2.6px;
    }
    input[type=range]::-ms-thumb {
        height: 15px;
        width: 15px;
        border-radius: 100%;
        border: 3px solid #fff;
        background: #04AA6D;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]:focus::-ms-fill-lower {
    background: #04AA6D;
    }
    input[type=range]:focus::-ms-fill-upper {
    background: #04AA6D;
    }
</style>
@endsection
@section('content')
<!-- Banner area start -->
        <span class="sec1"></span>
        <span class="sec2"></span>
        <span class="sec3"></span>
        <span class="sec4" style="display: none; ">
            <div class="section__devider ">
                <div class="container">
                    <hr>
                </div>
            </div>
            <section id="homeservice" class="service__area  p-relative z-index-11 section-space">
                <div class="service__glow">
                    <div class="glow-1"></div>
                </div>
                <div class="container">
                    <div class="row gy-5 align-items-end section__title-space">
                        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
                            <div class="section__title-wrapper">
                                <span class="section__subtitle-2 uppercase mb-25">{{ @$service->sub_title }}</span>
                                <h2 class="section__title mb-20">{{ @$service->headline }}</h2>
                                <p class="mb-0">{!! nl2br(@$service->description) !!}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4">
                            <!-- If we need navigation buttons -->
                            <div class="service__navigation justify-content-md-end">
                                <button class="service__button-prev"><i class="fa-regular fa-angle-left"></i></button>
                                <button class="service__button-next"><i class="fa-regular fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    @if(sizeof($service_list) != 0)
                        @php $classA = ['', 'is-brick-red', 'is-mainly-blue', 'is-mainly-green', 'is-mainly-pink']; $cou = 0; @endphp
                        <div class="row wow fadeInUp" data-wow-delay=".3s">
                            <div class="col-xx-12">
                                <div class="swiper service__active">
                                    <div class="swiper-wrapper">
                                        @foreach ($service_list as $ser_val)
                                            <div class="swiper-slide">
                                                <div class="service__item fix {{ $classA[$cou] }} text-center">
                                                    <div class="service__ring"></div>
                                                    <div class="service__icon">
                                                        <span>{!! $ser_val->icon !!}</span>
                                                    </div>
                                                    <div class="service__content">
                                                        <h3><a href="{{ $ser_val->url?$ser_val->url:'#' }}">{{ $ser_val->title }}</a></h3>
                                                        <p>{!! nl2br(@$ser_val->description) !!}</p>
                                                        @if($ser_val->url) <a class="service__link-btn uppercase" href="{{ $ser_val->url }}">{{ $ser_val->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>@endif
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
                                    </div>
                                    <div class="pagination__wrappper">
                                        <div class="bd-swiper-dot text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </span>
        <span class="sec5"  style="display: none; ">
            <div class="section__devider">
                <div class="container">
                    <hr>
                </div>
            </div>
            <section class="loan__area">
                <div class="container">
                    <div class="inv__wrapper wow fadeInUp" data-wow-delay=".3s">
                        <div class="loan__form-wrapper">
                            <div class="loan__from-title">
                                <h3>Investment Calculator</h3>
                            </div>
                            <div class="loan__form">
                                <form action="#" method="POST">
                                    <div class="loan__input-item">
                                        <div class="loan__input">
                                            <div class="loan__input-title">
                                                <label for="loan-amount">How much Money you investing?*</label>
                                            </div>
                                            <div class="loan__range">
                                                <span class="prefix">$</span>
                                                <input type="number" id="loan-amount" class="loan-amount has-prefix" >
                                                <input type="range" class="form-range slider" id="loan-range-bar-cus" style="height: auto;padding: 2px;position: relative;top: -15px;background: linear-gradient(to right, rgb(4, 170, 109) 0.15%, transparent 0.15%);margin: 0 3px 0 27px;">
                                                {{-- <div class="loan-range-bar"></div> --}}
                                                <span class="error text-danger" id="loan-amount_error" style="display: none;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loan__input-item">
                                        <div class="loan__input-title">
                                            <label>How many Month?*</label>
                                        </div>
                                        <div class="loan__select">
                                            <select>
                                                <option>12 Months</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="loan__notice">
                                <div class="loan__notice-content">
                                    <span>Management Fees:</span>
                                    <h3 id="fees">$1350 USD<span></span></h3>
                                </div>
                            </div>
                            @if(!Auth::user() || Auth::user()->role != 'client')
                            <div class="loan__input-item" style="margin-top: 20px;">
                                <a class="bd-gradient-btn" href="{{ route('register')}}">sign up</a>
                            </div>
                            @endif
                        </div>
                        <div class="loan__thumb-wrapper">
                            <div class="loan__thumb">
                                <img src="{{ asset('frontend/assets/imgs/loan/loan-thumb.png')}}" alt="image not found">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </span>
        <span class="sec6"></span>
        <span class="sec7"></span>
        <span class="sec8"></span>
        <span class="sec9"></span>
        <span class="sec10"></span>
        {{-- <section class="banner__area banner-2 p-relative fix">
            <div class="banner-glow-2">
                <div class="glow-1"></div>
            </div>
            <div class="container">
                <div class="banner__grid-2">
                    <div class="banner__content-2 wow fadeInLeft animated" data-wow-delay=".1.5s">
                        <span class="banner__sbutitle-2 uppercase mb-25">{{ @$banner->sub_title }}</span>
                        <h2 class="cd-headline clip is-full-width">{{ @$banner->headline }}<br>
                            @if($banner && ($banner->sub_headline_1 || $banner->sub_headline_2 || $banner->sub_headline_3))
                                <span class="cd-words-wrapper">
                                    @if($banner && $banner->sub_headline_1)
                                        <b class="is-visible gradient-text-1">{{ $banner->sub_headline_1 }}</b>
                                    @endif
                                    @if($banner && $banner->sub_headline_2)
                                        <b class="@if($banner->sub_headline_1) is-hidden @else is-visible @endif gradient-text-1">{{ $banner->sub_headline_2 }}</b>
                                    @endif
                                    @if($banner && $banner->sub_headline_3)
                                        <b class="@if($banner->sub_headline_1 || $banner->sub_headline_2) is-hidden @else is-visible @endif gradient-text-1">{{ $banner->sub_headline_3 }}</b>
                                    @endif
                                </span>
                            @endif
                        </h2>
                        <div class="banner__input">
                            <form action="#">
                                <input type="text" placeholder="Enter Email">
                                <button class="bd-gradient-btn" type="submit">Submit now<span><i class="fa-regular fa-angle-right"></i></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="banner__thumb-wrapper-2 p-relative z-index-11 wow fadeInRight animated" data-wow-delay=".1.5s">
                        <div class="banner__thumb-2">
                            @if($banner && $banner->image)
                                <img src="{{ asset('uploads/banner_img') }}/{{ $banner->image }}" alt="image not found">
                            @endif
                        </div>
                        @if($banner && $banner->offer_line && $banner->offer_count)
                            <div class="banner__card" data-parallax='{"y": 60, "smoothness": 15}'>
                                <div class="banner__card-info">
                                    <span>{{ $banner->offer_line }}</span>
                                    <h2><span class="counter">{{ $banner->offer_count }}</span>%</h2>
                                </div>
                            </div>
                        @endif
                        <div class="banner-round wow zoomIn" data-wow-delay=".3s"></div>
                        <div class="banner__blur"></div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Banner area end -->

        <!-- Section devider -->
        {{--<div class="section__devider ">
            <div class="container">
                <hr>
            </div>
        </div>

        <!-- About area start -->
         <section id="homeabout" class="about__area o-xs section-space">
            <div class="container">
                <div class="row gy-50 align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="about__wrapper wow fadeInLeft animated" data-wow-delay=".3s">
                            <div class="about__thumb">
                                @if($about && $about->image)
                                    <img src="{{ asset('uploads/about_img') }}/{{ $about->image }}" alt="image not found">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="about__content wow fadeInRight animated" data-wow-delay=".3s">
                            <div class="section__title-wrapper mb-30">
                                <span class="banner__sbutitle-2 uppercase mb-20">{{ @$about->sub_title }}</span>
                                <h1 class="section__title">{{ @$about->headline }}</h1>
                            </div>
                            <p>{!! nl2br(@$about->description) !!}</p>
                            <div class="info__list">
                                <ul>
                                    @if($about && $about->point_1)
                                        <li>{{ $about->point_1 }}</li>
                                    @endif
                                    @if($about && $about->point_2)
                                        <li>{{ $about->point_2 }}</li>
                                    @endif
                                    @if($about && $about->point_3)
                                        <li>{{ $about->point_3 }}</li>
                                    @endif
                                    @if($about && $about->point_4)
                                        <li>{{ $about->point_4 }}</li>
                                    @endif
                                </ul>
                            </div>
                            @if($about && $about->url)
                                <div class="btn__wrapper">
                                    <a class="bd-gradient-btn" href="{{ $about->url }}">{{ $about->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- About area end -->
        
        <!-- Section devider -->
        {{-- theme-bg-2 --}}
        {{-- <div class="section__devider">
            <div class="container">
                <hr>
            </div>
        </div>

        <section id="homesupport" class="support__area section-space ">
            <div class="container">
                <div class="row gy-50 align-items-center">
                    <div class="col-xxl-7 col-xl-6 col-lg-6">
                        <div class="support__wrapper wow fadeInUp" data-wow-delay=".3s">
                            <div class="support__thumb">
                                @if($robo && $robo->image)
                                    <img src="{{ asset('uploads/robo_img') }}/{{ $robo->image }}" alt="image not found">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <div class="support__content wow fadeInUp" data-wow-delay=".3s">
                            <div class="section__title-wrapper">
                                <span class="section__subtitle-2 uppercase mb-20">{{ @$robo->sub_title }}</span>
                                <h2 class="section__title mb-20">{{ @$robo->headline }}</h2>
                            </div>
                            <p>{!! nl2br(@$robo->description_1) !!}</p>
                            @if($robo && $robo->description_2)
                                <p>{!! nl2br(@$robo->description_2) !!}</p>
                            @endif
                            @if($robo && $robo->url)
                                <div class="btn__wrapper">
                                    <a class="bd-gradient-btn" href="{{ $robo->url }}">{{ $robo->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </section> --}}
        <!-- Support area end -->
        
        <!-- Section devider -->
        {{-- <div class="section__devider ">
            <div class="container">
                <hr>
            </div>
        </div>
        <section id="homeservice" class="service__area  p-relative z-index-11 section-space">
            <div class="service__glow">
                <div class="glow-1"></div>
            </div>
            <div class="container">
                <div class="row gy-5 align-items-end section__title-space">
                    <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
                        <div class="section__title-wrapper">
                            <span class="section__subtitle-2 uppercase mb-25">{{ @$service->sub_title }}</span>
                            <h2 class="section__title mb-20">{{ @$service->headline }}</h2>
                            <p class="mb-0">{!! nl2br(@$service->description) !!}</p>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4">
                        <!-- If we need navigation buttons -->
                        <div class="service__navigation justify-content-md-end">
                            <button class="service__button-prev"><i class="fa-regular fa-angle-left"></i></button>
                            <button class="service__button-next"><i class="fa-regular fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
                @if(sizeof($service_list) != 0)
                    @php $classA = ['', 'is-brick-red', 'is-mainly-blue', 'is-mainly-green', 'is-mainly-pink']; $cou = 0; @endphp
                    <div class="row wow fadeInUp" data-wow-delay=".3s">
                        <div class="col-xx-12">
                            <div class="swiper service__active">
                                <div class="swiper-wrapper">
                                    @foreach ($service_list as $ser_val)
                                        <div class="swiper-slide">
                                            <div class="service__item fix {{ $classA[$cou] }} text-center">
                                                <div class="service__ring"></div>
                                                <div class="service__icon">
                                                    <span>{!! $ser_val->icon !!}</span>
                                                </div>
                                                <div class="service__content">
                                                    <h3><a href="{{ $ser_val->url?$ser_val->url:'#' }}">{{ $ser_val->title }}</a></h3>
                                                    <p>{!! nl2br(@$ser_val->description) !!}</p>
                                                    @if($ser_val->url) <a class="service__link-btn uppercase" href="{{ $ser_val->url }}">{{ $ser_val->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>@endif
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
                                </div>
                                <div class="pagination__wrappper">
                                    <div class="bd-swiper-dot text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section> --}}
        <!-- Service area end -->

        <!-- Section devider -->
        {{-- <div class="section__devider">
            <div class="container">
                <hr>
            </div>
        </div>
        <section class="loan__area">
            <div class="container">
                <div class="inv__wrapper wow fadeInUp" data-wow-delay=".3s">
                    <div class="loan__form-wrapper">
                        <div class="loan__from-title">
                            <h3>Investment Calculator</h3>
                        </div>
                        <div class="loan__form">
                            <form action="#" method="POST">
                                <div class="loan__input-item">
                                    <div class="loan__input">
                                        <div class="loan__input-title">
                                            <label for="loan-amount">How much Money you investing?*</label>
                                        </div>
                                        <div class="loan__range">
                                            <span class="prefix">$</span>
                                            <input type="number" id="loan-amount" class="loan-amount has-prefix" >
                                            <div class="loan-range-bar"></div>
                                            <span class="error text-danger" id="loan-amount_error" style="display: none;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="loan__input-item">
                                    <div class="loan__input-title">
                                        <label>How many Month?*</label>
                                    </div>
                                    <div class="loan__select">
                                        <select>
                                            <option>12 Months</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="loan__notice">
                            <div class="loan__notice-content">
                                <span>Management Fees:</span>
                                <h3 id="fees">$1350 USD<span></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="loan__thumb-wrapper">
                        <div class="loan__thumb">
                            <img src="{{ asset('frontend/assets/imgs/loan/loan-thumb.png')}}" alt="image not found">
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Loan area end -->

        <!-- Section devider -->
        {{-- <div class="section__devider ">
            <div class="container">
                <hr>
            </div>
        </div>

        <!-- Transaction area start -->
        <section class="transaction__area section-space">
            <div class="container">
                <div class="row gy-50 align-items-center wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="transaction__thumb">
                            @if($secure_trading && $secure_trading->image)
                                <img src="{{ asset('uploads/secure_trading_img') }}/{{ $secure_trading->image }}" alt="image not found">
                            @endif
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="transaction__content">
                            <div class="section__title-wrapper mb-35">
                                <span class="section__subtitle uppercase mb-20">{{ @$secure_trading->sub_title }}</span>
                                <h2 class="section__title mb-20">{{ @$secure_trading->headline }}</h2>
                                <p class="mb-0">{!! nl2br(@$secure_trading->description) !!}</p>
                            </div>
                            <div class="info__list">
                                <ul>
                                    @if($secure_trading && $secure_trading->point_1)
                                        <li>{{ $secure_trading->point_1 }}</li>
                                    @endif
                                    @if($secure_trading && $secure_trading->point_2)
                                        <li>{{ $secure_trading->point_2 }}</li>
                                    @endif
                                    @if($secure_trading && $secure_trading->point_3)
                                        <li>{{ $secure_trading->point_3 }}</li>
                                    @endif
                                    @if($secure_trading && $secure_trading->point_4)
                                        <li>{{ $secure_trading->point_4 }}</li>
                                    @endif
                                </ul>
                            </div>
                            @if($secure_trading && $secure_trading->url)
                                <div class="btn__wrapper">
                                    <a class="bd-gradient-btn" href="{{ $secure_trading->url }}">{{ $secure_trading->button_name }}<span><i class="fa-regular fa-angle-right"></i></span></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Transaction area start -->
        
        <!-- Section devider -->
        {{-- <div class="section__devider ">
            <div class="container">
                <hr>
            </div>
        </div> --}}

        <!-- Answer area start -->
        {{-- <section class="answer__area o-xs  section-space">
            <div class="container">
                <div class="row gy-50 justify-content-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="answer__content wow fadeInUp" data-wow-delay=".5s">
                            <div class="answer__icon">
                                <span><svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M10.7144 39.0002C10.5254 39.0002 10.3351 38.9578 10.1564 38.873C9.71279 38.6582 9.42864 38.2095 9.42864 37.7145V31.286H5.5715C3.44493 31.286 1.71436 29.5554 1.71436 27.4288V6.85739C1.71436 4.73082 3.44493 3.00024 5.5715 3.00024H36.4286C38.5552 3.00024 40.2858 4.73082 40.2858 6.85739V27.4288C40.2858 29.5554 38.5552 31.286 36.4286 31.286H20.8085L11.5179 38.7187C11.2852 38.9051 11.0011 39.0002 10.7144 39.0002ZM5.5715 5.57167C4.86178 5.57167 4.28578 6.14896 4.28578 6.85739V27.4288C4.28578 28.1372 4.86178 28.7145 5.5715 28.7145H10.7144C11.4254 28.7145 12.0001 29.2892 12.0001 30.0002V35.0402L19.5536 28.9961C19.7825 28.8135 20.0641 28.7145 20.3572 28.7145H36.4286C37.1384 28.7145 37.7144 28.1372 37.7144 27.4288V6.85739C37.7144 6.14896 37.1384 5.57167 36.4286 5.57167H5.5715Z" fill="white"/>
                           <path d="M31.2859 15.8573H10.7144C10.0034 15.8573 9.42871 15.2813 9.42871 14.5716C9.42871 13.8619 10.0034 13.2859 10.7144 13.2859H31.2859C31.9969 13.2859 32.5716 13.8619 32.5716 14.5716C32.5716 15.2813 31.9969 15.8573 31.2859 15.8573Z" fill="white"/>
                           <path d="M21.0001 21.0001H10.7144C10.0034 21.0001 9.42871 20.4241 9.42871 19.7144C9.42871 19.0047 10.0034 18.4287 10.7144 18.4287H21.0001C21.7111 18.4287 22.2859 19.0047 22.2859 19.7144C22.2859 20.4241 21.7111 21.0001 21.0001 21.0001Z" fill="white"/>
                           </svg>
                        </span>
                            </div>
                            <div class="section__title-wrapper">
                                <h2 class="section__title mb-20">Our Answer are so faster Ever!</h2>
                            </div>
                            <p><span class="text-color-1">Get help from our experts in minutes, not days.</span> Lorem um dolor sit amet consectetur adipiscing mattis. Peltesque sit amet sapien fringilla, mattis ligula consecte.</p>
                            <div class="btn__wrapper">
                                <a class="bd-gradient-btn" href="contact.html">Know More<span><i class="fa-regular fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="answer__reply-item wow fadeInRight" data-wow-delay=".7s">
                            <div class="answer__reply-user">
                                <span><img src="{{ asset('frontend/assets/imgs/user/user-01.png') }}" alt="image not found"></span>
                            </div>
                            <div class="answer__conmtent-box">
                                <div class="answer__reply-top">
                                    <span>Emelie</span>
                                    <span>11.09am</span>
                                </div>
                                <div class="answer__reply-content">
                                    <div class="answer__reply-text">
                                        <p>Hi Mark!</p>
                                        <p>How can i help you?</p>
                                        <p>Want to know More about Investment?</p>
                                    </div>
                                    <a class="answer__reply-btn" href="#">Read More</a>
                                </div>
                                <div class="answer__typing-inner d-flex justify-content-end mt-20">
                                    <div class="answer__typing">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Answer area start -->

        <!-- Feedback area start -->
        {{-- <section class="feedback__area section-space p-relative fix ">
            <div class="feedback__glow">
                <div class="feedback__glow-1"></div>
            </div>
            <div class="container p-relative">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="section__title-wrapper text-center section__title-space">
                            <span class="section__subtitle-2 uppercase mb-20">Testimonials</span>
                            <h2 class="section__title">Our Clients Feedback</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-7 col-lg-6 col-md-10">
                        <div class="feedback__active">
                            <div class="feesback__inner">
                                <div class="feedback__item">
                                    <div class="feedback__content">
                                        <div class="feedback__qote-wrap mb-40 p-relative">
                                            <div class="feedback__qote">
                                                <svg width="119" height="90" viewBox="0 0 119 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.08" d="M10.6638 82.7206C3.99882 75.4412 -0.00015825 67.5 -0.000157093 54.2647C-0.000155068 31.1029 16.6623 10.5882 39.9896 -6.8755e-06L45.9881 8.60293C23.9937 20.5147 19.3282 35.7353 17.9952 45.6618C21.3277 43.6765 25.9932 43.0147 30.6587 43.6765C42.6556 45 51.9866 54.2647 51.9866 66.8382C51.9866 72.7941 49.3206 78.75 45.3216 83.3823C40.6561 88.0147 35.3242 90 28.6592 90C21.3277 90 14.6628 86.6912 10.6638 82.7206ZM77.3134 82.7206C70.6485 75.4412 66.6495 67.5 66.6495 54.2647C66.6495 31.1029 83.3119 10.5882 106.639 -1.04881e-06L112.638 8.60294C90.6434 20.5147 85.9779 35.7353 84.6449 45.6618C87.9774 43.6765 92.6429 43.0147 97.3083 43.6765C109.305 45 118.636 54.9265 118.636 66.8382C118.636 72.7941 115.97 78.75 111.971 83.3824C107.306 88.0147 101.974 90 95.3088 90C87.9774 90 81.3124 86.6912 77.3134 82.7206Z" fill="white" />
                                                </svg>
                                            </div>
                                            <div class="feedback__rating-icon">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            </div>
                                        </div>
                                        <p>“Fisherman provided exactly what was requested & explaine clearly the logic behind his recommendations. I have every confidence that he has fully understcircumstances and has taken these into account”</p>
                                        <div class="feedback__author">
                                            <div class="feedback__author-thumb">
                                                <img src="{{ asset('frontend/assets/imgs/user/user-01.png') }}" alt="image not found">
                                            </div>
                                            <div class="feedback__author-info">
                                                <h4>Maral Arman</h4>
                                                <span>Business man</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feesback__inner">
                                <div class="feedback__item">
                                    <div class="feedback__content">
                                        <div class="feedback__qote-wrap mb-40 p-relative">
                                            <div class="feedback__qote">
                                                <svg width="119" height="90" viewBox="0 0 119 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.08" d="M10.6638 82.7206C3.99882 75.4412 -0.00015825 67.5 -0.000157093 54.2647C-0.000155068 31.1029 16.6623 10.5882 39.9896 -6.8755e-06L45.9881 8.60293C23.9937 20.5147 19.3282 35.7353 17.9952 45.6618C21.3277 43.6765 25.9932 43.0147 30.6587 43.6765C42.6556 45 51.9866 54.2647 51.9866 66.8382C51.9866 72.7941 49.3206 78.75 45.3216 83.3823C40.6561 88.0147 35.3242 90 28.6592 90C21.3277 90 14.6628 86.6912 10.6638 82.7206ZM77.3134 82.7206C70.6485 75.4412 66.6495 67.5 66.6495 54.2647C66.6495 31.1029 83.3119 10.5882 106.639 -1.04881e-06L112.638 8.60294C90.6434 20.5147 85.9779 35.7353 84.6449 45.6618C87.9774 43.6765 92.6429 43.0147 97.3083 43.6765C109.305 45 118.636 54.9265 118.636 66.8382C118.636 72.7941 115.97 78.75 111.971 83.3824C107.306 88.0147 101.974 90 95.3088 90C87.9774 90 81.3124 86.6912 77.3134 82.7206Z" fill="white" />
                                                </svg>
                                            </div>
                                            <div class="feedback__rating-icon">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            </div>
                                        </div>
                                        <p>“Fisherman provided exactly what was requested & explaine clearly the logic behind his recommendations. I have every confidence that he has fully understcircumstances and has taken these into account”</p>
                                        <div class="feedback__author">
                                            <div class="feedback__author-thumb">
                                                <img src="{{ asset('frontend/assets/imgs/user/user-01.png') }}" alt="image not found">
                                            </div>
                                            <div class="feedback__author-info">
                                                <h4>Maral Arman</h4>
                                                <span>Business man</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feesback__inner">
                                <div class="feedback__item">
                                    <div class="feedback__content">
                                        <div class="feedback__qote-wrap mb-40 p-relative">
                                            <div class="feedback__qote">
                                                <svg width="119" height="90" viewBox="0 0 119 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.08" d="M10.6638 82.7206C3.99882 75.4412 -0.00015825 67.5 -0.000157093 54.2647C-0.000155068 31.1029 16.6623 10.5882 39.9896 -6.8755e-06L45.9881 8.60293C23.9937 20.5147 19.3282 35.7353 17.9952 45.6618C21.3277 43.6765 25.9932 43.0147 30.6587 43.6765C42.6556 45 51.9866 54.2647 51.9866 66.8382C51.9866 72.7941 49.3206 78.75 45.3216 83.3823C40.6561 88.0147 35.3242 90 28.6592 90C21.3277 90 14.6628 86.6912 10.6638 82.7206ZM77.3134 82.7206C70.6485 75.4412 66.6495 67.5 66.6495 54.2647C66.6495 31.1029 83.3119 10.5882 106.639 -1.04881e-06L112.638 8.60294C90.6434 20.5147 85.9779 35.7353 84.6449 45.6618C87.9774 43.6765 92.6429 43.0147 97.3083 43.6765C109.305 45 118.636 54.9265 118.636 66.8382C118.636 72.7941 115.97 78.75 111.971 83.3824C107.306 88.0147 101.974 90 95.3088 90C87.9774 90 81.3124 86.6912 77.3134 82.7206Z" fill="white" />
                                                </svg>
                                            </div>
                                            <div class="feedback__rating-icon">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            </div>
                                        </div>
                                        <p>“Fisherman provided exactly what was requested & explaine clearly the logic behind his recommendations. I have every confidence that he has fully understcircumstances and has taken these into account”</p>
                                        <div class="feedback__author">
                                            <div class="feedback__author-thumb">
                                                <img src="{{ asset('frontend/assets/imgs/user/user-01.png') }}" alt="image not found">
                                            </div>
                                            <div class="feedback__author-info">
                                                <h4>Maral Arman</h4>
                                                <span>Business man</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feedback__navigation d-none d-lg-block"></div>
            </div>
        </section> --}}
        <!-- Feedback area end -->

        
        <!-- Mobile app area start -->
        {{-- <section class="mobile__app-area p-relative z-index-11">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay=".3s">
                    <div class="col-xxl-12">
                        <div class="mobile__app-wrapper">
                            <div class="mobile__app-grid">
                                <div class="mobile__app-thumb-wrapper">
                                    <div class="mobile__app-thumb">
                                        <img src="{{ asset('frontend/assets/imgs/app/app-01.png') }}" alt="image not found">
                                    </div>
                                    <div class="mobile__app-thumb">
                                        <img src="{{ asset('frontend/assets/imgs/app/app-02.png') }}" alt="image not found">
                                    </div>
                                </div>
                                <div class="mobile__app-content">
                                    <div class="section__title-wrapper is-white">
                                        <h2 class="section__title mb-25">Download Our Investment Mobile App Now!</h2>
                                    </div>
                                    <p class="bd-text-white">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et</p>
                                    <div class="mobile__app-download">
                                        <a class="app__download" href="#">
                                            <img src="{{ asset('frontend/assets/imgs/app/play-store.png') }}" alt="image not found">
                                        </a>
                                        <a class="app__download" href="#">
                                            <img src="{{ asset('frontend/assets/imgs/app/apple-store.png') }}" alt="image not found">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Mobile app area end -->
@endsection
@section('footer_script')
<script>
    var ENDPOINT = "{{ route('home') }}";
    section = 1;
    $(document).ready(function() {
        homeLoadMore(section);
        // section = section+1;
        // homeLoadMore(section);
    });
    $(window).scroll(function () {
       
        if (($(window).scrollTop() +100) >= $(document).height() - $(window).height()) {  
            section = section+1;
            if(section <= 10){
                homeLoadMore(section);  
            }
        }  
    });  
    function homeLoadMore(section) {
        $.ajax({
            url: ENDPOINT + "?section=" + section,
            datatype: "html",
            type: "get",
        })
        .done(function (response) {
            if(response.section == 4){
                $(".sec"+response.section).removeAttr("style");
            } else if(response.section == 5){
                $(".sec"+response.section).removeAttr("style");
            }else {
                $(".sec"+response.section).append(response.html);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }
</script>
@endsection