@extends('backend.layouts.app')
@section('title', ' / Banner')
@section('header_title', 'Banner')
@section('sub_page', 'Home')
@section('header_link')
@endsection
@section('content')

    @include('backend.layouts.breadcrumb')
    {{-- <div class="row">
        <!-- statustic-card start -->
        <div class="col-xl-12 col-md-12">
            <div class="card bg-c-white text-black">
                <div class="card-block table-responsive mb-2">
                    <h4 class="flex-row-reverse justify-content-between m-0 row w-100"> --}}
                        {{-- <button class="add btn f-right cus_form_open_btn" data-href="{{ action('App\Http\Controllers\BH\VendorsController@create') }}"
                            data-bs-toggle="offcanvas" role="button" data-container=".company_add_modal" aria-controls="offcanvasExampleadd">
                            <i class="fa fa-plus"></i>
                        </button> --}}
                        {{-- <a href="{{ route('superAdmin.home.banner.edit') }}" class="add btn f-right"><button class="add btn f-right"><i class="fa fa-edit"></i></button></a>
                    </h4>
                    
                </div>
            </div>
        </div>
    </div> --}}
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
                                            {!! Form::open(['url' => route('superAdmin.home.banner.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Banner Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Title</label>
                                                                    <input type="text" name="sub_title" value="{{ old('sub_title', @$banner->sub_title) }}" placeholder="Sub Title" class="form-control">
                                                                    @error('sub_title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Headline</label>
                                                                    <input type="text" name="headline" value="{{ old('headline', @$banner->headline) }}" placeholder="Headline" class="form-control">
                                                                    @error('headline')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Headline 1</label>
                                                                    <input type="text" name="sub_headline_1" value="{{ old('sub_headline_1', @$banner->sub_headline_1) }}" placeholder="Sub Headline 1" class="form-control">
                                                                    @error('sub_headline_1')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Headline 2</label>
                                                                    <input type="text" name="sub_headline_2" value="{{ old('sub_headline_2', @$banner->sub_headline_2) }}" placeholder="Sub Headline 2" class="form-control">
                                                                    @error('sub_headline_2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Headline 3</label>
                                                                    <input type="text" name="sub_headline_3" value="{{ old('sub_headline_3', @$banner->sub_headline_3) }}" placeholder="Sub Headline 3" class="form-control">
                                                                    @error('sub_headline_3')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Offer Line</label>
                                                                    <input type="text" name="offer_line" value="{{ old('offer_line', @$banner->offer_line) }}" placeholder="Offer Line" class="form-control">
                                                                    @error('offer_line')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Offer Count</label>
                                                                    <input type="number" min="0" step="0.01" name="offer_count" value="{{ old('offer_count', @$banner->offer_count) }}" placeholder="Offer Count" class="form-control">
                                                                    @error('offer_count')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if($banner && $banner->image)
                                                                    <img src="{{ asset('uploads/banner_img/') }}/{{ $banner->image }}" alt=""style=" max-height: 230px; max-width: 230px; object-fit: scale-down;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file" name="image" class="form-control">
                                                                    @error('image')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 361 * 723</span>
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
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            {!! Form::open(['url' => route('superAdmin.home.seo.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <h4>SEO Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Page Title</label>
                                                            <input type="text" name="title" value="{{ old('title', @$seo->title) }}" placeholder="Page Title" class="form-control">
                                                            @error('title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <input type="text" name="description" value="{{ old('description', @$seo->description) }}" placeholder="Description" class="form-control">
                                                            @error('description')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Keywords</label>
                                                            <input type="text" name="keywords" value="{{ old('keywords', @$seo->keywords) }}" placeholder="Keywords" class="form-control">
                                                            @error('keywords')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
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
