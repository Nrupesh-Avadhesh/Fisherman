@extends('frontend.layouts.auth_app')
@section('title', ' / Log in')
@section('description', '')
@section('keywords', '')
@section('header_link')
@endsection
@section('content')
   
<section class="login__area section-space">
    <div class="container">
        <div class="login__wrapper text-center mx-auto mt-20">
            <div class="login__intro mb-40">
                <h3 class="login__title">Welcome Again</h3>
                <p>Enter your credentials to acces your account</p>
            </div>
            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <div class="login__input mb-25">
                    <input type="email" name="email" placeholder="Email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="login__input mb-25">
                    <input type="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="login__option mb-20 d-sm-flex justify-content-between">
                    <div class="login__remember">
                        <input type="checkbox" name="remember" id="login">
                        <label for="login">Remember me</label>
                    </div>
                    <div class="login__forgot">
                        <a href="{{ route('forgot.password') }}">Forgot password?</a>
                    </div>
                </div>
                <div class="login__submit mb-25">
                    <input type="submit" class="bd-gradient-btn w-100" value="login">
                    {{-- <button class="bd-gradient-btn w-100" type="submit">Send Message</button> --}}
                </div>
                
                <div class="log__not-account">
                    <p>Don’t have an account? <a href="{{ route('register')}}"> Register Now</a></p>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
@section('footer_script')

@endsection