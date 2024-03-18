<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\FlashMessageServiceProvide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\demo_call;
use App\Models\availability;
use Jubaer\Zoom\Facades\Zoom;
use Hash;
use Mail;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class account_detailController extends Controller
{
    public function account_detail(Request $request){
        if(isset($request->token) && $request->token && isset($request[$request->token]) &&$request[$request->token] && isset($request[$request[$request->token]]) && $request[$request[$request->token]]){
            $user = User::where('id', $request[$request[$request->token]])->first();
            if($user){
                return view('frontend.auth.account_detail')->with(compact('user'));
            }
        } 
        echo "the ".url('/').$_SERVER['REQUEST_URI']." you entered is invalid offline";
        exit;
    }
}
