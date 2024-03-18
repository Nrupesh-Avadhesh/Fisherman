
<!-- Section devider -->
{{-- <div class="section__devider ">
    <div class="container">
        <hr>
    </div>
</div> --}}
@php 
$url = explode('?', $_SERVER['REQUEST_URI']);
@endphp
@if ($url[0] != '/contact')
<!-- Payment area start -->
<section class="payment__area {{-- midnight-blue --}} section-space-top mt-50">
    <div class="container">
        <div class="row gy-50 align-se">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="payment__thumb-wrapper p-relative">
                    <div class="payment__thumb">
                        <img src="{{ asset('frontend/assets/imgs/payment/payment-01.webp') }}" alt="image not found">
                    </div>
                    <div class="payment__notice" data-parallax='{"y": 50, "smoothness": 15}'>
                        <div class="payment__notice-icon">
                            <span>
                      <svg width="21" height="29" viewBox="0 0 21 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M20.9736 3.16211C15.7289 7.34858 1.9449 9.22329 0.611328 14.4219V22.6223C0.611328 24.8421 1.33975 26.6823 3.34572 28.3154C0.790632 19.977 20.2787 21.2767 20.9736 14.1804V3.16211Z" fill="white"/>
                         <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15.712 5.40215L15.6862 0.16748C9.11348 4.76925 1.19014 5.58675 0.611328 14.1969V23.5982C0.611328 24.8641 0.817129 26.0244 1.30591 27.0924C1.20301 16.8736 15.7891 20.9479 15.7377 11.2697L15.712 5.40215Z" fill="white"/>
                         <path fill-rule="evenodd" clip-rule="evenodd" d="M0.778541 25.4312C0.778541 25.4576 0.791404 25.484 0.791404 25.5235L0.778541 25.4312ZM0.765679 25.3126C0.765679 25.3389 0.778541 25.3785 0.778541 25.4049L0.765679 25.3126ZM0.701366 24.9829C0.701366 25.0225 0.714229 25.0489 0.714229 25.0884L0.701366 24.9829ZM0.662778 24.6401C0.662778 24.6797 0.675641 24.706 0.675641 24.7456L0.662778 24.6401ZM0.624191 24.1918C0.624191 24.2313 0.624191 24.2577 0.624191 24.2973V24.1918ZM0.624191 24.0599C0.624191 24.0995 0.624191 24.1259 0.624191 24.1654V24.0599ZM0.611328 23.9545C0.611328 23.994 0.611328 24.0204 0.611328 24.0599V23.9545ZM0.611328 23.8358C0.611328 23.8753 0.611328 23.9017 0.611328 23.9413V23.8358ZM0.611328 14.1971V23.5984C0.611328 23.638 0.611328 23.6776 0.611328 23.7171C0.611328 23.7567 0.611328 23.783 0.611328 23.8226V23.8358V23.849C0.611328 23.8885 0.611328 23.9149 0.611328 23.9545V23.9676C0.611328 24.0072 0.611328 24.0336 0.611328 24.0731C0.611328 24.1127 0.611328 24.139 0.611328 24.1786V24.1918V24.2973C0.611328 24.3764 0.624191 24.4423 0.624191 24.5214V24.5346L0.637053 24.6269C0.637053 24.6665 0.649916 24.6928 0.649916 24.7324V24.7456V24.7588L0.662778 24.8511V24.8643V24.8774C0.662778 24.917 0.675641 24.9434 0.675641 24.9829C0.675641 25.0225 0.688503 25.0489 0.688503 25.0884V25.1016C0.688503 25.1412 0.701366 25.1675 0.701366 25.2071V25.2203C0.701366 25.2598 0.714229 25.2862 0.714229 25.3258V25.3389C0.714229 25.3653 0.727091 25.4049 0.727091 25.4312V25.4444V25.4576C0.727091 25.484 0.739954 25.5103 0.739954 25.5499V25.5631L0.765679 25.6554V25.6686V25.6818C0.778541 25.7081 0.778541 25.7477 0.791404 25.7741V25.7872C0.804267 25.8268 0.804267 25.8532 0.817129 25.8927V25.9059C0.829992 25.9455 0.829992 25.9718 0.842854 26.0114C0.855717 26.0378 0.855717 26.0773 0.868579 26.1037V26.1169C0.881442 26.1433 0.881442 26.1828 0.894304 26.2092V26.2224C0.907167 26.2487 0.907167 26.2883 0.92003 26.3147V26.3279C0.932892 26.3542 0.945755 26.3938 0.945755 26.4202C0.958617 26.4465 0.97148 26.4861 0.984342 26.5125V26.5256C0.997205 26.552 1.01007 26.5916 1.02293 26.6179V26.6311C1.03579 26.6575 1.04866 26.6971 1.06152 26.7234L1.07438 26.7498C1.08724 26.7762 1.10011 26.8025 1.11297 26.8289L1.12583 26.8421L1.16442 26.9212L1.17728 26.9476L1.21587 27.0267L1.22873 27.0531L1.25446 27.119C1.20301 16.8738 15.7891 20.9481 15.7377 11.2699L15.712 5.40234C9.08776 7.92079 1.64033 10.2019 0.611328 14.1971Z" fill="white"/>
                      </svg>                                    
                   </span>
                        </div>
                        <div class="payment__notice-text">
                            <span>Hi! <br>
                      Welcome to Fisherman</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="payment__content">
                    <div class="section__title-wrapper">
                        <h2 class="section__title bd-text-white">Ready to level up your trading profit?</h2>
                    </div>
                    <div class="btn__wrapper">
                        <a class="bd-gradient-btn" href="{{ route('register')}}">sign up now<span><i class="fa-regular fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Payment area end -->
