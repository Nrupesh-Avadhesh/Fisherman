<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ demo_call, seo, faq_banner };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class democallController extends Controller
{
    public function index(){
        $demo_call = demo_call::get();

        return view('backend.demo_call.index')->with(compact('demo_call'));
    }
}
