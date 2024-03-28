@extends('frontend.layouts.auth_app')
@section('title', ' / Register')
@section('description', '')
@section('keywords', '')
@section('header_link')
<style>
    .loan__range{
        position: relative;
    }
    .prefix {
        position: absolute;
        /* position: relative; */
        /* right: 215px; */
        color: white;
        top: 0;
        left: 0;
        /* top: 45px; */
        background-color: #98959554;
        padding: 20px 8px 20px 9px;
        /* padding: 22px 8px 22px 9px; */
        border-radius: 5px 0 0 5px;
    }

    input.has-prefix {
    padding-left: 30px;
    /* margin-left: -50px */
    }

    input[type=range] {
        -webkit-appearance: none;
        width: calc(100% - 30px);
    }
    input[type=range]:focus {
        outline: none;
    }
    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        background: #d3d3d3;
        border-radius: 10px;
        border: 0.2px solid #010101;
        /* background: linear-gradient(to right, rgb(4, 170, 109) 0.15%, transparent 0.15%); */
        /* box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d; */
    }
    input[type=range]::-webkit-slider-thumb {
        /* box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d; */
        /* border: 1px solid #000000; */
        height: 15px;
        width: 15px;
        border-radius: 100%;
        border: 3px solid #fff;
        background: #04AA6D;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #d3d3d3;
    }
    input[type=range]::-moz-range-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        background: #d3d3d3;
        border-radius: 10px;
        border: 0.2px solid #010101;
    }
    input[type=range]::-moz-range-thumb {
        height: 15px;
        width: 15px;
        border-radius: 100%;
        border: 3px solid #fff;
        background: #04AA6D;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]::-ms-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        background: #d3d3d3;
        border-radius: 10px;
        border: 0.2px solid #010101;
    }
    input[type=range]::-ms-fill-lower {
    background: #04AA6D;
    border: 0.2px solid #010101;
    border-radius: 2.6px;
    }
    input[type=range]::-ms-fill-upper {
    background: #04AA6D;
    border: 0.2px solid #010101;
    border-radius: 2.6px;
    }
    input[type=range]::-ms-thumb {
        height: 15px;
        width: 15px;
        border-radius: 100%;
        border: 3px solid #fff;
        background: #04AA6D;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]:focus::-ms-fill-lower {
    background: #04AA6D;
    }
    input[type=range]:focus::-ms-fill-upper {
    background: #04AA6D;
    }
