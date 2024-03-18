@extends('backend.layouts.app')
@section('title', ' / About')
@section('header_title', 'About')
@section('sub_page', 'Home')
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
                                            {!! Form::open(['url' => route('superAdmin.home.about.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>About Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Title</label>
                                                                    <input type="text" name="sub_title" value="{{ old('sub_title', @$about->sub_title) }}" placeholder="Sub Title" class="form-control">
                                                                    @error('sub_title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Headline</label>
                                                                    <input type="text" name="headline" value="{{ old('headline', @$about->headline) }}" placeholder="Headline" class="form-control">
                                                                    @error('headline')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea name="description" class="form-control" cols="30" rows="5">{{ old('description', @$about->description) }}</textarea>
                                                                    {{-- <input type="text" name="description" value="{{ old('description', @$about->description) }}" placeholder="Description" class="form-control"> --}}
                                                                    @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Point 1</label>
                                                                    <input type="text" name="point_1" value="{{ old('point_1', @$about->point_1) }}" placeholder="Point 1" class="form-control">
                                                                    @error('point_1')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Point 2</label>
                                                                    <input type="text" name="point_2" value="{{ old('point_2', @$about->point_2) }}" placeholder="Point 2" class="form-control">
                                                                    @error('point_2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Point 3</label>
                                                                    <input type="text" name="point_3" value="{{ old('point_3', @$about->point_3) }}" placeholder="Point 3" class="form-control">
                                                                    @error('point_3')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Point 4</label>
                                                                    <input type="text" name="point_4" value="{{ old('point_4', @$about->point_4) }}" placeholder="Point 4" class="form-control">
                                                                    @error('point_4')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url</label>
                                                                    <input type="url" name="url" value="{{ old('url', @$about->url) }}" placeholder="url" class="form-control">
                                                                    @error('url')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name</label>
                                                                    <input type="text" name="button_name" value="{{ old('button_name', @$about->button_name) }}" placeholder="Button Name" class="form-control">
                                                                    @error('button_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if($about && $about->image)
                                                                    <img src="{{ asset('uploads/about_img/') }}/{{ $about->image }}" alt=""style=" max-height: 230px; max-width: 230px; object-fit: scale-down;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file" name="image" class="form-control">
                                                                    @error('image')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 518 * 450</span>
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
