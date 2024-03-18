@extends('frontend.layouts.auth_app')
@section('title', ' / Demo Call Schedule')
@section('description', '')
@section('keywords', '')
@section('header_link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/material_green.css">
    <style>
        .flatpickr-days{
            border-left: 1px solid rgba(72, 72, 72, 0.2);
            border-right: 1px solid rgba(72, 72, 72, 0.2);
        }
        .span.flatpickr-weekday{
            color: #dddddd;
        }
        .flatpickr-day.today {
            border-color: #fff9f9;
        }
        .flatpickr-day{
            border: 1px solid transparent;
            color: #fffefe;
        }
        .flatpickr-day.disabled, .flatpickr-day.disabled:hover {
            cursor: not-allowed;
            color: rgba(122, 122, 122, 0.5);
        }
        .dayContainer{
            background-color: #0c0d0e;
            color: #f5f5f5;
        }
        .contact__select .list{
            max-height: 200px;
            overflow: auto;
        }
    </style>
@endsection
@section('content')
    <section class="login__area section-space">
        <div class="container">
            {!! Form::open(['url' => action('App\Http\Controllers\frontend\account_detailController@account_detail_store'), 'method' => 'post','files'=>true, 'id' => 'company_add_form', 'class' => 'form-horizontal' ,'enctype' => 'multipart/form-data']) !!}
                    <div class="login__wrapper text-center mx-auto mt-20">
                        <div class="login__intro mb-40">
                            <h3 class="login__title">Account Information</h3>
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
                            <input type="tel" name="mobile_number" id="mobile_number" class="numberonly" size="10" placeholder="Mobile Number">
                            <span class="error text-danger" id="mobile_number_error" style="display: none;"></span>
                        </div>
                        <div class="login__input mb-25">
                            <input type="email" name="email" id="email" placeholder="Email Address">
                            <span class="error text-danger" id="email_error" style="display: none;"></span>
                        </div>

                        <div class="login__submit mb-25">
                            <input type="button" class="bd-gradient-btn w-25 profile" value="next">
                        </div>
                        
                    </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
@section('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script>
        $("#date").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: "today",
            placeholder:"select date",
            "disable": [
                function(date) {
                    block_list = $('#block_list').val().split('||');
                    if(block_list.length == 0){
                        return '';  // disable weekends
                    } else if(block_list.length == 1) {
                        return (date.getDay() === parseInt(block_list[0]));  // disable weekends
                    } else if(block_list.length == 2) {
                        return (date.getDay() === parseInt(block_list[0]) || date.getDay() === parseInt(block_list[1]));  // disable weekends
                    } else if(block_list.length == 3) {
                        return (date.getDay() === parseInt(block_list[0]) || date.getDay() === parseInt(block_list[1]) || date.getDay() === parseInt(block_list[2]));  // disable weekends
                    } else if(block_list.length == 4) {
                        return (date.getDay() === parseInt(block_list[0]) || date.getDay() === parseInt(block_list[1]) || date.getDay() === parseInt(block_list[2]) || date.getDay() === parseInt(block_list[3]));  // disable weekends
                    } else if(block_list.length == 5) {
                        return (date.getDay() === parseInt(block_list[0]) || date.getDay() === parseInt(block_list[1]) || date.getDay() === parseInt(block_list[2]) || date.getDay() === parseInt(block_list[3]) || date.getDay() === parseInt(block_list[4]));  // disable weekends
                    } else if(block_list.length == 6) {
                        return (date.getDay() === parseInt(block_list[0]) || date.getDay() === parseInt(block_list[1]) || date.getDay() === parseInt(block_list[2]) || date.getDay() === parseInt(block_list[3]) || date.getDay() === parseInt(block_list[4]) || date.getDay() === parseInt(block_list[5]));  // disable weekends
                    }  else {
                        return (date.getDay() === parseInt(block_list[0]) || date.getDay() === parseInt(block_list[1]) || date.getDay() === parseInt(block_list[2]) || date.getDay() === parseInt(block_list[3]) || date.getDay() === parseInt(block_list[4]) || date.getDay() === parseInt(block_list[5]) || date.getDay() === parseInt(block_list[6]));  // disable weekends
                    }
                }
            ],
            // "locale": {
            //     "firstDayOfWeek": 1 // set start day of week to Monday
            // }
        });

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
                                $("#investment").slideToggle();
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

            $(".investment").click(function() {
                $("#investment").slideToggle();
                $("#schedule").slideToggle();
            });

            $(".schedule").click(function(e) {
                valed = valed_t();
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
                                $("#schedule").slideToggle();
                                $("#thankyou").slideToggle();
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

            function valed_p() {
                is_valed = true;
                first_name = first_name_v();
                if (first_name == false) {
                    is_valed = first_name;
                }

                last_name = last_name_v();
                if (last_name == false) {
                    is_valed = last_name;
                }

                mobile_number = mobile_number_v();
                if (mobile_number == false) {
                    is_valed = mobile_number;
                }

                email = email_v();
                if (email == false) {
                    is_valed = email;
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
                is_valed = true;
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

            function valed_t() {
                is_valed = true;
                date = date_v();
                if (!date) {
                    is_valed = date;
                }

                time = time_v();
                if (!time) {
                    is_valed = time;
                }

                return is_valed;
            }
            $(document).on("keyup change", '#date', function(e) {
                val = date_v();
                if(val){
                    get_slot();
                    $('#time').html('<option value="">select time slote</option>');
                    $('.contact__select .list').html('<li data-value="" class="option selected focus">select time slote</li>');
                } else {
                    $('#time').html('<option value="">select time slote</option>');
                    $('.contact__select .list').html('<li data-value="" class="option selected focus">select time slote</li>');
                }
            })
            $(document).on("keyup change", '#time', function(e) {
                time_v();
            })
            function date_v(){
                if (!$('#date').val()) {
                    is_valed = false;
                    $('#date_error').text('the date field is required');
                    $('#date_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#date_error').css('display') != 'none') {
                        $('#date_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#date_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }
            function get_slot(){
                ENDPOINT = "{{ route('demo.call.slote') }}",
                date = $('#date').val();
                $.ajax({
                    url: ENDPOINT + "?date=" + date,
                    datatype: "html",
                    type: "get",
                    success: function(result) {
                        html = '<option value="">select time slote</option>';
                        html2 = '<li data-value="" class="option selected focus">select time slote</li>';
                        $.each(result, function (key, val) {
                            html += '<option value="'+val+'">'+val+'</option>';
                            html2 += '<li data-value="'+val+'" class="option">'+val+'</li>';
                        });
                        $('#time').html(html);
                        $('.contact__select .list').html(html2);
                    },
                });
            }
            function time_v(){
                if (!$('#time').find(":selected").val()) {
                    is_valed = false;
                    $('#time_error').text('the time field is required');
                    $('#time_error').show('slide', {
                        direction: 'right'
                    }, TIME);
                } else {
                    if ($('#time_error').css('display') != 'none') {
                        $('#time_error').hide('slide', {
                            direction: 'left'
                        }, TIME);
                        setTimeout(function() {
                            $('#time_error').text('');
                        }, TIME);
                    }
                    is_valed = true;
                }
                return is_valed;
            }
        });
    </script>
@endsection
