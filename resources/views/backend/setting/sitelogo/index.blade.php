@extends('backend.layouts.app')
@section('title', ' / Logo')
@section('header_title', 'Logo')
@section('sub_page', 'Setting')
@section('header_link')
@endsection
@section('content')

    @include('backend.layouts.breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content">
                <div class="tab-pane active" id="personal" role="tabpanel">
                    <div class="card">
                        <div class="card-block">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            {!! Form::open(['url' => route('superAdmin.setting.logo.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                            <input type="hidden" name="id" value="1">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Logo</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                @if($sitelogo && $sitelogo->header_logo)
                                                                    <img src="{{ asset('uploads/logo/') }}/{{ $sitelogo->header_logo }}" style="max-height: 100px;max-width: 230px;object-fit: scale-down;min-width: 100px;min-height: 100px;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Header Logo</label>
                                                                    <input type="file" name="header_logo" class="form-control">
                                                                    @error('header_logo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 1932 * 574</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                @if($sitelogo && $sitelogo->footer_logo)
                                                                    <img src="{{ asset('uploads/logo/') }}/{{ $sitelogo->footer_logo }}" style="max-height: 100px;max-width: 230px;object-fit: scale-down;min-width: 100px;min-height: 100px;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Footer Logo</label>
                                                                    <input type="file" name="footer_logo" class="form-control">
                                                                    @error('footer_logo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 1932 * 574</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                @if($sitelogo && $sitelogo->fav_icon)
                                                                    <img src="{{ asset('uploads/logo/') }}/{{ $sitelogo->fav_icon }}" alt="" style="max-height: 100px;max-width: 230px;object-fit: scale-down;min-width: 100px;min-height: 100px;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Fav Icon</label>
                                                                    <input type="file" name="fav_icon" class="form-control">
                                                                    @error('fav_icon')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 30 * 30</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                @if($sitelogo && $sitelogo->login_logo)
                                                                    <img src="{{ asset('uploads/logo/') }}/{{ $sitelogo->login_logo }}" style="max-height: 100px;max-width: 230px;object-fit: scale-down;min-width: 100px;min-height: 100px;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Login Logo</label>
                                                                    <input type="file" name="login_logo" class="form-control">
                                                                    @error('login_logo')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 200 * 200</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
@endsection
