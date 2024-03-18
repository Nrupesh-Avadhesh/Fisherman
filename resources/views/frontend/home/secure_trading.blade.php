<div class="section__devider ">
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
</section> 