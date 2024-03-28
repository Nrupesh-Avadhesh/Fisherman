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
            <img src="{{ asset('frontend/assets/imgs/shapes/cercle.png')}}" alt="image not found">
        </div>
        <div class="container">
            <div class="row gy-50 align-items-center justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__menu mb-15">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home')}}">Home</a></span></li>
                                    <li><span><a href="{{ route('blog')}}">Blog</a></span></li>
                                    <li><span>Blog Details</span></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="breadcrumb__title-wraper mb-30">
                            <h2 class="breadcrumb__title">{{ $blog->title }}</h2>
                        </div>
                        <div class="breadcrumb__meta">
                            @if($blog->author_name)
                            <div class="breadcrumb__meta-thumb">
                                <img src="{{ asset('uploads/blog_img') }}/{{ $blog->author_image }}" alt="image not found">
                            </div>
                            @endif
                            <div class="breadcrumb__list">
                                @if($blog->author_name)
                                <span class="dvdr"></span>
                                <span><a href="#">By {{ $blog->author_name }}</a></span>
                                @endif
                                <span class="dvdr"></span>
                                <span>{{ date('M d Y', strtotime($blog->date)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="breadcrumb__thumb-wrapper">
                        <div class="breadcrumb__thumb">
                            <img src="{{ asset('uploads/blog_img') }}/{{ $blog->label_image }}" alt="image not found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- Postbox area start -->
    <section class="postbox__area section-space">
        <div class="container">
            <div class="row gy-50">
                <div class="col-xxl-4 col-xl-4 col-lg-5">
                    <div class="sidebar__wrapper sidebar-bd-sticky pr-40">
                        <div class="sidebar__widget mb-40">
                            <div class="sidebar__widget-back">
                                <a class="sidebar__btn" href="#"><i class="fa-regular fa-chevron-left"></i></a>
                                <a class="sidebar__btn-text" href="{{ route('blog')}}"><span>Back to Blog</span></a>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title">Recent Post</h3>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__post">
                                    @forelse ($left_blog as $lef_val)
                                        <div class="rc__post d-flex align-items-center">
                                            <div class="rc__post-thumb">
                                                <a href="{{ route('blog.detail') }}?bi={{ $lef_val->id }}"><img src="{{ asset('uploads/blog_img') }}/{{ $lef_val->label_image }}" alt="image not found"></a>
                                            </div>
                                            <div class="rc__post-content">
                                                <h5 class="rc__post-title">
                                                    <a href="{{ route('blog.detail') }}?bi={{ $lef_val->id }}">{{ $lef_val->title }}</a>
                                                </h5>
                                                <div class="rc__meta">
                                                    <span>{{ timecount($lef_val->date) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="rc__post d-flex align-items-center">
                                        
                                            <div class="rc__post-content">
                                                <h5 class="rc__post-title">
                                                    <a href="blog-details.html">No blog found</a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!--<div class="sidebar__widget mb-40">-->
                        <!--    <div class="sidebar__widget-content">-->
                        <!--        <div class="sidebar__subcribe">-->
                        <!--            <h3 class="sidebar__widget-title">Subscribe Us</h3>-->
                                    <!--<p>Lorem ipsum dolor amet consectetur adipiscing elit massa.</p>-->
                        <!--            <form action="#">-->
                        <!--                <div class="sidebar__subscribe">-->
                        <!--                    <input type="email" placeholder="Enter Email">-->
                        <!--                    <button class="bd-gradient-btn w-100" type="submit">Submit now<span><i class="fa-regular fa-chevron-right"></i></span></button>-->
                        <!--                </div>-->
                        <!--            </form>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="sidebar__widget mb-40">
                            <div class="sidebar__widget-content">
                                <div class="sidebar__share">
                                    <h3 class="sidebar__widget-title">Share Post</h3>
                                    <div class="footer__social">
                                        {!! social_media('footer') !!}
                                        {{-- <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        <a href="#"><i class="fa-brands fa-youtube"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-7">
                    <div class="postbox__wrapper pl-50">
                        <div class="postbox__text mb-30">
                            <h1>{{ $blog->heading }}</h1>
                        </div>
                        
                        <div class="postbox__thumb mb-45">
                            <img src="{{ asset('uploads/blog_img') }}/{{ $blog->image }}" alt="image not found">
                        </div>
                        <div class="postbox__title mb-30">
                            {!! nl2br($blog->description_1) !!}
                        </div>
                        @if($p_blog || $n_blog)
                            <div class="postbox__more-navigation d-flex justify-content-between">
                                @if($p_blog)
                                    <div class="postbox__more-left d-flex align-items-center">
                                        <div class="postbox__more-content">
                                            <div class="postbox__more-text">
                                                <a href="{{ route('blog.detail') }}?bi={{ $p_blog->id }}"><i class="fa-regular fa-chevron-left"></i><span>Previous Article</span></a>
                                            </div>
                                            <p><a href="{{ route('blog.detail') }}?bi={{ $p_blog->id }}">{{ $p_blog->title }}</a></p>
                                        </div>
                                    </div>
                                @else
                                <div class="postbox__more-left d-flex align-items-center">
                                    <div class="postbox__more-content">
                                       
                                    </div>
                                </div>
                                @endif
                                @if($n_blog)
                                    <div class="postbox__more-right d-flex align-items-center text-start text-sm-end">
                                        <div class="postbox__more-content">
                                            <div class="postbox__more-text">
                                                <a href="{{ route('blog.detail') }}?bi={{ $n_blog->id }}"><span>Next post</span><i class="fa-regular fa-chevron-right"></i></a>
                                            </div>
                                            <p><a href="{{ route('blog.detail') }}?bi={{ $n_blog->id }}">{{ $n_blog->title }}</a></p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Postbox area start -->

@endsection
@section('footer_script')

@endsection