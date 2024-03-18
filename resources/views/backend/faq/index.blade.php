@extends('backend.layouts.app')
@section('title', ' / FAQ List')
@section('header_title', 'FAQ List')
@section('sub_page', 'FAQ')
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
                                            {!! Form::open(['url' => route('superAdmin.faq.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <input type="hidden" name="id" value="{{isset($_GET['id']) ? $_GET['id']: NULL }}">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>FAQ @if(isset($_GET['id']) && $_GET['id'] && $edit_faq)edit @else Add @endif</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Question</label>
                                                            <input type="text" name="question" value="{{ old('question', @$edit_faq->question) }}" placeholder="Question" class="form-control">
                                                            @error('question')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="form-group">
                                                            <label class="form-label">Status</label>
                                                            {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], old('status', @$edit_faq->status), ['class' => 'col-sm-12 form-control']); !!}
                                                            @error('status')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12"> 
                                                        <div class="form-group">
                                                            <label class="form-label">Answer</label>
                                                            <textarea name="answer" class="form-control editor" id="editor" cols="30" rows="5">{{ old('answer', @$edit_faq->answer) }}</textarea>
                                                            @error('answer')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($_GET['id']) && $_GET['id'] && $edit_faq)
                                                <button type="submit" class="btn btn-primary">update</button>
                                                <a href="{{ route('superAdmin.faq.list') }}" class="btn btn-secondary"><i class="fa fa-repeat"></i></a>
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
                                @if(!isset($_GET['id']) || isset($_GET['id']) && !$_GET['id'] && !$edit_faq)
                                <div class="col-md-12">
                                    <div class="card b-l-success business-info services m-b-20">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <h4>FAQ list</h4>
                                                    <hr>
                                                </div>
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Question</th>
                                                                    <th>Answer</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($faq_list as $key=>$val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ $val->question }}</td>
                                                                    <td>{{ $val->answer }}</td>
                                                                    <td>{{ $val->status }}</td>
                                                                    <td><a href="{{ route('superAdmin.faq.list') }}?id={{ $val->id }}" class="btn"><i class="fa fa-edit"></i></a></td>
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
