@extends('backend.layouts.app')
@section('title', ' / Blog List')
@section('header_title', 'Blog List')
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
                                            <div class="row justify-content-between">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <h4>Blog List</h4>
                                                    <hr>
                                                </div>
                                                <div class="col-12 col-md-1 mt-1">
                                                    <a href="{{ route('superAdmin.blog.blog.add') }}" class="add btn f-right"><button class="add btn btn-primary f-right"><i class="fa fa-plus"></i></button></a>
                                                </div>
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Category</th>
                                                                    <th>Author</th>
                                                                    <th>Title</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($blog as $key=>$val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ $key +1 }}</td>
                                                                    <td>{{ $val->category->name }}</td>
                                                                    <td>{{ $val->author_name }}</td>
                                                                    <td>{{ $val->title }}</td>
                                                                    <td>{{ date('Y-m-d', strtotime($val->date)) }}</td>
                                                                    <td>{{ $val->status }}</td>
                                                                    <td><a href="{{ route('superAdmin.blog.blog.edit') }}?id={{ $val->id }}" class="btn"><i class="fa fa-edit"></i></a></td>
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
