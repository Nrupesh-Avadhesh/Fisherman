@extends('backend.layouts.auth_app')
@section('title', ' / Login')
@section('header_link')
@endsection
@section('content')
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" method="POST" action="{{ route('admin.login.attempt') }}">
                        @csrf
                        <div class="text-center"></div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <span class="logo"><img src="{{ asset('uploads/logo') }}/{{ header_logo('login_logo') }}"></span>
                                        <h3 class="text-center title-stationery">FISHERMAN<span></span></h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control @error('email') border-danger @enderror" placeholder="Enter Your User Name">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control  @error('password') border-danger @enderror" placeholder="Enter Your Password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" name="remember">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30 m-b-15">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-15">Sign in</button>
                                        {{-- <div class="forgot-phone text-center ">Don't have an account?&nbsp;&nbsp;<a href="#" class="text-center f-w-600">Register</a></div> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="forgot-phone text-right">
                                            {{-- Developed by<a href="#" class="text-center f-w-600">
                                                <img src="{{ asset('assets/images/Logo.png') }}">
                                            </a> --}}
                                            <a href="https://reeva.digital/" target="_blank">Developed and Digital partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_script')
@endsection
