<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.login_title', 'KautilyaX') }} @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="">
    <meta name="author" content="#">

    @include('backend.layouts.link')
    @yield('header_link')
</head>
<!-- Menu sidebar static layout -->

<body>
    <!-- Pre-loader start -->
    @include('backend.layouts.loader')
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('backend.layouts.navbar')

            <!-- Sidebar chat start -->

            <!-- Sidebar inner chat start-->
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('backend.layouts.sidebar')
                    <div class="pcoded-content">
                        {{-- <div class="pcoded-inner-content"> --}}
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @yield('content')
                                    </div>
                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.layouts.footer')
    <div class="modal-backdrop fade d-none"></div>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    @include('backend.layouts.script')
    @yield('footer_script')

</body>

</html>
