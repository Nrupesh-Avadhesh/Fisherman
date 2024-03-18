<!-- Section devider -->
<div class="section__devider ">
    <div class="container">
        <hr>
    </div>
</div>

<!-- Blog area start -->
<section id="homeblog" class="blog__area {{-- theme-bg-1 --}} section-space">
    <div class="container">
        <div class="row justify-content-center section__title-space">
            <div class="col-xxl-5 col-xl-5 col-lg-5">
                <div class="section__title-wrapper text-center">
                    <span class="section__subtitle uppercase mb-20">our blog</span>
                    <h2 class="section__title">Read Our Latest Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row gy-5" id="data-blist">
            
        </div>
    </div>
</section>
<!-- Blog area end -->
{{-- video --}}
@php 
$url = explode('?', $_SERVER['REQUEST_URI']);
@endphp
@if ($url[0] != '/video' && $url[0] != '/public/video')
<!-- Section devider -->
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
                        <h2 class="section__title mb-20">Our Latest Videos</h2>
                    </div>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa.</p> --}}
                    <div class="btn__wrapper">
                        <a class="bd-gradient-btn" href="{{ route('video') }}">View all Videos<span><i class="fa-regular fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xxl-4 col-xl-4 col-lg-4">
                <article class="blog__item wow fadeIn" data-wow-delay=".5s">
                    <div class="blog__thumb">
                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/imgs/blog/blog-01.jpg') }}" alt="image not found"></a>
                    </div>
                    <div class="blog__content">
                        <h3 class="blog__title"><a href="blog-details.html">Navigating the Investment Landscape</a></h3>
                        <div class="postbox__meta">
                            <span><a href="#">By : Marilia Valse</a></span>
                            <span>09 Aug 2023</span>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <article class="blog__item wow fadeIn" data-wow-delay=".7s">
                    <div class="blog__thumb">
                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/imgs/blog/blog-02.jpg') }}" alt="image not found"></a>
                    </div>
                    <div class="blog__content">
                        <h3 class="blog__title"><a href="blog-details.html">Expert Perspectives on the Wealth Management</a></h3>
                        <div class="postbox__meta">
                            <span><a href="#">By : Marilia Valse</a></span>
                            <span>09 Aug 2023</span>
                        </div>
                    </div>
                </article>
            </div> --}}
        </div>
    </div>
</section>
<!-- Blog area start -->
@endif
@if ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_URI'] == '/public/')
<!-- Section devider -->
<div class="section__devider ">
    <div class="container">
        <hr>
    </div>
</div>

<!-- FAQ area start -->
<section id="homefaq" class="faq__area section-space p-relative fix">
    <div class="container">
        <div class="row justify-content-center section__title-space">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="faq__content">
                    <div class="section__title-wrapper text-center">
                        <span class="section__subtitle uppercase">Read fAQ</span>
                        <h2 class="section__title">General Questions</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center wow fadeInUp" data-wow-delay=".3s">
            <div class="col-xxl-9 col-xl-9 col-lg-10">
                <div class="fap__style-2">
                    <div class="bd__faq">
                        <div class="accordion" id="accordionExample">
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Q.</span> What makes Fisherman different?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendt urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Q.</span> How does Fisherman make money?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Q.</span> Why should I trust Fisherman?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>Q.</span> How does Fisherman work?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ area end -->
@endif
