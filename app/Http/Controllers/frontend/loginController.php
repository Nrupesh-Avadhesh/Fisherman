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

class loginController extends Controller
{
    
    public function in_login(){
        if (Auth::check()) {
            return false;
        }
        return true;
    }
    public function in_not_login(){
        if (!Auth::check()) {
            // dd(Auth::check());
            return false;
        }
        return true;
    }
    public function login(){
        if (!Auth::check()) {
            return view('frontend.auth.login');
        } else {
            if(Auth::user()->role == 'client'){
                return redirect()->route('home');
            } else {
                Session::flush();
                Auth::logout();
                return view('frontend.auth.login');
            }
        }
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
            if(Auth::user()->role == 'client'){
                return redirect()->route('home');
            } else {
                Session::flush();
                Auth::logout();
                return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->onlyInput('email');
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->onlyInput('email');

    }

    public function register(){
        $ld = $this->in_login();
        if($ld != true){
            return redirect()->route('home');
        }
        return view('frontend.auth.register');
    }
    public function store(Request $request){
        if (request()->ajax()) {
            $ld = $this->in_login();
            if($ld != true){
                return redirect()->route('home');
            }
            try {
                // dd($request);
                if(isset($request->is_val) && $request->is_val){

                    $validator = Validator::make($request->all(), [
                        'first_name' => ['required'],
                        'last_name' => ['required'],
                        'mobile_number' => ['required', 'size:10'],
                        'email' => ['required','email',Rule::unique('users')->where(function (Builder $query) use($request) {
                            return $query->where('email', $request->email);
                        })],
                        'password' => ['required'],
                        'confirm_password' => ['required','required_with:password', 'same:password', 'min:8'], 
                    ]);
                    if ($validator->fails()) {
                        $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                        return $output;
                    }
                    $output = array('success' => true, 'data' => [], 'msg' => '');
                } else {
                    $validator = Validator::make($request->all(), [
                        'first_name' => ['required'],
                        'last_name' => ['required'],
                        'mobile_number' => ['required', 'size:10'],
                        'email' => ['required','email',Rule::unique('users')->where(function (Builder $query) use($request) {
                            return $query->where('email', $request->email);
                        })],
                        'password' => ['required'],
                        'confirm_password' => ['required','required_with:password', 'same:password', 'min:8'],
                        'i_agree' => ['required'],
                        'payamount' => ['required'],
                        'fees' => ['required'],
                        'account' => ['required'],
                    ]);
                    if ($validator->fails()) {
                        $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                        return $output;
                    }
                    $input = $request->all();
                    // dd($input);
                    $input['name'] = $request->first_name.' '.$request->last_name;
                    $input['account'] = $request->account;
                    $input['password'] = Hash::make($request->password);
                    $input['role'] = 'client';
                    $user = User::create($input);
                    $auth = Auth::attempt([
                            'email'  => $request->email,
                            'password'  => $request->password    
                        ]);
                    if ($auth) {
                        FlashMessageServiceProvide::setMessage(1, 'Login Successfully');
                    }
                    if($user){
                        // $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        // $token_1 =  substr(str_shuffle(str_repeat($pool, 20)), 0, 40);
                        // $token_2 =  substr(str_shuffle(str_repeat($pool, 20)), 0, 30);
                        
                        // $data['productname'] = 'Fisherman';
                        $data['name'] = $user->name;
                        // $data['url'] = url('/').'/account-detail?token='.$token_1.'&'.$token_2.'='.$user->id.'&'.$token_1.'='.$token_2;
                        $data['support'] = 'support@fisherman.com';
                        $html = welcomehtml($data);
                        $mailrepo = sendMail($request->email, 'Welcome to Fisherman', $html);
                        Log::emergency("mail => " . print_r($mailrepo, true));
                        // Mail::send('frontend.email.welcome', ['data' => $data],function($message) use ($request) {
                        //     $message->to($request->email)
                        //     ->subject('Welcome to Fisherman');
                        // });
                    }
                    $output = array('success' => true, 'data' => [], 'msg' => 'your account has been created successfully.please login and upload payment screenshot');
                }   
            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
                $output = array('success' => false,'msg' => 'Something went wrong, please try again');
            }
            return $output;
        }
    }
    

    public function profile(){
        $ld = $this->in_not_login();
        if($ld != true){
            return redirect()->route('login');
        }
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.auth.profile')->with(compact('user'));
    }

    public function profilestore(Request $request){
        if (request()->ajax()) {
            $ld = $this->in_not_login();
            if($ld != true){
                return redirect()->route('login');
            }
            try {
                $validator = Validator::make($request->all(), [
                    'first_name' => ['required'],
                    'last_name' => ['required'],
                    'mobile_number' => ['required', 'size:10'],
                    // 'email' => ['required','email',Rule::unique('users')->where(function (Builder $query) use($request) {
                    //     return $query->where('email', $request->email);
                    // })],
                ]);
                if ($validator->fails()) {
                    $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                    return $output;
                }
                $user = User::where('id', Auth::user()->id)->first();
                $user->name = $request->first_name.' '.$request->last_name;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->mobile_number = $request->mobile_number;
                if($user->save()){
                    $output = array('success' => true, 'data' => [], 'msg' => 'Profile Updated successfully');
                } else {
                    $output = array('success' => true, 'data' => [], 'msg' => 'Profile Not Updated successfully');
                }
            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
                $output = array('success' => false,'msg' => 'Something went wrong, please try again');
            }
            return $output;
        }
    }

    public function passwordstore(Request $request){
        if (request()->ajax()) {
            $ld = $this->in_not_login();
            if($ld != true){
                return redirect()->route('login');
            }
            try {
                $validator = Validator::make($request->all(), [
                    'password' => ['required'],
                    'confirm_password' => ['required','required_with:password', 'same:password', 'min:8'], 
                ]);
                if ($validator->fails()) {
                    $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                    return $output;
                }
                $user = User::where('id', Auth::user()->id)->first();
                $user->password = Hash::make($request->password);
                if($user->save()){
                    $output = array('success' => true, 'data' => [], 'msg' => 'Password Updated successfully');
                } else {
                    $output = array('success' => true, 'data' => [], 'msg' => 'Password Not Updated successfully');
                }
            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
                $output = array('success' => false,'msg' => 'Something went wrong, please try again');
            }
            return $output;
        }
    }
    public function paymentstore(Request $request){
        if (request()->ajax()) {
            $ld = $this->in_not_login();
            if($ld != true){
                return redirect()->route('login');
            }
            try {
                $validator = Validator::make($request->all(), [
                    'image' => ['required'], 
                ]);
                if ($validator->fails()) {
                    $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                    return $output;
                }

                $filename = '';
                if($request->hasfile('image'))
                {
                    $filename = 'PSS'.date('dHmiys').'.'.$request->image->extension();  
                    $request->image->move(public_path('uploads/payment_img'), $filename);
                }

                $user = User::where('id', Auth::user()->id)->first();
                $user->pay_ss = $filename;
                if($user->save()){
                    $output = array('success' => true, 'data' => [], 'msg' => 'payment screenshot uplode successfully');
                } else {
                    $output = array('success' => true, 'data' => [], 'msg' => 'payment screenshot not uploaded successfully');
                }
            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
                $output = array('success' => false,'msg' => 'Something went wrong, please try again');
            }
            return $output;
        }
    }

    public function forgot_password(){
        $ld = $this->in_login();
        if($ld != true){
            return redirect()->route('home');
        }
        return view('frontend.auth.forgot_password');
    }
    public function forgot_password_attempt(Request $request){
        $ld = $this->in_login();
        if($ld != true){
            return redirect()->route('home');
        }
        $request->validate([
            'email' => ['required','email'],
        ]);
        $user = User::where('email', $request->email)->where('role', 'client')->first();
        if($user){
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password =  substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
            
            $user->password = Hash::make($password);
            if($user->save()){
                $data['url'] = url('/');
                $data['productname'] = 'Fisherman Group';
                $data['name'] = $user->name;
                $data['pass'] = $password;
                $data['login'] = url('/').'/login';
                $data['support'] = 'support@fishermangroup.com';
                // dd($request->email);
                $html = forgote_passwordhtml($data);
                $mailrepo = sendMail($request->email, 'Important: Your Temporary Password for Fisher Man Account', $html);
                Log::emergency("mail => " . print_r($mailrepo, true));
                // Mail::send('frontend.email.forgote_password', ['data' => $data],function($message) use ($request) {
                //     $message->to($request->email)
                //     ->subject('Important: Your Temporary Password for Fisher Man Account');
                // });
                return redirect()->route('login');
            } else {
                return back()->withErrors(['email' => 'Something went wrong, please try again.',])->onlyInput('email');
            }
        } else {
            return back()->withErrors(['email' => 'The provided email do not match our records.',])->onlyInput('email');
        }
    }


    public function demo_call(){
        $ld = $this->in_login();
        if($ld != true){
            return redirect()->route('home');
        }
        // dd(Zoom::getUpcomingMeeting());
        $availability = availability::get();
        $block_list = implode('||',getNotAvalibal($availability));
        // $block_list = implode('||',getNotAvalibal($availability));
        // dd($block_list);
        return view('frontend.auth.demo_call')->with(compact('block_list'));
    }
    
    public function demo_call_slote(Request $request){
        $ld = $this->in_login();
        if($ld != true){
            return redirect()->route('home');
        }
        $data = [];
        if(isset($request->date) && $request->date != null){
            $day = date('l', strtotime($request->date));
            if($day){
                $availability = availability::where('name', $day)->where('is_available', '1')->first();
                if($availability){
                    $demo_call = demo_call::where('date', $request->date)->get();
                    $data = crateTimeList($availability->start_time, $availability->end_time, $availability->duration, $request->date, $demo_call);
                }
            }
        }
        // dd($data);
        return $data;
    }

    public function deom_store(Request $request){
        if (request()->ajax()) {
            try {
                if(isset($request->is_val) && $request->is_val){

                    $validator = Validator::make($request->all(), [
                        'first_name' => ['required'],
                        'last_name' => ['required'],
                        'mobile_number' => ['required', 'size:10'],
                        'email' => ['required','email'],
                    ]);
                    if ($validator->fails()) {
                        $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                        return $output;
                    }
                    $output = array('success' => true, 'data' => [], 'msg' => '');
                } else {
                    // dd($request->all());
                    $validator = Validator::make($request->all(), [
                        'first_name' => ['required'],
                        'last_name' => ['required'],
                        'mobile_number' => ['required', 'size:10'],
                        'date' => ['required'],
                        'time' => ['required'],
                        'investment_amount' => ['required'],
                        'email' => ['required','email'],
                    ]);
                    if ($validator->fails()) {
                        $output = array('success' => false, 'data' => $validator->errors(), 'msg' => 'Something went wrong, please try again');
                        return $output;
                    }
                    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $password =  substr(str_shuffle(str_repeat($pool, 10)), 0, 10);

                    $data['name'] = $request->first_name.' '. $request->last_name;
                    $data['agenda'] = 'Investment with fisherman group';
                    $data['topic'] = 'schedule demo call from fisherman group';
                    $data['Date'] = date("Y-m-d", strtotime($request->date));
                    $data['Time'] = date('H:i:s', strtotime($request->time));
                    $data['Duration'] = '40 Minutes';
                    $data['password'] = $password;
                    $data['support'] = 'support@fishermangroup.com';
                    $data['productname'] = 'Fisherman Group';

                    $meetings = Zoom::createMeeting([
                        "agenda" => $data['agenda'],
                        "topic" => $data['topic'],
                        "type" => 2,
                        "duration" => 40,
                        "timezone" => 'Asia/Kolkata',
                        "password" => $password,
                        "start_time" => date("Y-m-d", strtotime($request->date)).'T'.date('H:i:s', strtotime($request->time)),
                        "template_id" => '',
                        "pre_schedule" => false,
                        // "schedule_for" => 'nrupesh.shukla1984@outlook.com',
                        "settings" => [
                            'join_before_host' => false,
                            'host_video' => false,
                            'participant_video' => false,
                            'mute_upon_entry' => false,
                            'waiting_room' => false,
                            'audio' => 'both',
                            'auto_recording' => 'none',
                            'approval_type' => 0,
                        ],
    
                    ]);
                    $input = $request->all();
                    // dd($input);
                    // dd($meetings);
                    if($meetings['status']){
                        $input['first_name'] = $request->first_name;
                        $input['last_name'] = $request->last_name;
                        $input['mobile_number'] = $request->mobile_number;
                        $input['email'] = $request->email;
                        $input['time'] = $request->time;
                        $input['investment_amount'] = $request->investment_amount;
                        $input['date'] = $request->date;
                        $input['uuid_call'] = $meetings['data']['uuid'];
                        $input['id_call'] = $meetings['data']['id'];
                        $input['start_time'] = $meetings['data']['start_time'];
                        $input['join_url'] = $meetings['data']['join_url'];
                        $input['password'] = $meetings['data']['password'];
                        $input['status'] = 'Schedule';
                        demo_call::create($input);

                        $data['meeting_link'] =  $meetings['data']['join_url'];
                        $data['meeting_id'] =  $meetings['data']['id'];

                        $html = demo_callhtml($data);
                        $mailrepo = sendMail($request->email, 'Subject: Invitation to Join Zoom Meeting: '.$data['topic'], $html);
                        Log::emergency("mail => " . print_r($mailrepo, true));
                        $output = array('success' => true, 'data' => [], 'msg' => 'Your Call Scheduled request added successfully.');
                    } else {
                        $output = array('success' => false, 'data' => $meetings['message'], 'msg' =>'Something went wrong, please try again');
                    }
                }   
            } catch(exception $e){
                Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
                $output = array('success' => false,'msg' => 'Something went wrong, please try again');
            }
            return $output;
        }
    }


    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
