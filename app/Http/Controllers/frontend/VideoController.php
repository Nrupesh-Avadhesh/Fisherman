<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{ Video_banner, seo, Video, faq};
use Hash;


class VideoController extends Controller
{
    public function video(Request $request){
        $itams = 6;
        $videocou = Video::where('status', 'Active')->orderBy('id','DESC')->count();
        $total_page = ceil($videocou / $itams);
        if ($request->ajax()) {
            $video = Video::where('status', 'Active')->orderBy('id','DESC')->paginate($itams);
            $view = view('frontend.video.video_list', compact('video'))->render();
            
            return response()->json(['html' => $view]);
        } else {
            $seo = seo::where('page_name', 'video')->first();
            $banner = Video_banner::first();
            
            $data['title'] = $seo?$seo->title:'';
            $data['description'] = $seo?$seo->description:'';
            $data['keywords'] = $seo?$seo->keywords:'';
            return view('frontend.video.index')->with(compact('data', 'banner', 'total_page'));
        }
    }
    public function video_lt_list(Request $request){
        
        if ($request->ajax()) {
            $video = Video::where('status', 'Active')->orderBy('id','DESC')->take(2)->get();
            $view = view('frontend.video.ltvideo_list', compact('video'))->render();
  
            return response()->json(['html' => $view]);
        }
    }
    
}
