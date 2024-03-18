@extends('backend.layouts.app')
@section('title', ' / Demo Call List')
@section('header_title', 'Demo Call List')
@section('sub_page', 'Demo Call')
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
                                                    <h4>Demo Call List</h4>
                                                    <hr>
                                                </div>
                                                <div class="col-12 col-md-12"> 
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Mobile Number</th>
                                                                    <th>Amount</th>
                                                                    <th>Date And Time</th>
                                                                    <th>url</th>
                                                                    <th>password</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($demo_call as $key=>$val)
                                                                <tr style=" text-align: center; ">
                                                                    <td>{{ $key +1 }}</td>
                                                                    <td>{{ $val->first_name }} {{ $val->last_name }}</td>
                                                                    <td>{{ $val->email }}</td>
                                                                    <td>{{ $val->mobile_number }}</td>
                                                                    <td>{{ $val->investment_amount }}</td>
                                                                    <td>{{ $val->date }} {{ $val->time }}</td>
                                                                    <td>{{ $val->join_url }}</td>
                                                                    <td>{{ $val->password }}</td>
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
