<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{ seo, fisherman_banner, fisherman_chooseUs, fisherman_chooseUs_list, fisherman_service, fisherman_key_features, fisherman_static };
use Hash;

class roboController extends Controller
{
    public function robo(){
        $seo = seo::where('page_name', 'robo')->first();
        $banner = fisherman_banner::first(); 
        $chooseUs =  fisherman_chooseUs::first();
        $chooseUs_list =  fisherman_chooseUs_list::where('status','Show')->get();
        $service =  fisherman_service::first();
        $key_features =  fisherman_key_features::first();
        $static =  fisherman_static::first();

        $data['title'] = $seo?$seo->title:'';
        $data['description'] = $seo?$seo->description:'';
        $data['keywords'] = $seo?$seo->keywords:'';
        return view('frontend.robo')->with(compact('data', 'banner', 'chooseUs', 'chooseUs_list', 'service', 'key_features', 'static'));
    }
}
