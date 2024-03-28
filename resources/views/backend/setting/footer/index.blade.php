@extends('backend.layouts.app')
@section('title', ' / Footer')
@section('header_title', 'Footer')
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
                                @if(!isset($_GET['id']) || (isset($_GET['id']) && !$_GET['id'] && !$edit_social_media))
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            {!! Form::open(['url' => route('superAdmin.setting.footer.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Footer Data</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" name="email" value="{{ old('email', @$footer->email) }}" placeholder="Email" class="form-control">
                                                                    @error('email')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">CopyRight</label>
                                                                    <input type="text" name="copyright" value="{{ old('copyright', @$footer->copyright) }}" placeholder="CopyRight" class="form-control">
                                                                    @error('copyright')
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
                                                                    <label class="form-label">About</label>
                                                                    <textarea name="about" class="form-control" cols="30" rows="5">{{ old('about', @$footer->about) }}</textarea>
                                                                    @error('about')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
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
                                @endif
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            {!! Form::open(['url' => route('superAdmin.setting.social.media.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <input type="hidden" name="id" value="{{isset($_GET['id']) ? $_GET['id']: NULL }}">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Social Media @if(isset($_GET['id']) && $_GET['id'] && $edit_social_media)edit @else Add @endif</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Icon</label>
                                                            <input type="text" name="icon" value="{{ old('icon', @$edit_social_media->icon) }}" placeholder="Icon html" class="form-control">
                                                            @error('icon')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <span id="emailHelp" class="form-text  text-danger">* Note : Use icon from https://fontawesome.com/v6/icons/</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">URL</label>
                                                            <input type="url" name="url" value="{{ old('url', @$edit_social_media->url) }}" placeholder="URL" class="form-control">
                                                            @error('url')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Is Show</label>
                                                            {!! Form::select('is_show', ['false' => 'Hide', 'true' => 'Show'], old('is_show', @$edit_social_media->is_show), ['class' => 'col-sm-12 form-control']); !!}
                                                            @error('is_show')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($_GET['id']) && $_GET['id'] && $edit_social_media)
                                                    <button type="submit" class="btn btn-primary">update</button>
                                                    <a href="{{ route('superAdmin.setting.footer') }}" class="btn btn-secondary"><i class="fa fa-repeat"></i></a>
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
                                @if(!isset($_GET['id']) || isset($_GET['id']) && !$_GET['id'] && !$edit_social_media)
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <h4>Social Media list</h4>
                                                    <hr>
                                                </div>
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Icon</th>
                                                                    
                                                                    <th>URL</th>
                                                                    
                                                                    <th>Is Show</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($social_media as $val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ nl2br($val->icon) }}</td>
                                                                    <td>{{ $val->url }}</td>
                                                                    <td>{{ $val->is_show }}</td>
                                                                    <td><a href="{{ route('superAdmin.setting.footer') }}?id={{ $val->id }}" class="btn"><i class="fa fa-edit"></i></a></td>
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
