<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ faq, seo, faq_banner, contact_user };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;

class contactController extends Controller
{
    public function index(Request $request){
        
        $data['title'] = '';
        $data['description'] = '';
        $data['keywords'] = '';
        return view('frontend.contact.index')->with(compact('data'));
        // return view('frontend.contact.index')->with(compact('data', 'banner', 'blog', 'total_page'));
    }

}
