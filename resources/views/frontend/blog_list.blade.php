@foreach($blog as $val)
                <div class="col-xxl-4 col-xl-4 col-lg-6">
                    <article class="blog__item-2 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog__thumb-2">
                            <a href="{{ route('blog.detail') }}?bi={{ $val->id }}"><img src="{{ asset('uploads/blog_img') }}/{{ $val->label_image }}" alt="image not found"></a>
                        </div>
                        <div class="blog__content-2">
                            <div class="postbox__meta mb-15">
                                @if($val->author_name)
                                    <span><a href="{{ route('blog.detail') }}?bi={{ $val->id }}">By : {{ $val->author_name }}</a></span>
                                @endif
                                <span>{{ timecount($val->date) }}</span>
                            </div>
                            <h3 class="blog__title-2"><a href="{{ route('blog.detail') }}?bi={{ $val->id }}">{{ substr_replace($val->title, "...", 50) }}</a></h3>
                        </div>
                    </article>
                </div>
            @endforeach