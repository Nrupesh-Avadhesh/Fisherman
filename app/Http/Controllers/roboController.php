<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ fisherman_banner, seo, fisherman_chooseUs, fisherman_chooseUs_list, fisherman_service, fisherman_key_features, fisherman_static };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class roboController extends Controller
{
    public function fisherman_banner(){
        $seo = seo::where('page_name', 'robo')->first();
        $banner = fisherman_banner::first();

        return view('backend.fisherman.banner.index')->with(compact('seo', 'banner'));
    }
    
    public function fisherman_banner_update(Request $request){
        $oldban = fisherman_banner::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'nullable|string|max:100',
                'youtube_url' => 'nullable|url',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'nullable|mimes:png,webp|dimensions:width=591,height=713',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'nullable|string|max:100',
                'youtube_url' => 'nullable|url',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'required|mimes:png,webp|dimensions:width=591,height=713',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'FBAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $banner = new fisherman_banner;
        $banner->sub_title = $request->sub_title;
        $banner->headline = $request->headline;
        $banner->description = $request->description;
        $banner->youtube_url = $request->youtube_url;
        $banner->url = $request->url;
        $banner->button_name = $request->button_name;
        $banner->image = $filename;
        if($banner->save()){
            FlashMessageServiceProvide::setMessage(1, 'Banner Updateed Successfully');
            return redirect()->route('superAdmin.whyFisherman.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Banner Not Updateed Successfully');
            return back();
        }
    }

    public function fisherman_seo_update(Request $request){
        $request->validate([
            'title' => 'string|nullable|max:50',
            'description' => 'string|nullable|max:200',
            'keywords' => 'string|nullable|max:200',
        ]);
        
        seo::where('page_name', 'robo')->delete();

        $seo = new seo;
        $seo->page_name = 'robo';
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            FlashMessageServiceProvide::setMessage(1, 'SEO Updateed Successfully');
            return redirect()->route('superAdmin.whyFisherman.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'SEO Not Updateed Successfully');
            return back();
        }
    }

    public function fisherman_chooseUs(Request $request){
        $chooseUs = fisherman_chooseUs::first();
        $chooseUs_list = fisherman_chooseUs_list::get();
        $edit_chooseUs = '';
        if(isset($request->id)){
            $edit_chooseUs = fisherman_chooseUs_list::where('id', $request->id)->first();
            if(!$edit_chooseUs){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.whyFisherman.chooseUs');
            }
        }
        return view('backend.fisherman.chooseUs.index')->with(compact('chooseUs', 'chooseUs_list', 'edit_chooseUs'));
    }
    public function fisherman_chooseUs_update(Request $request){
        $oldban = fisherman_chooseUs::first();
        $request->validate([
            'sub_title' => 'string|required|max:50',
            'headline' => 'string|required|max:150',
            'description' => 'string|required|max:500',
            'url' => 'nullable|url|required_with:button_name',
            'button_name' => 'nullable|required_with:url',
        ]);
        
        if($oldban){
            $oldban->delete();
        }

        $home_service = new fisherman_chooseUs;
        $home_service->sub_title = $request->sub_title;
        $home_service->headline = $request->headline;
        $home_service->description = $request->description;
        $home_service->url = $request->url;
        $home_service->button_name = $request->button_name;
        if($home_service->save()){
            FlashMessageServiceProvide::setMessage(1, 'Service Updateed Successfully');
            return redirect()->route('superAdmin.whyFisherman.chooseUs');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Service Updateed Successfully');
            return back();
        }
    }
    public function fisherman_chooseUs_list_update(Request $request){
        $request->validate([
            'icon' => 'string|required|max:150',
            'title' => 'string|required|max:150',
            'details' => 'string|required|max:500',
            'status' => 'required',
        ]);
        
        if($request->id){
            $fisherman_chooseUs = fisherman_chooseUs_list::where('id', $request->id)->first();
            if(!$fisherman_chooseUs){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.home.service');
            }
        } else {
            $fisherman_chooseUs = new fisherman_chooseUs_list;
        }
        if($request->status != 'Delete'){
            $fisherman_chooseUs->icon = $request->icon;
            $fisherman_chooseUs->title = $request->title;
            $fisherman_chooseUs->description = $request->details;
            $fisherman_chooseUs->status = $request->status;
        }
        $fisherman_chooseUs->status = $request->status;
        if($fisherman_chooseUs->save()){
            if($request->id && $request->status == 'Delete'){
                fisherman_chooseUs_list::where('id', $request->id)->delete();
                FlashMessageServiceProvide::setMessage(1, 'Choose Us Deleted Successfully');
            } else if($request->id){
                FlashMessageServiceProvide::setMessage(1, 'Choose Us Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(1, 'Choose Us Added Successfully');
            }
            return redirect()->route('superAdmin.whyFisherman.chooseUs');
        } else {
            if($request->id && $request->status == 'Delete'){
                FlashMessageServiceProvide::setMessage(0, 'Choose Us Not Deleted Successfully');
            } else if($request->id){
                FlashMessageServiceProvide::setMessage(0, 'Choose Us Not Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(0, 'Choose Us Not Added Successfully');
            }
            return back();
        }
    }
    public function fisherman_service(){
        $service = fisherman_service::first();

        return view('backend.fisherman.service.index')->with(compact('service'));
    }
    
    public function fisherman_service_update(Request $request){
        $oldban = fisherman_service::first();
        $request->validate([
            'sub_title' => 'string|required|max:50',
            'headline' => 'string|required|max:150',
            'url' => 'nullable|url|required_with:button_name',
            'button_name' => 'nullable|required_with:url',
            'icon_1' => 'nullable|required_with:title_1,url_1,button_name_1,detail_1',
            'title_1' => 'nullable|required_with:icon_1,url_1,button_name_1,detail_1',
            'detail_1' => 'nullable|required_with:icon_1,title_1,button_name_1,url_1',
            'url_1' => 'nullable|url|required_with:button_name_1',
            'button_name_1' => 'nullable|required_with:url_1',
            'icon_2' => 'nullable|required_with:title_2,url_2,button_name_2,detail_2',
            'title_2' => 'nullable|required_with:icon_2,url_2,button_name_2,detail_2',
            'detail_2' => 'nullable|required_with:icon_2,title_2,button_name_2,url_2',
            'url_2' => 'nullable|url|required_with:button_name_2',
            'button_name_2' => 'nullable|required_with:url_2',
            'icon_3' => 'nullable|required_with:title_3,url_3,button_name_3,detail_3',
            'title_3' => 'nullable|required_with:icon_3,url_3,button_name_3,detail_3',
            'detail_3' => 'nullable|required_with:icon_3,title_3,button_name_3,url_3',
            'url_3' => 'nullable|url|required_with:button_name_3',
            'button_name_3' => 'nullable|required_with:url_3',
        ]);
        

        if($oldban){
            $oldban->delete();
        }

        $service = new fisherman_service;
        $service->sub_title = $request->sub_title;
        $service->headline = $request->headline;
        $service->url = $request->url;
        $service->button_name = $request->button_name;
        $service->icon_1 = $request->icon_1;
        $service->title_1 = $request->title_1;
        $service->detail_1 = $request->detail_1;
        $service->url_1 = $request->url_1;
        $service->button_name_1 = $request->button_name_1;
        $service->icon_2 = $request->icon_2;
        $service->title_2 = $request->title_2;
        $service->detail_2 = $request->detail_2;
        $service->url_2 = $request->url_2;
        $service->button_name_2 = $request->button_name_2;
        $service->icon_3 = $request->icon_3;
        $service->title_3 = $request->title_3;
        $service->detail_3 = $request->detail_3;
        $service->url_3 = $request->url_3;
        $service->button_name_3 = $request->button_name_3;
        if($service->save()){
            FlashMessageServiceProvide::setMessage(1, 'Service Updateed Successfully');
            return redirect()->route('superAdmin.whyFisherman.service');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Service Not Updateed Successfully');
            return back();
        }
    }
    public function fisherman_key_features(){
        $key_features = fisherman_key_features::first();

        return view('backend.fisherman.key_features.index')->with(compact('key_features'));
    }
    
    public function fisherman_key_features_update(Request $request){
        $oldban = fisherman_key_features::first();
        $request->validate([
            'sub_title' => 'string|required|max:50',
            'headline' => 'string|required|max:150',
            'description' => 'string|required|max:500',
            'url' => 'nullable|url|required_with:button_name',
            'button_name' => 'nullable|required_with:url',
            'icon_1' => 'nullable|required_with:title_1,detail_1',
            'title_1' => 'nullable|required_with:icon_1,detail_1',
            'detail_1' => 'nullable|required_with:icon_1,title_1',
            'icon_2' => 'nullable|required_with:title_2,detail_2',
            'title_2' => 'nullable|required_with:icon_2,detail_2',
            'detail_2' => 'nullable|required_with:icon_2,title_2',
            'icon_3' => 'nullable|required_with:title_3,detail_3',
            'title_3' => 'nullable|required_with:icon_3,detail_3',
            'detail_3' => 'nullable|required_with:icon_3,title_3',
            'icon_4' => 'nullable|required_with:title_4,detail_4',
            'title_4' => 'nullable|required_with:icon_4,detail_4',
            'detail_4' => 'nullable|required_with:icon_4,title_4',
        ]);
        

        if($oldban){
            $oldban->delete();
        }

        $key_features = new fisherman_key_features;
        $key_features->sub_title = $request->sub_title;
        $key_features->headline = $request->headline;
        $key_features->url = $request->url;
        $key_features->button_name = $request->button_name;
        $key_features->description = $request->description;
        $key_features->icon_1 = $request->icon_1;
        $key_features->title_1 = $request->title_1;
        $key_features->detail_1 = $request->detail_1;
        $key_features->icon_2 = $request->icon_2;
        $key_features->title_2 = $request->title_2;
        $key_features->detail_2 = $request->detail_2;
        $key_features->icon_3 = $request->icon_3;
        $key_features->title_3 = $request->title_3;
        $key_features->detail_3 = $request->detail_3;
        $key_features->icon_4 = $request->icon_4;
        $key_features->title_4 = $request->title_4;
        $key_features->detail_4 = $request->detail_4;
        if($key_features->save()){
            FlashMessageServiceProvide::setMessage(1, 'Key Features Updateed Successfully');
            return redirect()->route('superAdmin.whyFisherman.key_features');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Key Features Not Updateed Successfully');
            return back();
        }
    }

    public function fisherman_static(){
        $static = fisherman_static::first();
        return view('backend.fisherman.static.index')->with(compact('static'));
    }
    public function fisherman_static_update(Request $request){
        $oldban = fisherman_static::first();
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
                'image' => 'nullable|mimes:png,webp|dimensions:width=596,height=539',
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
                'image' => 'required|mimes:png,webp|dimensions:width=596,height=539',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'STA'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/static_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about = new fisherman_static;
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
            FlashMessageServiceProvide::setMessage(1, 'Static Updateed Successfully');
            return redirect()->route('superAdmin.whyFisherman.static');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Static Not Updateed Successfully');
            return back();
        }
    }
}
