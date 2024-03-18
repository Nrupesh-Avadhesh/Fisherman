@foreach($video as $val)
    <div class="col-xxl-4 col-xl-6 col-lg-6">
        <article class="blog__grid-item video__grid-item wow fadeIn" data-wow-delay=".3s">
            <div class="blog__thumb-warapper p-relative mb-30">
                <div class="blog__grid-thumb">
                    <a href="{{ $val->video_url }}">@if($val->image)<img src="{{ asset('uploads/video_img') }}/{{ $val->image }}" alt="image not found">@endif</a>
                </div>
                
            </div>
            <div class="blog__content">
                <h3 class="blog__title"><a href="{{ $val->video_url }}" >{{ $val->title }}</a></h3>
                <div class="postbox__meta video_postbox__meta">
                    @if($val->author_name)
                        <span><a href="{{ $val->video_url }}">By : {{ $val->author_name }}</a></span>
                    @endif
                    <span>{{ timecount($val->date) }}</span>
                </div>
            </div>
        </article>
    </div>
    @endforeach