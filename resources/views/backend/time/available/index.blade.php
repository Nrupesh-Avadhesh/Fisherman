@extends('backend.layouts.app')
@section('title', ' / Availability')
@section('header_title', 'Availability')
@section('sub_page', 'Time')
@section('header_link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/material_green.css">
    <style>
        .flatpickr-days{
            border-left: 1px solid rgba(72, 72, 72, 0.2);
            border-right: 1px solid rgba(72, 72, 72, 0.2);
        }
        .span.flatpickr-weekday{
            color: #dddddd;
        }
        .flatpickr-day.today {
            border-color: #fff9f9;
        }
        .flatpickr-day{
            border: 1px solid transparent;
            color: #fffefe;
        }
        .flatpickr-day.disabled, .flatpickr-day.disabled:hover {
            cursor: not-allowed;
            color: rgba(122, 122, 122, 0.5);
        }
        .dayContainer{
            background-color: #0c0d0e;
            color: #f5f5f5;
        }
    </style>
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
                                            {!! Form::open(['url' => route('superAdmin.time.available.update'), 'method' => 'post','files'=>true, 'id' => 'company_add_form_ResetPassword', 'class' => 'form-horizontal my_new_he' ,'enctype' => 'multipart/form-data']) !!}
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <h4>Availability List</h4>
                                                        <hr>
                                                    </div>
                                                    <div class="col-12 col-md-6"> </div>

                                                    <div class="col-12 col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Is</th>
                                                                        <th>Start Time</th>
                                                                        <th>End Time</th>
                                                                        <th>Duration (minutes)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($availability as $key=>$val)
                                                                        <input type="hidden" name="{{ $val->name }}_id" value="{{ $val->id }}">
                                                                    <tr style=" text-align: center; ">
                                                                        <td>{{ $key +1 }}</td>
                                                                        <td>
                                                                            <input type="text" name="{{ $val->name }}_name" value="{{ old( $val->name.'_name', @$val->name) }}" placeholder="name" readonly class="form-control">
                                                                            @error('{{ $val->name }}_name')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="checkbox" name="{{ $val->name }}_available" value="true" @if(old( $val->name.'_available', @$val->is_available) == true) checked @endif data-name="{{ $val->name }}" class="form-control is_available">
                                                                            @error($val->name.'_available')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="time" name="{{ $val->name }}_start_time" value="{{ old( $val->name.'_start_time', @$val->start_time) }}" placeholder="Start Time" @if(old( $val->name.'_available', @$val->is_available) == true) required @endif class="form-control add_date {{ $val->name }} ">
                                                                            @error($val->name.'_start_time')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="time" name="{{ $val->name }}_end_time" value="{{ old( $val->name.'_end_time', @$val->end_time) }}" placeholder="End Time" @if(old( $val->name.'_available', @$val->is_available) == true) required @endif class="form-control add_date {{ $val->name }} ">
                                                                            @error($val->name.'_end_time')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="{{ $val->name }}_duration" min="1" step="1" value="{{ old( $val->name.'_duration', @$val->duration) }}" max="30" placeholder="Duration" class="form-control {{ $val->name }}_due" @if(old( $val->name.'_available', @$val->is_available) != true) readonly @else required @endif>
                                                                            @error($val->name.'_duration')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    
                                                                </tbody>
                                                            </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<script>
    $(".date").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });
    $(document).ready(function() {
        $(document).on('click', ".is_available", function () {
            name = $(this).data('name');
            if ($(this).is(":checked")) {
                // add_date
                if($('.'+name).hasClass('add_date')){
                    $('.'+name).attr("required", "required");
                }
                $('.'+name+'_due').removeAttr("readonly").attr("required", "required");
            } else {
                // add_date
                if($('.'+name).hasClass('add_date')){
                    $('.'+name).removeAttr("required");
                }
                $('.'+name+'_due').attr("readonly", "readonly").removeAttr("required");
            }
        });
    });
</script>
@endsection
