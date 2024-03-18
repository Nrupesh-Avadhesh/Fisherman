<div class="section__devider ">
    <div class="container">
        <hr>
    </div>
</div>

<!-- Blog area start -->
<section id="homebenefits" class="blog__area section-space">
    <div class="container">
        <div class="row gy-50" id="data-vlist">
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="blog__content wow fadeIn" data-wow-delay=".3s">
                    <div class="section__title-wrapper">
                        <span class="section__subtitle-2 uppercase mb-20">Our Video</span>
                        <h2 class="section__title mb-20">{{ @$banner->headline }}</h2>
                    </div>
                    @if(@$banner->sub_headline) <p>{{ $banner->sub_headline }}</p> @endif
                    <div class="btn__wrapper">
                        <a class="bd-gradient-btn" href="{{ route('video') }}">View all Videos<span><i class="fa-regular fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
            @foreach($video as $val)
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <article class="blog__item wow fadeIn" data-wow-delay=".5s">
                    <div class="blog__thumb">
                        <a href="{{ $val->video_url }}">@if($val->image)<img src="{{ asset('uploads/video_img') }}/{{ $val->image }}" alt="image not found">@endif</a>
                    </div>
                    <div class="blog__content">
                        <h3 class="blog__title"><a href="{{ $val->video_url }}" >{{ substr_replace($val->title, "...", 50) }}</a></h3>
                        <div class="postbox__meta">
                            @if($val->author_name)
                            <span><a href="{{ $val->video_url }}">By : {{ $val->author_name }}</a></span>
                        @endif
                        <span>{{ timecount($val->date) }}</span>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>