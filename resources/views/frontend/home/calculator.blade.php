<div class="section__devider">
    <div class="container">
        <hr>
    </div>
</div>
<section class="loan__area">
    <div class="container">
        <div class="inv__wrapper wow fadeInUp" data-wow-delay=".3s">
            <div class="loan__form-wrapper">
                <div class="loan__from-title">
                    <h3>Investment Calculator</h3>
                </div>
                <div class="loan__form">
                    <form action="#" method="POST">
                        <div class="loan__input-item">
                            <div class="loan__input">
                                <div class="loan__input-title">
                                    <label for="loan-amount">How much Money you investing?*</label>
                                </div>
                                <div class="loan__range">
                                    <span class="prefix">$</span>
                                    <input type="number" id="loan-amount" class="loan-amount has-prefix" >
                                    <div class="loan-range-bar"></div>
                                    <span class="error text-danger" id="loan-amount_error" style="display: none;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="loan__input-item">
                            <div class="loan__input-title">
                                <label>How many Month?*</label>
                            </div>
                            <div class="loan__select">
                                <select>
                                    <option>12 Months</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="loan__notice">
                    <div class="loan__notice-content">
                        <span>Management Fees:</span>
                        <h3 id="fees">$1350 USD<span></span></h3>
                    </div>
                </div>
            </div>
            <div class="loan__thumb-wrapper">
                <div class="loan__thumb">
                    <img src="{{ asset('frontend/assets/imgs/loan/loan-thumb.png')}}" alt="image not found">
                </div>
            </div>
        </div>
    </div>
</section>