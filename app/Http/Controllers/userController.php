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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => ['required','email',Rule::unique('users')->where(function (Builder $query) use($request) {
                return $query->where('email', $request->email)->where('id', '!=',$request->id);
            })],
            'mobile_number' => 'required|numeric|digits:10',
            'payamount' => 'required',
            'fees' => 'required',
            'account' => 'required|in:Referral Partner,Existing Account',
            'is_pay' => 'required|in:0,1',
        ]);


        $user = User::where('id', $request->id)->first();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->payamount = $request->payamount;
        $user->fees = $request->fees;
        $user->account = $request->account;
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
