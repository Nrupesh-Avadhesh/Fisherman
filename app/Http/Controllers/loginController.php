<?php

namespace App\Http\Controllers;

use App\Providers\FlashMessageServiceProvide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\blog;
use App\Models\demo_call;
use Hash;

class loginController extends Controller
{
    public function dashboard(){
        if (!Auth::check()) {
            return redirect()->route('superAdmin.login');
        } else {
            if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin'){
                $data = [];
                $data['totalclient'] = User::where('role', 'client')->count();
                $data['Payedclient'] = User::where('role', 'client')->whereNotNull('pay_ss')->count();
                $data['blog'] = blog::count();
                $data['tocall'] = demo_call::where('date', date('Y-m-d'))->count();
                
                return view('backend.dashboard')->with(compact('data'));
            } else {
                return redirect()->route('home');
            }
        }
    }
    
    public function login(){
        if (!Auth::check()) {
            return view('backend.auth.login');
        } else {
            return redirect()->route('superAdmin.dashboard');
        }
    }

    public function cpassword($pas){
        return Hash::make($pas);
    }

    public function login_attempt(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $remember = ($request->remember) ? true : false;

        $auth = Auth::attempt(
            [
                'email'  => $request->email,
                'password'  => $request->password    
            ], $remember
        );
        if ($auth) {
            FlashMessageServiceProvide::setMessage(1, 'Login Successfully');
            if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin'){
                return redirect()->route('superAdmin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['user_name' => 'The provided credentials do not match our records.',])->onlyInput('user_name');

    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return redirect()->route('superAdmin.dashboard');
    }
}
