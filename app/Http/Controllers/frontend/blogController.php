<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{ blog_banner, seo, blog};
use Hash;
use App\Providers\FlashMessageServiceProvide;

class blogController extends Controller
{
    public function blog(Request $request){
        
        $itams = 6;
        $blogcou = blog::where('status', 'Active')->orderBy('id','DESC')->count();
        $total_page = ceil($blogcou / $itams);
        if ($request->ajax()) {
            $blog = blog::where('status', 'Active')->orderBy('id','DESC')->paginate($itams);
            $view = view('frontend.blog_list', compact('blog'))->render();
  
            return response()->json(['html' => $view]);
        } else {
            $seo = seo::where('page_name', 'blog')->first();
            $banner = blog_banner::first();
            
            $data['title'] = $seo?$seo->title:'';
            $data['description'] = $seo?$seo->description:'';
            $data['keywords'] = $seo?$seo->keywords:'';
            return view('frontend.blog')->with(compact('data', 'banner', 'total_page'));
        }
    }
    public function blog_lt_list(Request $request){
       
        if ($request->ajax()) {
            $itams = 6;
            $blog = blog::where('status', 'Active')->orderBy('id','DESC')->take(3)->get();
            $view = view('frontend.ltblog_list', compact('blog'))->render();
  
            return response()->json(['html' => $view]);
        }
    }

    public function blog_detail(Request $request){
        
        $blog = blog::where('status', 'Active')->where('id', $request->bi)->first();
        if(!$blog){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('blog');
        }
        $left_blog = blog::where('status', 'Active')->where('id','!=',$request->bi)->orderBy('id','DESC')->select('id', 'title', 'label_image', 'date')->take(3)->get();
        $p_blog = blog::where('status', 'Active')->where('id', '>',$request->bi)->orderBy('id','DESC')->select('id', 'title')->first();
        $n_blog = blog::where('status', 'Active')->where('id', '<',$request->bi)->orderBy('id','DESC')->select('id', 'title')->first();

        $data['title'] = $blog?$blog->title:'';
        $data['description'] = $blog?$blog->description:'';
        $data['keywords'] = $blog?$blog->keywords:'';
        return view('frontend.blog_detail')->with(compact('data', 'blog', 'left_blog','p_blog','n_blog'));
    }
    
}
