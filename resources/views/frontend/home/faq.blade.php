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
                            @foreach($faq as $key=>$val)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        @if($key == 0)
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                        @else    
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                        @endif
                                            <span>Q.</span> {{ $val->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $val->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>