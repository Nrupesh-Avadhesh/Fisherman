@extends('backend.layouts.app')
@section('title', ' / Service')
@section('header_title', 'Service')
@section('sub_page', 'Why Fisherman')
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
                                            {!! Form::open(['url' => route('superAdmin.whyFisherman.service.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Service Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Title</label>
                                                                    <input type="text" name="sub_title" value="{{ old('sub_title', @$service->sub_title) }}" placeholder="Sub Title" class="form-control">
                                                                    @error('sub_title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Headline</label>
                                                                    <input type="text" name="headline" value="{{ old('headline', @$service->headline) }}" placeholder="Headline" class="form-control">
                                                                    @error('headline')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url</label>
                                                                    <input type="url" name="url" value="{{ old('url', @$service->url) }}" placeholder="url" class="form-control">
                                                                    @error('url')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name</label>
                                                                    <input type="text" name="button_name" value="{{ old('button_name', @$service->button_name) }}" placeholder="Button Name" class="form-control">
                                                                    @error('button_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">icon 1</label>
                                                                    <input type="text" name="icon_1" value="{{ old('icon_1', @$service->icon_1) }}" placeholder="icon 1" class="form-control">
                                                                    @error('icon_1')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Title 1</label>
                                                                    <input type="text" name="title_1" value="{{ old('title_1', @$service->title_1) }}" placeholder="Title 1" class="form-control">
                                                                    @error('title_1')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url 1</label>
                                                                    <input type="url" name="url_1" value="{{ old('url_1', @$service->url_1) }}" placeholder="url 1" class="form-control">
                                                                    @error('url_1')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name 1</label>
                                                                    <input type="text" name="button_name_1" value="{{ old('button_name_1', @$service->button_name_1) }}" placeholder="Button Name 1" class="form-control">
                                                                    @error('button_name_1')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Detail 1</label>
                                                                <textarea name="detail_1" class="form-control" cols="30" rows="5">{{ old('detail_1', @$service->detail_1) }}</textarea>
                                                                @error('detail_1')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">icon 2</label>
                                                                    <input type="text" name="icon_2" value="{{ old('icon_2', @$service->icon_2) }}" placeholder="icon 2" class="form-control">
                                                                    @error('icon_2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Title 2</label>
                                                                    <input type="text" name="title_2" value="{{ old('title_2', @$service->title_2) }}" placeholder="Title 2" class="form-control">
                                                                    @error('title_2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url 2</label>
                                                                    <input type="url" name="url_2" value="{{ old('url_2', @$service->url_2) }}" placeholder="url 2" class="form-control">
                                                                    @error('url_2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name 2</label>
                                                                    <input type="text" name="button_name_2" value="{{ old('button_name_2', @$service->button_name_2) }}" placeholder="Button Name 2" class="form-control">
                                                                    @error('button_name_2')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Detail 2</label>
                                                                <textarea name="detail_2" class="form-control" cols="30" rows="5">{{ old('detail_2', @$service->detail_2) }}</textarea>
                                                                @error('detail_2')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">icon 3</label>
                                                                    <input type="text" name="icon_3" value="{{ old('icon_3', @$service->icon_3) }}" placeholder="icon 3" class="form-control">
                                                                    @error('icon_3')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Title 3</label>
                                                                    <input type="text" name="title_3" value="{{ old('title_3', @$service->title_3) }}" placeholder="Title 3" class="form-control">
                                                                    @error('title_3')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url 3</label>
                                                                    <input type="url" name="url_3" value="{{ old('url_3', @$service->url_3) }}" placeholder="url 3" class="form-control">
                                                                    @error('url_3')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name 3</label>
                                                                    <input type="text" name="button_name_3" value="{{ old('button_name_3', @$service->button_name_3) }}" placeholder="Button Name 3" class="form-control">
                                                                    @error('button_name_3')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Detail 3</label>
                                                                <textarea name="detail_3" class="form-control" cols="30" rows="5">{{ old('detail_3', @$service->detail_3) }}</textarea>
                                                                @error('detail_3')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
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
