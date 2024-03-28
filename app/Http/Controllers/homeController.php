<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ User, seo, banner, about, home_robo, home_service, home_service_list, home_secure_trading };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class homeController extends Controller
{
    public function home_banner(){
        $seo = seo::where('page_name', 'home')->first();
        $banner = banner::first();

        return view('backend.home.banner.index')->with(compact('seo', 'banner'));
    }
    
    public function home_banner_update(Request $request){
        $oldban = banner::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'sub_headline_1' => 'nullable|string|max:30',
                'sub_headline_2' => 'nullable|string|max:30',
                'sub_headline_3' => 'nullable|string|max:30',
                'offer_line' => 'nullable|string|max:30|required_with:offer_count',
                'offer_count' => 'nullable|required_with:offer_line',
                'image' => 'nullable|mimes:png,webp|dimensions:width=361,height=723',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'sub_headline_1' => 'nullable|string|max:30',
                'sub_headline_2' => 'nullable|string|max:30',
                'sub_headline_3' => 'nullable|string|max:30',
                'offer_line' => 'nullable|string|max:30|required_with:offer_count',
                'offer_count' => 'nullable|required_with:offer_line',
                'image' => 'required|mimes:png,webp|dimensions:width=361,height=723',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'BAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $banner = new banner;
        $banner->sub_title = $request->sub_title;
        $banner->headline = $request->headline;
        $banner->sub_headline_1 = $request->sub_headline_1;
        $banner->sub_headline_2 = $request->sub_headline_2;
        $banner->sub_headline_3 = $request->sub_headline_3;
        $banner->offer_line = $request->offer_line;
        $banner->offer_count = $request->offer_count;
        $banner->image = $filename;
        if($banner->save()){
            FlashMessageServiceProvide::setMessage(1, 'Banner Updateed Successfully');
            return redirect()->route('superAdmin.home.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Banner Not Updateed Successfully');
            return back();
        }
    }
    
    public function home_seo_update(Request $request){
        $request->validate([
            'title' => 'string|nullable|max:50',
            'description' => 'string|nullable|max:200',
            'keywords' => 'string|nullable|max:200',
        ]);
        
        seo::where('page_name', 'home')->delete();

        $seo = new seo;
        $seo->page_name = 'home';
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            FlashMessageServiceProvide::setMessage(1, 'SEO Updateed Successfully');
            return redirect()->route('superAdmin.home.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'SEO Not Updateed Successfully');
            return back();
        }
    }

    public function home_about(){
        $about = about::first();
        return view('backend.home.about.index')->with(compact('about'));
    }
    public function home_about_update(Request $request){
        $oldban = about::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'point_1' => 'nullable|string|max:50|required_with:point_2',
                'point_2' => 'nullable|string|max:50|required_with:point_3',
                'point_3' => 'nullable|string|max:50|required_with:point_4',
                'point_4' => 'nullable|string|max:50',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'nullable|mimes:png,webp|dimensions:width=518,height=450',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'point_1' => 'nullable|string|max:50|required_with:point_2',
                'point_2' => 'nullable|string|max:50|required_with:point_3',
                'point_3' => 'nullable|string|max:50|required_with:point_4',
                'point_4' => 'nullable|string|max:50',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'required|mimes:png,webp|dimensions:width=518,height=450',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'ABO'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/about_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about = new about;
        $about->sub_title = $request->sub_title;
        $about->headline = $request->headline;
        $about->description = $request->description;
        $about->point_1 = $request->point_1;
        $about->point_2 = $request->point_2;
        $about->point_3 = $request->point_3;
        $about->point_4 = $request->point_4;
        $about->url = $request->url;
        $about->button_name = $request->button_name;
        $about->image = $filename;
        if($about->save()){
            FlashMessageServiceProvide::setMessage(1, 'About Updateed Successfully');
            return redirect()->route('superAdmin.home.about');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'About Not Updateed Successfully');
            return back();
        }
    }
    
    public function home_robo(){
        $robo = home_robo::first();
        return view('backend.home.robo.index')->with(compact('robo'));
    }
    public function home_robo_update(Request $request){
        $oldban = home_robo::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description_1' => 'string|required|max:300',
                'description_2' => 'string|nullable|max:300',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'nullable|mimes:png,webp|dimensions:width=703,height=565',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description_1' => 'string|required|max:300',
                'description_2' => 'string|nullable|max:300',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'required|mimes:png,webp|dimensions:width=703,height=565',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'ROB'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/robo_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $home_robo = new home_robo;
        $home_robo->sub_title = $request->sub_title;
        $home_robo->headline = $request->headline;
        $home_robo->description_1 = $request->description_1;
        $home_robo->description_2 = $request->description_2;
        $home_robo->url = $request->url;
        $home_robo->button_name = $request->button_name;
        $home_robo->image = $filename;
        if($home_robo->save()){
            FlashMessageServiceProvide::setMessage(1, 'Robo Updateed Successfully');
            return redirect()->route('superAdmin.home.robo');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Robo Not Updateed Successfully');
            return back();
        }
    }
    public function home_service(Request $request){
        $service = home_service::first();
        $service_list = home_service_list::get();
        $edit_service = '';
        if(isset($request->id)){
            $edit_service = home_service_list::where('id', $request->id)->first();
            if(!$edit_service){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.home.service');
            }
        }
        return view('backend.home.service.index')->with(compact('service', 'service_list', 'edit_service'));
    }
    public function home_service_update(Request $request){
        $oldban = home_service::first();
        $request->validate([
            'sub_title' => 'string|required|max:50',
            'headline' => 'string|required|max:150',
            'description' => 'string|required|max:500',
        ]);
        
        if($oldban){
            $oldban->delete();
        }

        $home_service = new home_service;
        $home_service->sub_title = $request->sub_title;
        $home_service->headline = $request->headline;
        $home_service->description = $request->description;
        if($home_service->save()){
            FlashMessageServiceProvide::setMessage(1, 'Service Updateed Successfully');
            return redirect()->route('superAdmin.home.service');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Service Updateed Successfully');
            return back();
        }
    }
    public function home_service_list_update(Request $request){
        $request->validate([
            'icon' => 'string|required|max:150',
            'title' => 'string|required|max:150',
            'service_description' => 'string|required|max:500',
            'status' => 'required',
            'url' => 'nullable|url|required_with:button_name',
            'button_name' => 'nullable|required_with:url',
        ]);
        
        if($request->id){
            $home_service = home_service_list::where('id', $request->id)->first();
            if(!$home_service){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.home.service');
            }
        } else {
            $home_service = new home_service_list;
        }
        if($request->status != 'Delete'){
            $home_service->icon = $request->icon;
            $home_service->title = $request->title;
            $home_service->description = $request->service_description;
            $home_service->status = $request->status;
            $home_service->url = $request->url;
            $home_service->button_name = $request->button_name;
        }
        $home_service->status = $request->status;
        if($home_service->save()){
            if($request->id && $request->status == 'Delete'){
                home_service_list::where('id', $request->id)->delete();
                FlashMessageServiceProvide::setMessage(1, 'Service Deleted Successfully');
            } else if($request->id){
                FlashMessageServiceProvide::setMessage(1, 'Service Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(1, 'Service Added Successfully');
            }
            return redirect()->route('superAdmin.home.service');
        } else {
            if($request->id && $request->status == 'Delete'){
                FlashMessageServiceProvide::setMessage(0, 'Service Not Deleted Successfully');
            } else if($request->id){
                FlashMessageServiceProvide::setMessage(0, 'Service Not Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(0, 'Service Not Added Successfully');
            }
            return back();
        }
    }
    public function home_secure_trading(){
        $secure_trading = home_secure_trading::first();
        return view('backend.home.secure_trading.index')->with(compact('secure_trading'));
    }
    public function home_secure_trading_update(Request $request){
        $oldban = home_secure_trading::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'point_1' => 'nullable|string|max:50|required_with:point_2',
                'point_2' => 'nullable|string|max:50|required_with:point_3',
                'point_3' => 'nullable|string|max:50|required_with:point_4',
                'point_4' => 'nullable|string|max:50',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'nullable|mimes:png,webp|dimensions:width=555,height=588',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'point_1' => 'nullable|string|max:50|required_with:point_2',
                'point_2' => 'nullable|string|max:50|required_with:point_3',
                'point_3' => 'nullable|string|max:50|required_with:point_4',
                'point_4' => 'nullable|string|max:50',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'required|mimes:png,webp|dimensions:width=555,height=588',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'STR'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/secure_trading_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $secure_trading = new home_secure_trading;
        $secure_trading->sub_title = $request->sub_title;
        $secure_trading->headline = $request->headline;
        $secure_trading->description = $request->description;
        $secure_trading->point_1 = $request->point_1;
        $secure_trading->point_2 = $request->point_2;
        $secure_trading->point_3 = $request->point_3;
        $secure_trading->point_4 = $request->point_4;
        $secure_trading->url = $request->url;
        $secure_trading->button_name = $request->button_name;
        $secure_trading->image = $filename;
        if($secure_trading->save()){
            FlashMessageServiceProvide::setMessage(1, 'Secure Trading Updateed Successfully');
            return redirect()->route('superAdmin.home.secure_trading');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Secure Trading Not Updateed Successfully');
            return back();
        }
    }
}
