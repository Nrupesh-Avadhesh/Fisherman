<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            @php $dashboard = ['/superAdmin/dashboard']; @endphp
            <li class="@if (in_array($_SERVER['REQUEST_URI'], $dashboard)) active @endif">
                <a href="{{ route('superAdmin.dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            @php $user = ['/superAdmin/user/client']; @endphp
            <li class="@if (in_array($_SERVER['REQUEST_URI'], $user)) active @endif">
                <a href="{{ route('superAdmin.user.client') }}">
                    <span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
                    <span class="pcoded-mtext">Client</span>
                </a>
            </li>
            @php $call = ['/superAdmin/call/demo']; @endphp
            <li class="@if (in_array($_SERVER['REQUEST_URI'], $call)) active @endif">
                <a href="{{ route('superAdmin.call.demo') }}">
                    <span class="pcoded-micon"><i class="fa fa-phone"></i></span>
                    <span class="pcoded-mtext">Demo Call</span>
                </a>
            </li>
            @php $time = ['/superAdmin/time/available']; @endphp
            <li class="@if (in_array($_SERVER['REQUEST_URI'], $time)) active @endif">
                <a href="{{ route('superAdmin.time.available') }}">
                    <span class="pcoded-micon"><i class="fa fa-clock-o"></i></span>
                    <span class="pcoded-mtext">Time Available</span>
                </a>
            </li>
            @php $home = ['/superAdmin/home/banner', '/superAdmin/home/about', '/superAdmin/home/robo', '/superAdmin/home/service', '/superAdmin/home/secure_trading']; @endphp
            <li class="pcoded-hasmenu @if(in_array($_SERVER['REQUEST_URI'], $home))active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-home"></i></span>
                    <span class="pcoded-mtext">Home</span>
                </a>
                <ul class="pcoded-submenu @if(in_array($_SERVER['REQUEST_URI'], $home))active @endif">
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/home/banner') active @endif">
                        <a href="{{ route('superAdmin.home.banner') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/home/about') active @endif">
                        <a href="{{ route('superAdmin.home.about') }}">
                            <span class="pcoded-mtext">About</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/home/robo') active @endif">
                        <a href="{{ route('superAdmin.home.robo') }}">
                            <span class="pcoded-mtext">Robo</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/home/service') active @endif">
                        <a href="{{ route('superAdmin.home.service') }}">
                            <span class="pcoded-mtext">Service</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/home/secure_trading') active @endif">
                        <a href="{{ route('superAdmin.home.secure_trading') }}">
                            <span class="pcoded-mtext">Secure Trading</span>
                        </a>
                    </li>
                </ul>
            </li>
            @php $aboutUs = ['/superAdmin/aboutUs/banner', '/superAdmin/aboutUs/vision', '/superAdmin/aboutUs/mission', '/superAdmin/aboutUs/count', '/superAdmin/aboutUs/values', '/superAdmin/aboutUs/finance']; @endphp
            <li class="pcoded-hasmenu @if(in_array($_SERVER['REQUEST_URI'], $aboutUs))active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                    <span class="pcoded-mtext">About Us</span>
                </a>
                <ul class="pcoded-submenu @if(in_array($_SERVER['REQUEST_URI'], $aboutUs))active @endif">
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/aboutUs/banner') active @endif">
                        <a href="{{ route('superAdmin.about_us.banner') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/aboutUs/vision') active @endif">
                        <a href="{{ route('superAdmin.about_us.vision') }}">
                            <span class="pcoded-mtext">Vision</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/aboutUs/mission') active @endif">
                        <a href="{{ route('superAdmin.about_us.mission') }}">
                            <span class="pcoded-mtext">Mission</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/aboutUs/count') active @endif">
                        <a href="{{ route('superAdmin.about_us.count') }}">
                            <span class="pcoded-mtext">Count</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/aboutUs/values') active @endif">
                        <a href="{{ route('superAdmin.about_us.values') }}">
                            <span class="pcoded-mtext">Values</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/aboutUs/finance') active @endif">
                        <a href="{{ route('superAdmin.about_us.finance') }}">
                            <span class="pcoded-mtext">Finance</span>
                        </a>
                    </li>
                </ul>
            </li>
            @php $whyFisherman = ['/superAdmin/why-fisherman/banner', '/superAdmin/why-fisherman/choose-Us', '/superAdmin/why-fisherman/service', '/superAdmin/why-fisherman/key_features', '/superAdmin/why-fisherman/static']; @endphp
            <li class="pcoded-hasmenu @if(in_array($_SERVER['REQUEST_URI'], $whyFisherman))active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-info"></i></span>
                    <span class="pcoded-mtext">why Fisherman</span>
                </a>
                <ul class="pcoded-submenu @if(in_array($_SERVER['REQUEST_URI'], $whyFisherman))active @endif">
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/why-fisherman/banner') active @endif">
                        <a href="{{ route('superAdmin.whyFisherman.banner') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/why-fisherman/choose-Us') active @endif">
                        <a href="{{ route('superAdmin.whyFisherman.chooseUs') }}">
                            <span class="pcoded-mtext">Choose Us</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/why-fisherman/service') active @endif">
                        <a href="{{ route('superAdmin.whyFisherman.service') }}">
                            <span class="pcoded-mtext">Service</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/why-fisherman/key_features') active @endif">
                        <a href="{{ route('superAdmin.whyFisherman.key_features') }}">
                            <span class="pcoded-mtext">Key Features</span>
                        </a>
                    </li>
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/why-fisherman/static') active @endif">
                        <a href="{{ route('superAdmin.whyFisherman.static') }}">
                            <span class="pcoded-mtext">Static</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            @php $blog = ['/superAdmin/blog/banner', '/superAdmin/blog/category', '/superAdmin/blog/blog-list', '/superAdmin/blog/blog-crate', '/superAdmin/blog/blog-edit']; @endphp
            <li class="pcoded-hasmenu @if(in_array($_SERVER['REQUEST_URI'], $blog))active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-book"></i></span>
                    <span class="pcoded-mtext">Blog</span>
                </a>
                <ul class="pcoded-submenu @if(in_array($_SERVER['REQUEST_URI'], $blog))active @endif">
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/blog/banner') active @endif">
                        <a href="{{ route('superAdmin.blog.banner') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>                    
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/blog/category') active @endif">
                        <a href="{{ route('superAdmin.blog.category') }}">
                            <span class="pcoded-mtext">Category</span>
                        </a>
                    </li>                    
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/blog/blog-list' || $_SERVER['REQUEST_URI'] == '/superAdmin/blog/blog-crate' || $_SERVER['REQUEST_URI'] == '/superAdmin/blog/blog-edit') active @endif">
                        <a href="{{ route('superAdmin.blog.blog') }}">
                            <span class="pcoded-mtext">Blog list</span>
                        </a>
                    </li>                    
                </ul>
            </li>
            @php $video = ['/superAdmin/video/banner', '/superAdmin/video/video-list']; @endphp
            <li class="pcoded-hasmenu @if(in_array($_SERVER['REQUEST_URI'], $video))active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-video-camera"></i></span>
                    <span class="pcoded-mtext">Video</span>
                </a>
                <ul class="pcoded-submenu @if(in_array($_SERVER['REQUEST_URI'], $video))active @endif">
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/video/banner') active @endif">
                        <a href="{{ route('superAdmin.video.banner') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>                     
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/video/video-list') active @endif">
                        <a href="{{ route('superAdmin.video.list') }}">
                            <span class="pcoded-mtext">Video list</span>
                        </a>
                    </li>                     
                </ul>
            </li>
            @php $faq = ['/superAdmin/faq', '/superAdmin/faq/banner']; @endphp
            <li class="pcoded-hasmenu @if(in_array($_SERVER['REQUEST_URI'], $faq))active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="fa fa-question"></i></span>
                    <span class="pcoded-mtext">FAQ</span>
                </a>
                <ul class="pcoded-submenu @if(in_array($_SERVER['REQUEST_URI'], $faq))active @endif">
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/faq/banner') active @endif">
                        <a href="{{ route('superAdmin.faq.banner') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>                     
                    <li class="@if ($_SERVER['REQUEST_URI'] == '/superAdmin/faq') active @endif">
                        <a href="{{ route('superAdmin.faq.list') }}">
                            <span class="pcoded-mtext">FAQ list</span>
                        </a>
                    </li>                     
                </ul>
            </li>
             {{--<li class="@if ($_SERVER['REQUEST_URI'] == '/proforma') active @endif">
                <a href="{{ url('/proforma') }}">
                    <span class="pcoded-micon"><i class="fa fa-paste"></i></span>
                    <span class="pcoded-mtext">Proforma</span>
                </a>
            </li>
            <li class="@if ($_SERVER['REQUEST_URI'] == '/DemageStock') active @endif">
                <a href="#">
                    <span class="pcoded-micon"><i class="fa fa-truck"></i></span>
                    <span class="pcoded-mtext">Demage Stock</span>
                </a>
            </li> --}}
{{-- @if ($_SERVER['REQUEST_URI'] == '/admin/profile') active @endif --}}
            <li class="mobile-profile ">
                <a href="#">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">Profile</span>
                </a>
            </li>
            <li class="mobile-profile">
                <form method="POST" action="{{ route('superAdmin.logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                        <span class="pcoded-mtext">Logout</span>
                    </a>
                </form>
            </li>
        </ul>

    </div>
</nav>
