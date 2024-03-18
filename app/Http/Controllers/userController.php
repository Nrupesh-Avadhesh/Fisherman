<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ User, seo, Video};
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class userController extends Controller
{
    public function index(){
        $user = User::where('role', 'client')->orderBy('is_pay', 'ASC')->get();

        return view('backend.user.index')->with(compact('user'));
    }
    public function client_edit(Request $request){
        $user = User::where('role', 'client')->where('id', $request->id)->first();
        if(!$user){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('superAdmin.user.client');
        }
        return view('backend.user.edit')->with(compact('user'));
    }

    public function client_update(Request $request){
        if(!$request->id){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('superAdmin.user.client');
        } else {
            $user = User::where('role', 'client')->where('id', $request->id)->first();
            if(!$user){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.user.client');
            }
        }
        $request->validate([
            'is_pay' => 'required|in:0,1',
        ]);


        $user = User::where('id', $request->id)->first();
        $user->is_pay = $request->is_pay;
        
        if($user->save()){
            FlashMessageServiceProvide::setMessage(1, 'Client Update Successfully');
            return redirect()->route('superAdmin.user.client');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Client Not Update Successfully');
        }
        return back();
    }
}
