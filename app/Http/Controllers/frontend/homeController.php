<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{ seo, banner, about, home_robo, home_service, home_service_list, home_secure_trading, blog_banner, blog, Video_banner, Video, faq_banner, faq};
use Hash;

class homeController extends Controller
{
    public function home(Request $request){
        
        
        $secure_trading =  home_secure_trading::first();
        $service =  home_service::first();
        $service_list =  home_service_list::where('status','Show')->get();
        // dd($service_list);
        if ($request->ajax()) {
            if(isset($request->section)){
                if($request->section == 1){
                    $banner =  banner::first();
                    $view = view('frontend.home.banner', compact('banner'))->render();
                } else if($request->section == 2){
                    $about =  about::first();
                    $view = view('frontend.home.about', compact('about'))->render();
                } else if($request->section == 3){
                    $robo =  home_robo::first();
                    $view = view('frontend.home.robo', compact('robo'))->render();
                } else if($request->section == 4){
                    $view = '';
                } else if($request->section == 5){
                    $view = '';
                } else if($request->section == 6){
                    $secure_trading =  home_secure_trading::first();
                    $view = view('frontend.home.secure_trading', compact('secure_trading'))->render();
                }  else if($request->section == 7){
                    $banner = blog_banner::first();
                    $blog = blog::where('status', 'Active')->orderBy('id','DESC')->take(3)->get();
                    $view = view('frontend.home.blog', compact('banner', 'blog'))->render();
                } else if($request->section == 8){
                    $banner = Video_banner::first();
                    $video = Video::where('status', 'Active')->orderBy('id','DESC')->take(2)->get();
                    $view = view('frontend.home.video', compact('banner', 'video'))->render();
                } else if($request->section == 9){
                    $faq = faq::where('status', 'Active')->orderBy('id','DESC')->take(5)->get();
                    $view = view('frontend.home.faq', compact('faq'))->render();
                } else if($request->section == 10){
                    $view = view('frontend.layouts.footer')->render();
                }
                
                return response()->json(['html' => $view, 'section' => $request->section ]);
            }
        }
        $seo = seo::where('page_name', 'home')->first();
        $data['title'] = $seo?$seo->title:'';
        $data['description'] = $seo?$seo->description:'';
        $data['keywords'] = $seo?$seo->keywords:'';
        return view('frontend.home')->with(compact('data', 'service', 'service_list'));
    }
    
    
}
