<div class="row align-items-end m-b-40">
    <div class="col-md-6">
        <div class="page-header-title">
            <div class="d-inline">
                <h4>@yield('header_title')</h4>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('superAdmin.dashboard') }}"> <i class="feather icon-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#!">@yield('sub_page')</a></li>
                <li class="breadcrumb-item"><a href="#!">@yield('header_title')</a></li>
            </ul>
        </div>
    </div>
</div>
