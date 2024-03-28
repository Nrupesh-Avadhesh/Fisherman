@extends('backend.layouts.app')
@section('title', ' / Header')
@section('header_title', 'Header')
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
                                            <div class="row justify-content-between">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <h4>Header</h4>
                                                    <hr>
                                                </div>
                                                {{-- <div class="col-12 col-md-1 mt-1">
                                                    <a href="{{ route('superAdmin.blog.blog.add') }}" class="add btn f-right"><button class="add btn btn-primary f-right"><i class="fa fa-plus"></i></button></a>
                                                </div> --}}
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Menu Titel</th>
                                                                    <th>is Sub Menu Name</th>
                                                                    <th>Menu Type</th>
                                                                    <th>Page Name</th>
                                                                    <th>status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($header as $key=>$val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ $key +1 }}</td>
                                                                    <td>@if($val->mainmenu && $val->is_sub_menu == 'true') {{ $val->mainmenu->menu_titel }} @else {{ $val->menu_titel }} @endif</td>
                                                                    <td>@if($val->mainmenu && $val->is_sub_menu == 'true') {{ $val->menu_titel }} @endif</td>
                                                                    <td>@if($val->is_sub_menu == 'false') Main Menu @else Sub Menu @endif</td>
                                                                    <td>{{ $val->page_name }}</td>
                                                                    <td>@if($val->is_show == 'false') Hide @else Show @endif</td>
                                                                    <td><a href="{{ route('superAdmin.setting.header.edit') }}?id={{ $val->id }}" class="btn"><i class="fa fa-edit"></i></a></td>
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
