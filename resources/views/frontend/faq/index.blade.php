@extends('frontend.layouts.app')
@section('title', ' / '.$data['title'])
@section('description', $data['description'])
@section('keywords', $data['keywords'])
@section('header_link')
@endsection
@section('content')
    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area breadcrumb-space theme-bg-1 valign p-relative z-index-11 fix">
        <div class="breadcrumb__glow">
            <div class="glow-1"></div>
            <div class="glow-2"></div>
        </div>
        <div class="round__shape">
            @if($banner && $banner->image)
                <img src="{{ asset('uploads/banner_img') }}/{{ $banner->image }}" alt="image not found">
            @endif
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__menu mb-10">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home')}}">Home</a></span></li>
                                    <li><span>FAQ</span></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="breadcrumb__title-wraper mb-20">
                            <h1 class="breadcrumb__title">{{ @$banner->headline }}</h1>
                        </div>
                        <p>{{ @$banner->sub_headline }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->
    <input type="hidden" class="total_page" value="{{ $total_page }}">
    <!-- Blog area start -->
    <div class="faq__area section-space">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp" data-wow-delay=".3s">
                <div class="col-xxl-10 col-xl-10 col-lg-11">
                    <div class="fap__style-2">
                        <div class="bd__faq">
                            <div class="accordion" id="accordionExample">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="colxxl-12">
                    <div class="btn__wrapper d-flex justify-content-center">
                        <a class="bd-gradient-btn load-more-data" href="javascript: void(0)">Load More<span><i class="fa-regular fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog area start -->

@endsection
@section('footer_script')
<script>
    var ENDPOINT = "{{ route('faq') }}";
    var page = 1;
  
    $(".load-more-data").click(function(){
        page++;
        infinteLoadMore(page);
    });
  
    infinteLoadMore(page)
    function infinteLoadMore(page) {
        $.ajax({
            url: ENDPOINT + "?page=" + page,
            datatype: "html",
            type: "get",
        })
        .done(function (response) {
            if (response.html == '') {
                // $('.auto-load').html("We don't have more data to display :(");
                $('.load-more-data').hide();
                return;
            }
            if (page == $('.total_page').val()) {
                $('.load-more-data').hide();
            }
            $("#accordionExample").append(response.html);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }
</script>
@endsection