</style>
@endsection
@section('content')

    <section class="login__area section-space">
        <div class="container">
            {!! Form::open(['url' => action('App\Http\Controllers\frontend\loginController@store'), 'method' => 'post','files'=>true, 'id' => 'company_add_form', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                <div id="profile">
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">Create Your account</h3>
                            {{-- <p>You can signup with you social account below </p> --}}
                        </div>
                        <div class="login__input mb-25">
                            <input type="text" name="first_name" id="first_name" placeholder="First name">
                            <span class="error text-danger" id="first_name_error" style="display: none;"></span>
                        </div>
                        <div class="login__input mb-25">
                            <input type="text" name="last_name" id="last_name" placeholder="Last name">
                            <span class="error text-danger" id="last_name_error" style="display: none;"></span>
                        </div>
                        <div class="login__input mb-25">
                            <input type="tel" name="mobile_number" id="mobile_number" class="numberonly" placeholder="Mobile Number">
                            <span class="error text-danger" id="mobile_number_error" style="display: none;"></span>
                        </div>
                        <div class="login__input mb-25">
                            <input type="email" name="email" id="email" placeholder="Email Address">
                            <span class="error text-danger" id="email_error" style="display: none;"></span>
                        </div>
                        <div class="login__input mb-25">
                            <input type="password" id="password" name="password" placeholder="Password">
                            <span class="error text-danger" id="password_error" style="display: none;"></span>
                        </div>
                        <div class="login__input mb-25">
                            <input type="password" id="confirm_password" name="confirm_password"
                                placeholder="Confirm Password">
                            <span class="error text-danger" id="confirm_password_error" style="display: none;"></span>
                        </div>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-25 profile" value="next">
                            {{-- <button class="bd-gradient-btn w-100" type="submit">Send Message</button> --}}
                        </div>
                        <div class="log__not-account">
                            <p>Already have an account? <a href="{{ route('login') }}"> Login</a></p>
                        </div>
                    </div>
                </div>
                <div id="policy_agreement" style=" display: none; ">
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">User Agreement </h3>
                        </div>
                        <div class="login__input mb-25" style="height: calc(100vh - 200px);overflow: auto;text-align: left;">
                            Any trading activity that you partake in is your responsibility, not the responsibility of Fishermangroup, the creators of Fishermangroup, or any of the coders involved in the Fishermangroup project.
Fishermangroup is provided to you for educational purposes only. Fishermangroup is not a financial services company, but a software company. Fishermangroup does not accept any liability for loss or damage as a result of reliance on the information contained within this website; this includes education material, price quotes, software, charts, and analysis. Please be aware of the risks associated with trading the financial markets; never invest more money than you can risk losing. The risks involved in trading are high and may not be suitable for all investors. 
Fishermangroup doesn’t retain responsibility for any trading losses you might face as a result of using the software. The data and quotes contained may not be provided by exchanges but rather by market makers. So prices may be different from exchange prices and may not be accurate to real time trading prices. Any examples used are not a recommendation to buy or sell or a solicitation to buy or sell futures, options, bonds, forex CFDs, true Forex pairs, binaries or securities of any kind.
RISKS ASSOCIATED WITH FOREX TRADING
Trading foreign currencies can be a challenging and potentially profitable opportunity for investors. However, before deciding to participate in the Forex market, you should carefully consider your investment objectives, level of experience, and risk appetite. Most importantly, do not invest money you cannot afford to lose.
There is considerable exposure to risk in any foreign exchange transaction. Any transaction involving currencies involves risks including, but not limited to, the potential for changing political and/or economic conditions that may substantially affect the price or liquidity of a currency. Investments in foreign exchange speculation may also be susceptible to sharp rises and falls as the relevant market values fluctuate. The leveraged nature of Forex trading means that any market movement will have an equally proportional effect on your deposited funds. This may work against you as well as for you. Not only may investors get back less than they invested, but in the case of higher risk strategies, investors may lose the entirety of their investment. It is for this reason that when speculating in such markets it is advisable to use only risk capital. Benefits and Risks of Leverage
Leverage allows traders the ability to enter into a position worth many times the account value with a relatively small amount of money. This leverage can work with you as well as against you. Even though the Forex market offers traders the ability to use a high degree of leverage, trading with high leverage may increase the losses suffered. Please use caution when using leverage in trading or investing. Hypothetical Results Disclaimer
THE RESULTS FOUND HEREIN ARE BASED ON SIMULATED OR HYPOTHETICAL PERFORMANCE RESULTS THAT HAVE CERTAIN INHERENT LIMITATIONS. UNLIKE THE RESULTS SHOWN IN AN ACTUAL PERFORMANCE RECORD, THESE RESULTS DO NOT REPRESENT ACTUAL TRADING. ALSO, BECAUSE THESE TRADES HAVE NOT ACTUALLY BEEN EXECUTED, THESE RESULTS MAY HAVE UNDER-OR OVER-COMPENSATED FOR THE IMPACT, IF ANY, OF CERTAIN MARKET FACTORS, SUCH AS LACK OF LIQUIDITY. SIMULATED OR HYPOTHETICAL TRADING PROGRAMS IN GENERAL ARE ALSO SUBJECT TO THE FACT THAT THEY ARE DESIGNED WITH THE BENEFIT OF HINDSIGHT. NO REPRESENTATION IS BEING MADE THAT ANY ACCOUNT WILL OR IS LIKELY TO ACHIEVE PROFITS OR LOSSES SIMILAR TO THESE BEING SHOWN.
The information that may be presented is based on simulated trading using systems and education developed exclusively by Fishermangroup. Simulated results do not represent actual trading. Please note that simulated trading results may or may not have been back-tested for accuracy and that spreads/commissions are not taken into account when preparing hypothetical results.
No representation is being made that any account will or is likely to achieve profits or losses similar to those that may be shown. Past performance is not indicative of future results. Individual results vary and no representation is made that clients will or are likely to achieve profits or incur losses comparable to those that may be shown.
Third Party Links
Links to third-party sites are provided for your convenience. Such sites are not within our control and may not follow the same privacy, security, or accessibility standards as ours. Fishermangroup neither endorses nor guarantees offerings of the third party providers, nor is Fishermangroup responsible for the security, content or availability of third-party sites, their partners or advertisers.
Forex Disclaimer
Before deciding to participate in the Forex market, you should carefully consider your investment objectives, level of experience and risk appetite. Most importantly, do not invest money you cannot afford to lose.
There is considerable exposure to risk in any off-exchange foreign exchange transaction, including, but not limited to, leverage, creditworthiness, limited regulatory protection and market volatility that may substantially affect the price, or liquidity of a currency or currency pair. Moreover, the leveraged nature of Forex trading means that any market movement will have an equally proportional effect on your deposited funds. This may work against you as well as for you. The possibility exists that you could sustain a total loss of initial margin funds and be required to deposit additional funds to maintain your position. If you fail to meet any margin requirement, your position may be liquidated and you will be responsible for any resulting losses.
There are risks associated with utilizing an Internet-based trading system including, but not limited to, the failure of hardware, software, and Internet connection. Any opinions, news, research, analyses, prices, or other information contained on this website are provided as general market commentary, and do not constitute investment advice. Fishermangroup is not liable for any loss or damage, including without limitation, any loss of profit, which may arise directly or indirectly from use of or reliance on such information. Fishermangroup has taken reasonable measures to ensure the accuracy of the information on the website. Our content is subject to change at any time without notice.
While every effort is made to check the accuracy of information contained on this website, Fishermangroup cannot accept responsibility for any errors or omissions. We therefore strongly recommend that readers make their own thorough checks and seek independent financial advice before entering into any kind of transaction.
Contact Us if you have an enquiry or concern about our disclaimer.
                        </div>
                        <div class="login__option mb-20 d-sm-flex justify-content-between">
                            <div class="login__remember">
                                <input type="checkbox" name="i_agree" id="i_agree">
                                <label for="login" class="i_agree_l">I Agree</label>
                            </div>
                            <span class="error text-danger" id="i_agree_error" style="display: none;"></span>
                        </div>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-25 policy_agreement" value="next">
                        </div>
                    </div>
                </div>
                <div id="calculator" style=" display: none; ">
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">Trading Calculator </h3>
                        </div>
                        <section class="loan__area  mb-20" style=" padding: 0; ">
                            <div class="loan__form-wrapper" style=" padding: 0; ">
                                <div class="loan__form">
                                    <div class="loan__input-item">
                                        <div class="loan__input">
                                            <div class="loan__input-title">
                                                <label for="loan-amount">How much Money you Trade?*</label>
                                            </div>
                                            <div class="loan__range">
                                                {{-- <input type="text" id="loan-amount" class="loan-amount" readonly> --}}
                                                {{-- <input type="number" id="loan-amount" class="loan-amount" > --}}
                                                <span class="prefix">$</span>
                                                <input type="number" id="loan-amount" class="loan-amount has-prefix" >
                                                <input type="range" class="form-range slider" id="loan-range-bar-cus" style="height: auto;padding: 2px;position: relative;top: -15px;background: linear-gradient(to right, rgb(4, 170, 109) 0.15%, transparent 0.15%);margin: 0 3px 0 27px;">
                                                {{-- <div class="loan-range-bar"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="payamount" id="payamount">
                                    <input type="hidden" name="fees" id="feesamo">
                                    <div class="loan__input-item">
                                        <div class="loan__input">
                                            <div class="loan__input-title">
                                                <label for="loan-amount">Trading Time Period</label>
                                            </div>
                                            <div class="loan__range">
                                                <input type="text" value="12 Month" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loan__notice">
                                        <div class="loan__notice-content">
                                            <span>Management Fees:</span>
                                            <h3 id="fees">$1350 USD<span></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-25 calculator" value="next">
                        </div>
                    </div>
                </div>
                <div id="choose_account" style=" display: none; ">
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">Choose Account </h3>
                        </div>
                        <div class="login__input mb-25">
                            <div class="form-group" style=" text-align: left; ">
                                <label class="d-flex" style=" align-items: center; ">
                                    <input type="radio" class="h-auto mb-10 w-auto account" style=" margin-right: 10px; " name="account" value="Referral Partner">
                                    <span style="min-height: 95px;display: flex;align-items: center;border: 1px solid;padding: 20px 10px;width: 100%;border-radius: 10px; margin-bottom: 10px; background-image: linear-gradient(to right, rgb(8, 158, 255), rgb(25, 250, 181));color: #fff;">
                                        User Our Referral Partner <br>(Note: Waive Off Your Management Fee 100%)
                                    </span>
                                </label>
                                <label class="d-flex" style=" align-items: center; ">
                                    <input type="radio" class="h-auto mb-10 w-auto account" style=" margin-right: 10px; " name="account" value="Existing Account">
                                    <span style="min-height: 95px;display: flex;align-items: center;border: 1px solid;padding: 20px 10px;width: 100%;border-radius: 10px; margin-top: 5px; margin-bottom: 10px; background-image: linear-gradient(to right, rgb(8, 158, 255), rgb(25, 250, 181));color: #fff;">
                                        Use Existing Forex Account
                                    </span>
                                </label>
                            </div>
                            <span class="error text-danger" id="account_error" style="display: none;"></span>
                        </div>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-25 choose_account" value="next">
                        </div>
                    </div>
                </div>
                <div id="payment" style=" display: none; ">
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">Scan And Pay </h3>
                        </div>
                        <div class="login__intro mb-10">
                            <span class="payment_tit" class="login__intro mb-10" style=" display: inline-block; color: #fff; font-size: 15px; "></span>
                        </div>
                        <div class="login__input mb-25" style=" height: 300px; display: inline-block; ">
                            <img src="{{ asset('uploads/QR/qr3.png') }}" style="/* height: 100%; */width: 100%;border-radius: 5%;">
                        </div>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-75 payment" value="submit screenshot ">
                        </div>
                    </div>
                </div>
                <div id="thankyou" style=" display: none; ">
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">Thank you. </h3>
                        </div>
                        <div class="login__input mb-25">
                            <p> Your order was completed successfully. </p>
                            <p>An email receipt including the details bout your order has been sent to the email address provided. Please keep it for your records</p>
                        </div>
                        <div class="login__input mb-25">
                            <p> Your account successfully successfully.<br>please login and upload payment screenshot your account has been activated</p>
                        </div>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-25 thankyou" value="login">
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            TIME = 1500;
            $(".profile").click(function(e) {
                valed = valed_p();
                if (valed) {
                    e.preventDefault();
                    var data = new FormData($('#company_add_form')[0]);
                    data.append('_token', '{{ csrf_token() }}');
                    data.append('is_val', '1');
                    $.ajax({
                        method: "POST",
                        url: $('#company_add_form')[0]['action'],
                        dataType: "json",
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(result) {
                            if (result.success == true) {
                                $("#profile").slideToggle();
                                $("#policy_agreement").slideToggle();
                            } else {
                                $.each(result.data, function(key, val) {
                                    $("#" + key + "_error").text(val[0]);
                                    $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                                })
                            }
                        },
                        error: function(result) {
                            $.each(result.data, function(key, val) {
                                $("#" + key + "_error").text(val[0]);
                                $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                            })
                        }
                    });
                }
            });
            $(".policy_agreement").click(function() {
                valed = valed_a();
                if (valed) {
                    $("#policy_agreement").slideToggle();
                    $("#calculator").slideToggle();
                }
            });
            $(".calculator").click(function() {
                $("#calculator").slideToggle();
                $("#choose_account").slideToggle();
            });
            var myButton = $(".choose_account");
            $(".choose_account").click(function(e) {
                valed = valed_acc();
                if (valed) {
                    myButton.prop("disabled", true);
                    e.preventDefault();
                    var data = new FormData($('#company_add_form')[0]);
                    data.append('_token', '{{ csrf_token() }}');
                    $.ajax({
                        method: "POST",
                        url: $('#company_add_form')[0]['action'],
                        dataType: "json",
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(result) {
                            if (result.success == true) {
                                $("#choose_account").slideToggle();
                                $("#payment").slideToggle();
                            } else {
                                myButton.prop("disabled", false);
                                $.each(result.data, function(key, val) {
                                    $("#" + key + "_error").text(val[0]);
                                    $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                                })
                            }
                        },
                        error: function(result) {
                            myButton.prop("disabled", false);
                            $.each(result.data, function(key, val) {
                                $("#" + key + "_error").text(val[0]);
                                $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                            })
                        }

                    });
                }
            });
            $(".payment").click(function() {
                $("#payment").slideToggle();
                $("#thankyou").slideToggle();
            });
            $(".thankyou").click(function() {
                // location.reload(true);
                window.location.href = "{{ route('user.profile') }}";
            });

            function valed_p() {
                is_valed = true;
                first_name = first_name_v();
                if (!first_name) {
                    is_valed = first_name;
                }

                last_name = last_name_v();
                if (!last_name) {
                    is_valed = last_name;
                }

                mobile_number = mobile_number_v();
                if (!mobile_number) {
                    is_valed = mobile_number;
                }

                email = email_v();
                if (!email) {
                    is_valed = email;
                }

                password = password_v();
                if (!password) {
                    is_valed = password;
                }

                confirm_password = confirm_password_v();
                if (!confirm_password) {
                    is_valed = confirm_password;
                }

                return is_valed;
            }

            $(document).on("keyup change", '#first_name', function(e) {
                first_name_v();
            })
            $(document).on("keyup change", '#last_name', function(e) {
                last_name_v();
            })
            $(document).on("keyup change", '#mobile_number', function(e) {
                mobile_number_v();
            })
            $(document).on("keyup change", '#email', function(e) {
                email_v();
            })
            $(document).on("keyup change", '#password', function(e) {
                password_v();
            })
            $(document).on("keyup change", '#confirm_password', function(e) {
                confirm_password_v();
            })
            $(document).on("click", '.i_agree_l', function(e) {
                i_agree_v();
            })
            $('.numberonly').keypress(function(e) {
                var charCode = (e.which) ? e.which : event.keyCode
                if (String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;
            });

            function first_name_v() {
                if (!$('#first_name').val()) {
                    is_valed = false;
                    $('#first_name_error').text('the First Name field is required');
                    $('#first_name_error').show('slide', { direction: 'right' }, TIME);
                } else {
                    if ($('#first_name_error').css('display') != 'none') {
                        $('#first_name_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#first_name_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function last_name_v() {
                if (!$('#last_name').val()) {
                    is_valed = false;
                    $('#last_name_error').text('the Last Name field is required');
                    $('#last_name_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#last_name_error').css('display') != 'none') {
                        $('#last_name_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#last_name_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function mobile_number_v() {
                if (!$('#mobile_number').val()) {
                    is_valed = false;
                    $('#mobile_number_error').text('the Mobile Number field is required');
                    $('#mobile_number_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else if ($('#mobile_number').val().length != 10) {
                    is_valed = false;
                    $('#mobile_number_error').text('Please put 10  digit mobile number');
                    $('#mobile_number_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#mobile_number_error').css('display') != 'none') {
                        $('#mobile_number_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#mobile_number_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function email_v() {

                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!$('#email').val()) {
                    is_valed = false;
                    $('#email_error').text('the email field is required');
                    $('#email_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else if (!regex.test($('#email').val())) {
                    is_valed = false;
                    $('#email_error').text('enter valid email address');
                    $('#email_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#email_error').css('display') != 'none') {
                        $('#email_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#email_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function password_v() {

                if (!$('#password').val()) {
                    is_valed = false;
                    $('#password_error').text('the password field is required');
                    $('#password_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else if ($('#password').val().length < 8) {
                    is_valed = false;
                    $('#password_error').text('Please put minimum 8 characters for password');
                    $('#password_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#password_error').css('display') != 'none') {
                        $('#password_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#password_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function confirm_password_v() {

                if (!$('#confirm_password').val()) {
                    is_valed = false;
                    $('#confirm_password_error').text('the Confirm Password field is required');
                    $('#confirm_password_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else if ($('#confirm_password').val().length < 8) {
                    is_valed = false;
                    $('#confirm_password_error').text('Please put minimum 8 characters for Confirm Password');
                    $('#confirm_password_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else if ($('#confirm_password').val() != $('#password').val()) {
                    is_valed = false;
                    $('#confirm_password_error').text('The password and Confirm password do not match.');
                    $('#confirm_password_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#confirm_password_error').css('display') != 'none') {
                        $('#confirm_password_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#confirm_password_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function valed_a() {
                if ($("#i_agree").prop('checked') == true) {
                    if ($('#i_agree_error').css('display') != 'none') {
                        $('#i_agree_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#i_agree_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                } else {
                    is_valed = false;
                    $('#i_agree_error').text('Please check I agree');
                    $('#i_agree_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                }
                return is_valed;
            }

            function i_agree_v() {
                if ($("#i_agree").prop('checked') == true) {
                    $('#i_agree').attr('checked', false);
                    is_valed = false;
                    $('#i_agree_error').text('Please check I agree');
                    $('#i_agree_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    $('#i_agree').attr('checked', true);
                    if ($('#i_agree_error').css('display') != 'none') {
                        $('#i_agree_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#i_agree_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }

            function valed_acc() {
                if ($("input[name='account']:checked").is(":checked")) {
                    if ($('#account_error').css('display') != 'none') {
                        $('#account_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#account_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                } else {
                    is_valed = false;
                    $('#account_error').text('Please select Account');
                    $('#account_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                }
                return is_valed;
            }
        });
    </script>
@endsection
