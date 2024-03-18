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
                                            <div class="row justify-content-between">
                                                <div class="col-12 col-md-6 mt-3">
                                                    <h4>Client List</h4>
                                                    <hr>
                                                </div>
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Image</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Mobile Number</th>
                                                                    <th>Amount</th>
                                                                    <th>Is Pay</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($user as $key=>$val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ $key +1 }}</td>
                                                                    <td>@if($val->pay_ss)<img src="{{ asset('uploads/payment_img') }}/{{ $val->pay_ss }}" alt="image not found" style="max-height: 100px;max-width: 100px;"> @endif</td>
                                                                    <td>{{ $val->name }}</td>
                                                                    <td>{{ $val->email }}</td>
                                                                    <td>{{ $val->mobile_number }}</td>
                                                                    <td>{{ $val->payamount }}</td>
                                                                    <td>@if($val->is_pay == 1) Yes @else No @endif</td>
                                                                    <td><a href="{{ route('superAdmin.user.client.edit') }}?id={{ $val->id }}" class="btn"><i class="fa fa-edit"></i></a></td>
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
