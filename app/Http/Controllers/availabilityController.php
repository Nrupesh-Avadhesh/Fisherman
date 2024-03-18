<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\availability;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class availabilityController extends Controller
{
    public function index(){
        $availability = availability::get();

        return view('backend.time.available.index')->with(compact('availability'));
    }

    public function available_update(Request $request){
        // dd($request);
        $availability = availability::get();
        // dd($availability);
        $mes = $validate = [];
        foreach ($availability as $key => $value) {
            if(isset($request[$value->name.'_available'])){
                $validate[$value->name.'_name'] = 'required';
                $validate[$value->name.'_start_time'] = 'required';
                $validate[$value->name.'_end_time'] = 'required|after:'.$value->name.'_start_time';
                $validate[$value->name.'_duration'] = 'required|min:1|max:30';
                $mes[$value->name.'_name.required'] = 'The name field is required.';
                $mes[$value->name.'_start_time.required'] = 'The Start Time field is required.';
                $mes[$value->name.'_end_time.required'] = 'The End Time field is required.';
                $mes[$value->name.'_end_time.after'] = 'The End time field must be after Start time.';
                $mes[$value->name.'_duration.required'] = 'The Duration field is required.';
            }
        }

        $request->validate($validate, $mes);

        foreach ($availability as $key2 => $value2) {
            // dd($value2->name, $request[$value2->name.'_available']);
            if(isset($request[$value2->name.'_available'])){
                $data = availability::where('id', $value2->id)->first();
                $data->is_available =  true;
                $data->start_time =  $request[$value2->name.'_start_time'];
                $data->end_time =  $request[$value2->name.'_end_time'];
                $data->duration =  $request[$value2->name.'_duration'];
                $data->save();
            }
        }
        FlashMessageServiceProvide::setMessage(1, 'Availability Updated Successfully');
        return redirect()->route('superAdmin.time.available');
    }
}
