@extends('backend.layouts.app')
@section('title', ' / Client List')
@section('header_title', 'Client List')
@section('sub_page', 'Client')
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
                                            {!! Form::open(['url' => route('superAdmin.user.client.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                            <input type="hidden" name="id" value="{{isset($_GET['id']) ? $_GET['id']: NULL }}">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <h4>Client edit</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>
                                                    <div class="col-12 col-md-6"> 
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Is Pay</label>
                                                                        {!! Form::select('is_pay', ['0' => 'No', '1' => 'YES'], old('is_pay', @$user->is_pay), ['class' => 'col-sm-12 form-control']); !!}
                                                                    @error('is_pay')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" name="name" value="{{ old('name', @$user->name) }}" placeholder="Heading" class="form-control" readonly>
                                                                    @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="text" name="email" value="{{ old('email', @$user->email) }}" placeholder="Heading" class="form-control" readonly>
                                                                    @error('email')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Mobile Number</label>
                                                                    <input type="text" name="mobile_number" value="{{ old('mobile_number', @$user->mobile_number) }}" placeholder="Heading" class="form-control" readonly>
                                                                    @error('mobile_number')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Investment Amount</label>
                                                                    <input type="text" name="payamount" value="{{ old('payamount', @$user->payamount) }}" placeholder="Heading" class="form-control" readonly>
                                                                    @error('payamount')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Management Fees</label>
                                                                    @php
                                                                        $mf = round((@$user->payamount *10)/100, 2);
                                                                    @endphp
                                                                    <input type="number" step="0.01" value="{{ old('payamount', @$mf) }}"  class="form-control" readonly>
                                                                    @error('payamount')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Account</label>
                                                                    <input type="text" name="account" value="{{ old('account', @$user->account) }}" placeholder="Heading" class="form-control" readonly>
                                                                    @error('account')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6"> 
                                                        @if($user && $user->pay_ss)
                                                            <img src="{{ asset('uploads/payment_img/') }}/{{ $user->pay_ss }}" alt=""style=" max-height: 230px; max-width: 230px; object-fit: scale-down;">
                                                        @endif
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
