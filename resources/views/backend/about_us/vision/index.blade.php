@extends('backend.layouts.app')
@section('title', ' / Vision')
@section('header_title', 'Vision')
@section('sub_page', 'About Us')
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
                                            {!! Form::open(['url' => route('superAdmin.about_us.vision.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Vision Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Title</label>
                                                                    <input type="text" name="sub_title" value="{{ old('sub_title', @$vision->sub_title) }}" placeholder="Sub Title" class="form-control">
                                                                    @error('sub_title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Headline</label>
                                                                    <input type="text" name="headline" value="{{ old('headline', @$vision->headline) }}" placeholder="Headline" class="form-control">
                                                                    @error('headline')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea name="description" class="form-control" cols="30" rows="5">{{ old('description', @$vision->description) }}</textarea>
                                                                    @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url</label>
                                                                    <input type="url" name="url" value="{{ old('url', @$vision->url) }}" placeholder="url" class="form-control">
                                                                    @error('url')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name</label>
                                                                    <input type="text" name="button_name" value="{{ old('button_name', @$vision->button_name) }}" placeholder="Button Name" class="form-control">
                                                                    @error('button_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group ">
                                                                    {{-- <label class="form-label">is_show</label> --}}
                                                                    <label class="row"><input type="checkbox" name="is_show" class="mr-2 ml-4" @if(old('is_show', @$vision->is_show) == 'true') checked @endif> Is Show</label>
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
                                                                @if($vision && $vision->image)
                                                                    <img src="{{ asset('uploads/vision_img/') }}/{{ $vision->image }}" alt=""style=" max-height: 230px; max-width: 230px; object-fit: scale-down;">
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file" name="image" class="form-control">
                                                                    @error('image')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : 498 * 491</span>
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
