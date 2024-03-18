@extends('frontend.layouts.app')
@section('title', ' / Profile')
@section('description', '')
@section('keywords', '')
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
            <img src="{{ asset('frontend/assets/imgs/shapes/cercle.png') }}" alt="image not found">
        </div>
        <div class="container">
            <div class="row gy-50 align-items-center justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="breadcrumb__title-wraper">
                        <span class="section__subtitle-7 mb-20">User Profile</span>
                        <h2 class="breadcrumb__title">The <span class="gradient-text-3">technology</span> of tomorrow.</h2>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="breadcrumb__description">
                        <!--<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit.</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- Policy privacy area start -->
    <section class="Policy-privacy__area section-space ">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="tabs__nav-boxed bd-sticky-top">
                        <ul class="nav tabs__nav-boxed-inner" role="tablist">
                           
                            <li role="presentation">
                                <button class="active" data-bs-toggle="tab" data-bs-target="#tab__privacy-policy" type="button" role="tab" aria-selected="true">
                                    <span class="policy__tab-content">
                             <span>user Profile</span>
                                    <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                    </span>
                                </button>
                            </li>
                            <li role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#tab__payment" type="button" role="tab" aria-selected="false">
                                    <span class="policy__tab-content">
                                    <span>payment screenshot</span>
                                        <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                    </span>
                                </button>
                            </li>
                            <li role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#tab__terms-conditions" type="button" role="tab" aria-selected="false">
                                    <span class="policy__tab-content">
                             <span>change password</span>
                                    <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                    </span>
                                </button>
                            </li>
                            <li role="presentation">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    {{-- <a class="policy__tab-content" href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="feather icon-log-out"></i> Logout <span><i class="fa-regular fa-arrow-right-long"></i></span></a> --}}
                                    <button onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span class="policy__tab-content">
                                        <span>Log Out</span>
                                            <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </span>
                                    </button>
                                </form>
                                {{-- <button data-bs-toggle="tab" data-bs-target="#cookies" type="button" role="tab" aria-selected="false">
                                    <span class="policy__tab-content">
                             <span>Log Out</span>
                                    <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                    </span>
                                </button> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane fade " id="tab__payment" role="tabpanel">
                            {!! Form::open(['url' => action('App\Http\Controllers\frontend\loginController@paymentstore'), 'method' => 'post','files'=>true, 'id' => 'company_payment_form', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                                <div class="terms__conditions-content">
                                    <div class="login__wrapper text-center mx-auto">
                                        <div class="alert alert-success success_i" style="display: none;" role="alert"></div>
                                        <div class="alert alert-danger danger_i" style="display: none; " role="alert"></div>
                                        <div class="login__input mb-25" style="max-height: 200px; display: inline-block; ">
                                            @if($user && $user->pay_ss)
                                                <img src="{{ asset('uploads/payment_img') }}/{{ $user->pay_ss }}" alt="image not found" style="display: inline-block; height: 200px; ">
                                            @endif
                                        </div>
                                        <div class="login__input mb-25">
                                            <input type="file" name="image" id="image" style="padding: 13px 10px;width: 100%;">
                                            <span class="error text-danger" id="image_error" style="display: none;"></span>
                                        </div>
                
                                        <div class="login__submit mb-25">
                                            <input type="button" class="bd-gradient-btn w-25 paymentss" value="save">
                                            {{-- <button class="bd-gradient-btn w-100" type="submit">Send Message</button> --}}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade show active" id="tab__privacy-policy" role="tabpanel">
                            {!! Form::open(['url' => action('App\Http\Controllers\frontend\loginController@profilestore'), 'method' => 'post','files'=>true, 'id' => 'company_add_form', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                                <div class="terms__conditions-content">
                                    <div class="login__wrapper text-center mx-auto">
                                        <div class="alert alert-success success_d" style="display: none;" role="alert"></div>
                                        <div class="alert alert-danger danger_d" style="display: none; " role="alert"></div>
                                        <div class="login__input mb-25">
                                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="First name">
                                            <span class="error text-danger" id="first_name_error" style="display: none;"></span>
                                        </div>
                                        <div class="login__input mb-25">
                                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" placeholder="Last name">
                                            <span class="error text-danger" id="last_name_error" style="display: none;"></span>
                                        </div>
                                        <div class="login__input mb-25">
                                            <input type="tel" name="mobile_number" id="mobile_number" value="{{ $user->mobile_number }}" class="numberonly" placeholder="Mobile Number">
                                            <span class="error text-danger" id="mobile_number_error" style="display: none;"></span>
                                        </div>
                                        <div class="login__input mb-25">
                                            <input type="email"  value="{{ $user->email }}" readonly placeholder="Email Address">
                                            <span class="error text-danger" id="email_error" style="display: none;"></span>
                                        </div>
                
                                        <div class="login__submit mb-25">
                                            <input type="button" class="bd-gradient-btn w-25 profile" value="save">
                                            {{-- <button class="bd-gradient-btn w-100" type="submit">Send Message</button> --}}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade" id="tab__terms-conditions" role="tabpanel">
                            {!! Form::open(['url' => action('App\Http\Controllers\frontend\loginController@passwordstore'), 'method' => 'post','files'=>true, 'id' => 'company_password_form', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                                <div class="terms__conditions-content">
                                    <div class="login__wrapper text-center mx-auto">
                                        <div class="alert alert-success success_p" style="display: none;" role="alert"></div>
                                        <div class="alert alert-danger danger_p" style="display: none; " role="alert"></div>
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
                                            <input type="button" class="bd-gradient-btn w-25 password_s" value="save">
                                            {{-- <button class="bd-gradient-btn w-100" type="submit">Send Message</button> --}}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade" id="cookies" role="tabpanel">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Policy privacy area end -->
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
                $.ajax({
                    method: "POST",
                    url: $('#company_add_form')[0]['action'],
                    dataType: "json",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        if (result.success == true) {
                            $('.success_d').text(result.msg);
                            $('.success_d').show('slide', { direction: 'right' }, TIME);
                            $('.danger_d').hide('slide', { direction: 'left' }, TIME); 
                            setTimeout(function() { 
                                $('.success_d').text(''); 
                                $('.success_d').hide('slide', { direction: 'left' }, TIME);
                                location.reload(true); 
                            }, TIME);
                        } else {
                            $('.danger_d').show('slide', { direction: 'right' }, TIME);
                            $('.danger_d').text(result.msg);
                            $('.success_d').hide('slide', { direction: 'left' }, TIME); 
                            setTimeout(function() { 
                                $('.danger_d').text(''); 
                                $('.danger_d').hide('slide', { direction: 'left' }, TIME); 
                            }, TIME);
                            $.each(result.data, function(key, val) {
                                $("#" + key + "_error").text(val[0]);
                                $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                            })
                        }
                    },
                    error: function(result) {
                            $('.danger_d').show('slide', { direction: 'right' }, TIME);
                            $('.danger_d').text(result.msg);
                            $('.success_d').hide('slide', { direction: 'left' }, TIME); 
                            setTimeout(function() { 
                                $('.danger_d').text(''); 
                                $('.danger_d').hide('slide', { direction: 'left' }, TIME); 
                            }, TIME);
                        $.each(result.data, function(key, val) {
                            $("#" + key + "_error").text(val[0]);
                            $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                        })
                    }
                });
            }
        });
        $(".password_s").click(function(e) {
            valed = valed_pas();
            if (valed) {
                e.preventDefault();
                var data = new FormData($('#company_password_form')[0]);
                data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    method: "POST",
                    url: $('#company_password_form')[0]['action'],
                    dataType: "json",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        if (result.success == true) {
                            $('.success_p').text(result.msg);
                            $('.success_p').show('slide', { direction: 'right' }, TIME);
                            $('.danger_p').hide('slide', { direction: 'left' }, TIME); 
                            setTimeout(function() { 
                                $('.success_p').hide('slide', { direction: 'left' }, TIME);
                                $('.success_p').text(''); 
                                location.reload(true); 
                            }, TIME);
                        } else {
                            $('.danger_p').text(result.msg);
                            $('.danger_p').show('slide', { direction: 'right' }, TIME);
                            $('.success_p').hide('slide', { direction: 'left' }, TIME); 
                            setTimeout(function() { 
                                $('.danger_p').hide('slide', { direction: 'left' }, TIME); 
                                $('.danger_p').text(''); 
                            }, TIME);
                            $.each(result.data, function(key, val) {
                                $("#" + key + "_error").text(val[0]);
                                $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                            })
                        }
                    },
                    error: function(result) {
                        $('.danger_p').text(result.msg);
                        $('.danger_p').show('slide', { direction: 'right' }, TIME);
                        $('.success_p').hide('slide', { direction: 'left' }, TIME); 
                        setTimeout(function() { 
                            $('.danger_i').hide('slide', { direction: 'left' }, TIME); 
                            $('.danger_i').text(''); 
                        }, TIME);
                        $.each(result.data, function(key, val) {
                            $("#" + key + "_error").text(val[0]);
                            $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                        })
                    }
                });
            }
        });
        $(".paymentss").click(function(e) {
            e.preventDefault();
            var data = new FormData($('#company_payment_form')[0]);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: "POST",
                url: $('#company_payment_form')[0]['action'],
                dataType: "json",
                data: data,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result.success == true) {
                        $('.success_i').text(result.msg);
                        $('.success_i').show('slide', { direction: 'right' }, TIME);
                        $('.danger_i').hide('slide', { direction: 'left' }, TIME); 
                        setTimeout(function() { 
                            $('.success_i').hide('slide', { direction: 'left' }, TIME);
                            $('.success_i').text(''); 
                            location.reload(true); 
                        }, TIME);
                    } else {
                        $('.danger_i').text(result.msg);
                        $('.danger_i').show('slide', { direction: 'right' }, TIME);
                        $('.success_i').hide('slide', { direction: 'left' }, TIME); 
                        setTimeout(function() { 
                            $('.danger_i').hide('slide', { direction: 'left' }, TIME); 
                            $('.danger_i').text(''); 
                        }, TIME);
                        $.each(result.data, function(key, val) {
                            $("#" + key + "_error").text(val[0]);
                            $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                        })
                    }
                },
                error: function(result) {
                    $('.danger_i').text(result.msg);
                    $('.danger_i').show('slide', { direction: 'right' }, TIME);
                    $('.success_i').hide('slide', { direction: 'left' }, TIME); 
                    setTimeout(function() { 
                        $('.danger_i').hide('slide', { direction: 'left' }, TIME); 
                        $('.danger_i').text(''); 
                    }, TIME);
                    $.each(result.data, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                        $("#" + key + "_error").show('slide', { direction: 'right' }, TIME);
                    })
                }
            });
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

            // email = email_v();
            // if (!email) {
            //     is_valed = email;
            // }

            return is_valed;
        }

        function valed_pas() {
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



    });
</script>
@endsection