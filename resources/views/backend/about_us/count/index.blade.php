@extends('backend.layouts.app')
@section('title', ' / Count')
@section('header_title', 'Count')
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
                                            {!! Form::open(['url' => route('superAdmin.about_us.count.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Count Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Headline</label>
                                                                <input type="text" name="headline" value="{{ old('headline', @$count->headline) }}" placeholder="Headline" class="form-control">
                                                                @error('headline')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Headline</label>
                                                                <input type="text" name="sub_headline" value="{{ old('sub_headline', @$count->sub_headline) }}" placeholder="Sub Headline" class="form-control">
                                                                @error('sub_headline')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Name 1</label>
                                                                <input type="text" name="name_1" value="{{ old('name_1', @$count->name_1) }}" placeholder="Name 1" class="form-control">
                                                                @error('name_1')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Count 1</label>
                                                                <input type="number" step="1" min="0" name="count_1" value="{{ old('count_1', @$count->count_1) }}" placeholder="Count 1" class="form-control">
                                                                @error('count_1')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Name 2</label>
                                                                <input type="text" name="name_2" value="{{ old('name_2', @$count->name_2) }}" placeholder="Name 2" class="form-control">
                                                                @error('name_2')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Count 2</label>
                                                                <input type="number" step="1" min="0" name="count_2" value="{{ old('count_2', @$count->count_2) }}" placeholder="Count 2" class="form-control">
                                                                @error('count_2')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Name 3</label>
                                                                <input type="text" name="name_3" value="{{ old('name_3', @$count->name_3) }}" placeholder="Name 3" class="form-control">
                                                                @error('name_3')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Count 3</label>
                                                                <input type="number" step="1" min="0" name="count_3" value="{{ old('count_3', @$count->count_3) }}" placeholder="Count 3" class="form-control">
                                                                @error('count_3')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Name 4</label>
                                                                <input type="text" name="name_4" value="{{ old('name_4', @$count->name_4) }}" placeholder="Name 4" class="form-control">
                                                                @error('name_4')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Count 4</label>
                                                                <input type="number" step="1" min="0" name="count_4" value="{{ old('count_4', @$count->count_4) }}" placeholder="Count 4" class="form-control">
                                                                @error('count_4')
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
