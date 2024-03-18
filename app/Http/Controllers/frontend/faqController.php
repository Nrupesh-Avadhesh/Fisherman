<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ faq, seo, faq_banner };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;

class faqController extends Controller
{
    public function faq(Request $request){
        
        $itams = 6;
        $faqcou = faq::where('status', 'Active')->orderBy('id','DESC')->count();
        $total_page = ceil($faqcou / $itams);
        if ($request->ajax()) {
            $faq = faq::where('status', 'Active')->orderBy('id','DESC')->paginate($itams);
            $page = $request['page'];
            $view = view('frontend.faq.faq_list', compact('faq', 'page'))->render();
  
            return response()->json(['html' => $view]);
        } else {
            $seo = seo::where('page_name', 'video')->first();
            $banner = faq_banner::first();
            
            $data['title'] = $seo?$seo->title:'';
            $data['description'] = $seo?$seo->description:'';
            $data['keywords'] = $seo?$seo->keywords:'';
            return view('frontend.faq.index')->with(compact('data', 'banner', 'total_page'));
        }
    }
    public function faq_lt_list(Request $request){
        
        if ($request->ajax()) {
            $faq = faq::where('status', 'Active')->orderBy('id','DESC')->take(5)->get();
            $view = view('frontend.faq.ltfaq_list', compact('faq'))->render();
  
            return response()->json(['html' => $view]);
        }
    }
}
