<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{ seo, about_us_banner, about_us_mission, about_us_vision, about_us_count, about_us_values, about_us_finance };
use Hash;

class aboutUsController extends Controller
{
    public function about(){
        $seo = seo::where('page_name', 'about')->first();
        $banner = about_us_banner::first();
        $mission = about_us_mission::where('is_show', 'true')->first();
        $vision = about_us_vision::where('is_show', 'true')->first();
        $count = about_us_count::first();
        $values = about_us_values::first();
        $finance = about_us_finance::first();
        
        $data['title'] = $seo?$seo->title:'';
        $data['description'] = $seo?$seo->description:'';
        $data['keywords'] = $seo?$seo->keywords:'';
        return view('frontend.about')->with(compact('data', 'banner', 'mission', 'vision', 'count', 'values', 'finance'));
    }
}
