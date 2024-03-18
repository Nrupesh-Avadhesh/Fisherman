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