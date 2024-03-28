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
                                            {!! Form::open(['url' => route('superAdmin.setting.header.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                            <input type="hidden" name="id" value="{{isset($_GET['id']) ? $_GET['id']: NULL }}">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Menu edit</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Page Name</label>
                                                            <input type="text" value="{{ old('page_name', @$menu->page_name) }}" placeholder="Heading" class="form-control" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Menu Titel</label>
                                                            <input type="text" name="menu_titel" value="{{ old('menu_titel', @$menu->menu_titel) }}" placeholder="Menu Titel" class="form-control" >
                                                            @error('menu_titel')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            {{-- <label class="form-label" style=" width: 100%; ">Menu Type</label>
                                                                <label> <input type="radio" name="is_sub_menu" class="is_sub_menu" value="true" @if(old('is_sub_menu', @$user->is_sub_menu) == 'true') @endif checked >Sub Menu</label>
                                                                <label> <input type="radio" name="is_sub_menu" class="is_sub_menu" value="false" @if(old('is_sub_menu', @$user->is_sub_menu) == 'false') @endif >Main Menu</label> --}}
                                                            <label class="form-label">Menu Type</label>
                                                                {!! Form::select('is_sub_menu', ['false' => 'Main Menu', 'true' => 'Sub Menu'], old('is_sub_menu', @$menu->is_sub_menu), ['class' => 'col-sm-12 form-control is_sub_menu']); !!}
                                                            @error('is_sub_menu')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 main_id">
                                                        <div class="form-group">
                                                            <label class="form-label">Menu name</label>
                                                                {!! Form::select('main_id', $main_menu, old('main_id', @$menu->main_id), ['class' => 'col-sm-12 form-control ', 'placeholder' => 'Select main Menu']); !!}
                                                            @error('main_id')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Is Show</label>
                                                                {!! Form::select('is_show', ['false' => 'Hide', 'true' => 'Show'], old('is_show', @$menu->is_show), ['class' => 'col-sm-12 form-control']); !!}
                                                            @error('is_show')
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
<script>
    $(document).ready(function(){
        sub_menu();
        $(document).on('change', '.is_sub_menu', function() {
            sub_menu();
        });
        function sub_menu(){
            if($('.is_sub_menu').find(":selected").val() == 'false'){
                $('.main_id').hide('slow');
            } else {
                $('.main_id').show('slow');
            }
        }
    });
</script>
@endsection
