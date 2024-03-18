<section class="banner__area banner-2 p-relative fix">
    <div class="banner-glow-2">
        <div class="glow-1"></div>
    </div>
    <div class="container">
        <div class="banner__grid-2">
            <div class="banner__content-2 wow fadeInLeft animated" data-wow-delay=".1.5s">
                <span class="banner__sbutitle-2 uppercase mb-25">{{ @$banner->sub_title }}</span>
                <h2 class="cd-headline clip is-full-width" style=" text-wrap: wrap; ">{{ @$banner->headline }}<br>
                    @if($banner && ($banner->sub_headline_1 || $banner->sub_headline_2 || $banner->sub_headline_3))
                        <span class="cd-words-wrapper">
                            @if($banner && $banner->sub_headline_1)
                                <b class="is-visible gradient-text-1" style=" text-wrap: wrap; ">{{ $banner->sub_headline_1 }}</b>
                            @endif
                            @if($banner && $banner->sub_headline_2)
                                <b class="@if($banner->sub_headline_1) is-hidden @else is-visible @endif gradient-text-1" style=" text-wrap: wrap; ">{{ $banner->sub_headline_2 }}</b>
                            @endif
                            @if($banner && $banner->sub_headline_3)
                                <b class="@if($banner->sub_headline_1 || $banner->sub_headline_2) is-hidden @else is-visible @endif gradient-text-1" style=" text-wrap: wrap; ">{{ $banner->sub_headline_3 }}</b>
                            @endif
                        </span>
                    @endif
                </h2>
                <div class="banner__input">
                    <form action="{{ route('register')}}">
                        <input type="email" placeholder="Enter Email" required>
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
</section>