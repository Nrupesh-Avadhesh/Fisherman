<div class="section__devider ">
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
</section>