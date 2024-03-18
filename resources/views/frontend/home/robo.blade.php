{{-- theme-bg-2 --}}
<div class="section__devider">
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
</section>