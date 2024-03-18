@extends('backend.layouts.app')
@section('title', ' / Category')
@section('header_title', 'Category')
@section('sub_page', 'Blog')
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
                                            {!! Form::open(['url' => route('superAdmin.blog.category.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <input type="hidden" name="id" value="{{isset($_GET['id']) ? $_GET['id']: NULL }}">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Category @if(isset($_GET['id']) && $_GET['id'] && $edit_category)edit @else Add @endif</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" name="name" value="{{ old('name', @$edit_category->name) }}" placeholder="Name" class="form-control">
                                                                    @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Status</label>
                                                                        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], old('status', @$edit_category->status), ['class' => 'col-sm-12 form-control']); !!}
                                                                    @error('status')
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
                                                                    <textarea name="description" class="form-control" cols="30" rows="5">{{ old('description', @$edit_category->description) }}</textarea>
                                                                    @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($_GET['id']) && $_GET['id'] && $edit_category)
                                                <button type="submit" class="btn btn-primary">update</button>
                                                <a href="{{ route('superAdmin.whyFisherman.chooseUs') }}" class="btn btn-secondary"><i class="fa fa-repeat"></i></a>
                                                @else
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                @endif
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!isset($_GET['id']) || isset($_GET['id']) && !$_GET['id'] && !$edit_category)
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <h4>Category list</h4>
                                                    <hr>
                                                </div>
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Description</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($category_list as $val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ $val->name }}</td>
                                                                    <td>{{ $val->description }}</td>
                                                                    <td>{{ $val->status }}</td>
                                                                    <td><a href="{{ route('superAdmin.blog.category') }}?id={{ $val->id }}" class="btn"><i class="fa fa-edit"></i></a></td>
                                                                </tr>
                                                                @endforeach
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.table').DataTable({});
    });
</script>
@endsection