@else
<div class="section__devider ">
    <div class="container">
        <hr>
    </div>
</div>
@endif
<footer>
    <section class="footer__area-common ">
        <div class="container">
            <div class="footer__main">
                <div class="footer__grid">
                    <div class="footer__widget">
                        <div class="footer__logo mb-25">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/imgs/logo/logo-white.png') }}" alt="logo not found">
                            </a>
                        </div>
                        <div class="footer__content">
                            <!--<p>Fisherman Your Trade Manager</p>-->
                            <p>Fisherman is your trusted trade manager, dedicated to empowering traders worldwide. Our mission is to simplify the complexities of trading by providing innovative solutions and expert guidance. </p>
                            {{-- <p>Trading with Fisherman – Your Passport to Success</p> --}}
                            <div class="footer__social">
                                <a href="https://www.facebook.com/thefishermangroup/" aria-label="facebook"><i class="fa-brands fa-facebook"></i></a>
                                <a href="https://twitter.com/fisherman_group" aria-label="twitter"><i class="fa-brands fa-twitter"></i></a>
                                <a href="https://www.instagram.com/fisherman_group/" aria-label="instagraminstagram"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.youtube.com/@FishermanGroup-wq7zp" aria-label="youtube"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <div class="footer__widget-title">
                            <!--<h5>Use Cases</h5>-->
                            <p style="margin-bottom: 30px; font-size: 18px; position: relative; z-index: 10; text-transform: uppercase; color: var(--bd-text-primary); margin-top: 0; line-height: 1.2; font-weight: var(--bd-fw-medium); word-break: break-word; ">Use Cases</p>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="{{ route('home')}}">Home</a></li>
                                <li><a href="{{ route('about')}}">About</a></li>
                                <li><a href="{{ route('why.fisherman')}}">Why Fisherman</a></li>
                                {{-- <li><a href="#">E-Commerce</a></li>
                                <li><a href="#">Agencies</a></li> --}}
                                <!--<li><a href="{{ route('contact') }}">Support</a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <div class="footer__widget-title">
                            <!--<h5>Resources</h5>-->
                            <p style="margin-bottom: 30px; font-size: 18px; position: relative; z-index: 10; text-transform: uppercase; color: var(--bd-text-primary); margin-top: 0; line-height: 1.2; font-weight: var(--bd-fw-medium); word-break: break-word; ">Resources</p>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="{{ route('blog')}}">Blog</a></li>
                                <li><a href="{{ route('video')}}">Video</a></li>
                                <li><a href="{{ route('faq')}}">FAQ</a></li>
                                {{-- <li><a href="#">Loan Type</a></li>
                                <li><a href="#">Calculate</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <div class="footer__widget-title">
                            <!--<h5>Newsletter</h5>-->
                            <p style="margin-bottom: 30px; font-size: 18px; position: relative; z-index: 10; text-transform: uppercase; color: var(--bd-text-primary); margin-top: 0; line-height: 1.2; font-weight: var(--bd-fw-medium); word-break: break-word; ">Newsletter</p>
                        </div>
                        <div class="footer__newsletter">
                            <p>For latest Update subscribe us!</p>
                            <form >
                                <div class="footer__newsletter-from mb-25">
                                    <div class="footer__newsletter-input p-relative">
                                        <input type="text" placeholder="Enter Email">
                                        <button class="footer__round-btn" type="submit"><i class="fa-regular fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="footer__short-info">
                            <div class="info-icon">
                                <span><i class="fa-solid fa-envelope"></i></span>
                            </div>
                            <div class="info-content">
                                <p><a href="mailto:support@fishermangroup.com">support@fishermangroup.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__copyright">
                    <p>Copyright © 2024 <a href="#">Fisherman Group</a></p>
                </div>
                <div class="footer__conditions">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer> 
<!-- Footer area start -->
{{-- midnight-blue --}}
 {{-- <footer class=" p-relative x-clip">
    <div class="footer__glow-4">
        <div class="glow-1"></div>
        <div class="glow-2"></div>
    </div>
    <section class="footer__area">
        <div class="footer__wrapper-5">
            <div class="container">
                <div class="footer__grid">
                    <div class="footer__widget">
                        <div class="footer__logo mb-30">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/imgs/logo/logo-white.png') }}" alt="logo not found">
                            </a>
                        </div>
                        <div class="footer__content">
                            <p>Lorem ipsum dolor sit am oledop consectetur adipiscing elit Ut et massa mi. Aliquam</p>
                            <div class="footer__social">
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <div class="footer__widget-title">
                            <h5>Use Cases</h5>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="#">SaaS</a></li>
                                <li><a href="#">Online Business</a></li>
                                <li><a href="#">Creators</a></li>
                                <li><a href="#">E-Commerce</a></li>
                                <li><a href="#">Agencies</a></li>
                                <li><a href="#">Secure</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <div class="footer__widget-title">
                            <h5>Products</h5>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="#">Invoicing</a></li>
                                <li><a href="#">Office Hours</a></li>
                                <li><a href="#">Explore More</a></li>
                                <li><a href="#">Loan Type</a></li>
                                <li><a href="#">Calculate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <div class="footer__widget-title">
                            <h5>Newsletter</h5>
                        </div>
                        <div class="footer__newsletter">
                            <p>For latest Update subscribe us!</p>
                            <form >
                                <div class="footer__newsletter-from mb-30">
                                    <div class="footer__newsletter-input p-relative">
                                        <input type="text" placeholder="Enter Email">
                                        <button class="footer__round-btn" type="submit"><i class="fa-regular fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="footer__short-info">
                                <div class="info-icon">
                                    <span><i class="fa-solid fa-envelope"></i></span>
                                </div>
                                <div class="info-content">
                                    <p><a href="mailto:support@fishermangroup.com">support@fishermangroup.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer__bottom bt-0">
                <div class="footer__copyright">
                    <p>Copyright © 2024 <a href="#">Fisherman</a></p>
                </div>
                <div class="footer__conditions">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer> --}}
<!-- Footer area end -->

