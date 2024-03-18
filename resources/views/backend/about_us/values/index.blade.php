@extends('backend.layouts.app')
@section('title', ' / Values')
@section('header_title', 'Values')
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
                                            {!! Form::open(['url' => route('superAdmin.about_us.values.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Values Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Sub Title</label>
                                                                    <input type="text" name="sub_title" value="{{ old('sub_title', @$values->sub_title) }}" placeholder="Sub Title" class="form-control">
                                                                    @error('sub_title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Headline</label>
                                                                    <input type="text" name="headline" value="{{ old('headline', @$values->headline) }}" placeholder="Headline" class="form-control">
                                                                    @error('headline')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">url</label>
                                                                    <input type="url" name="url" value="{{ old('url', @$values->url) }}" placeholder="url" class="form-control">
                                                                    @error('url')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Button Name</label>
                                                                    <input type="text" name="button_name" value="{{ old('button_name', @$values->button_name) }}" placeholder="Button Name" class="form-control">
                                                                    @error('button_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea name="description" class="form-control" cols="30" rows="5">{{ old('description', @$values->description) }}</textarea>
                                                                    @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Icon 1</label>
                                                            <input type="text" name="icon_1" value="{{ old('icon_1', @$values->icon_1) }}" placeholder="Icon 1" class="form-control">
                                                            @error('icon_1')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Title 1</label>
                                                            <input type="text" name="title_1" value="{{ old('title_1', @$values->title_1) }}" placeholder="Title 1" class="form-control">
                                                            @error('title_1')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Detail 1</label>
                                                            <input type="text" name="detail_1" value="{{ old('detail_1', @$values->detail_1) }}" placeholder="Detail 1" class="form-control">
                                                            @error('detail_1')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Icon 2</label>
                                                            <input type="text" name="icon_2" value="{{ old('icon_2', @$values->icon_2) }}" placeholder="Icon 2" class="form-control">
                                                            @error('icon_2')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Title 2</label>
                                                            <input type="text" name="title_2" value="{{ old('title_2', @$values->title_2) }}" placeholder="Title 2" class="form-control">
                                                            @error('title_2')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Detail 2</label>
                                                            <input type="text" name="detail_2" value="{{ old('detail_2', @$values->detail_2) }}" placeholder="Detail 2" class="form-control">
                                                            @error('detail_2')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Icon 3</label>
                                                            <input type="text" name="icon_3" value="{{ old('icon_3', @$values->icon_3) }}" placeholder="Icon 3" class="form-control">
                                                            @error('icon_3')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Title 3</label>
                                                            <input type="text" name="title_3" value="{{ old('title_3', @$values->title_3) }}" placeholder="Title 3" class="form-control">
                                                            @error('title_3')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Detail 3</label>
                                                            <input type="text" name="detail_3" value="{{ old('detail_3', @$values->detail_3) }}" placeholder="Detail 3" class="form-control">
                                                            @error('detail_3')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Icon 4</label>
                                                            <input type="text" name="icon_4" value="{{ old('icon_4', @$values->icon_4) }}" placeholder="Icon 4" class="form-control">
                                                            @error('icon_4')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Title 4</label>
                                                            <input type="text" name="title_4" value="{{ old('title_4', @$values->title_4) }}" placeholder="Title 4" class="form-control">
                                                            @error('title_4')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Detail 4</label>
                                                            <input type="text" name="detail_4" value="{{ old('detail_4', @$values->detail_4) }}" placeholder="Detail 4" class="form-control">
                                                            @error('detail_4')
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
