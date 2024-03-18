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