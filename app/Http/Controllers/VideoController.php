<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ Video_banner, seo, Video};
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class VideoController extends Controller
{
    public function video_banner(){
        $seo = seo::where('page_name', 'video')->first();
        $banner = Video_banner::first();

        return view('backend.video.banner.index')->with(compact('seo', 'banner'));
    }
    public function video_banner_update(Request $request){
        $oldban = Video_banner::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|nullable|max:50',
                'headline' => 'string|required|max:150',
                'sub_headline' => 'nullable|string|max:120',
                'image' => 'nullable|mimes:png,webp|dimensions:width=694,height=694',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|nullable|max:50',
                'headline' => 'string|required|max:150',
                'sub_headline' => 'nullable|string|max:120',
                'image' => 'required|mimes:png,webp|dimensions:width=694,height=694',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'VBAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_banner = new Video_banner;
        $about_us_banner->sub_title = $request->sub_title;
        $about_us_banner->headline = $request->headline;
        $about_us_banner->sub_headline = $request->sub_headline;
        $about_us_banner->image = $filename;
        if($about_us_banner->save()){
            FlashMessageServiceProvide::setMessage(1, 'Banner Updateed Successfully');
            return redirect()->route('superAdmin.video.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Banner Not Updateed Successfully');
            return back();
        }
    }
    
    public function video_seo_update(Request $request){
        
        $request->validate([
            'title' => 'string|nullable|max:50',
            'description' => 'string|nullable',
            'keywords' => 'string|nullable|max:200',
        ]);
        
        seo::where('page_name', 'video')->delete();

        $seo = new seo;
        $seo->page_name = 'video';
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            FlashMessageServiceProvide::setMessage(1, 'SEO Updateed Successfully');
            return redirect()->route('superAdmin.video.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'SEO Not Updateed Successfully');
            return back();
        }
    }
    public function video_list(Request $request){
        $video_list = Video::get();
        $edit_video = '';
        if(isset($request->id)){
            $edit_video = Video::where('id', $request->id)->first();
            if(!$edit_video){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.video.list');
            }
        }
        return view('backend.video.video_list.index')->with(compact('edit_video', 'video_list'));
    }
    public function video_list_update(Request $request){
        if($request->id){
            $request->validate([
                'title' => 'string|required|max:120',
                'author_name' => 'nullable|required|max:150',
                'video_url' => 'string|required|url',
                'status' => 'required',
                'image' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=690,height=460',
            ]);
        } else {
            $request->validate([
                'title' => 'string|required|max:120',
                'author_name' => 'nullable|required|max:150',
                'video_url' => 'string|required|url',
                'status' => 'required',
                'image' => 'required|mimes:png,webp,jpg,jpeg|dimensions:width=690,height=460',
            ]);
        }
        
        
        if($request->id){
            $Video = Video::where('id', $request->id)->first();
            if(!$Video){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.video.list');
            }
        } else {
            $Video = new Video;
        }
        $image = '';
        if($request->hasfile('image'))
        {
            $image = 'VID'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/video_img'), $image);
        }
        $Video->title = $request->title;
        $Video->author_name = $request->author_name;
        $Video->video_url = $request->video_url;
        $Video->status = $request->status;
        if($image){
            $Video->image = $image;
        }
        if(!$request->id){
            $Video->date = date('Y-m-d H:i:s');
        }
        if($Video->save()){
           if($request->id){
                FlashMessageServiceProvide::setMessage(1, 'Video Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(1, 'Video Added Successfully');
            }
            return redirect()->route('superAdmin.video.list');
        } else {
            if($request->id){
                FlashMessageServiceProvide::setMessage(0, 'Video Not Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(0, 'Video Not Added Successfully');
            }
            return back();
        }
    }
}
