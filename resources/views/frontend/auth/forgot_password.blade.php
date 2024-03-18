@extends('frontend.layouts.auth_app')
@section('title', ' / Forgot Password')
@section('description', '')
@section('keywords', '')
@section('header_link')
@endsection
@section('content')
    <section class="login__area section-space">
        <div class="container">
            <form method="POST" action="{{ route('forgot.password.attempt') }}">
                @csrf
                <div class="login__wrapper text-center mx-auto mt-20">
                    <div class="login__intro mb-40">
                        <h3 class="login__title">Forgot Password</h3>
                    </div>
                    <div class="login__input mb-25">
                        <input type="email" name="email" placeholder="Email Address">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="login__submit mb-25">
                        <input type="submit" class="bd-gradient-btn w-25 profile" value="submit">
                    </div>
                    <div class="log__not-account">
                        <p>Already have an account? <a href="{{ route('login') }}"> Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $(".profile").click(function() {
                $("#profile").slideToggle();
                $("#investment").slideToggle();
            });

            $(".investment").click(function() {
                $("#investment").slideToggle();
                $("#schedule").slideToggle();
            });

            $(".schedule").click(function() {
                $("#schedule").slideToggle();
                $("#thankyou").slideToggle();
            });
        });
    </script>
@endsection
