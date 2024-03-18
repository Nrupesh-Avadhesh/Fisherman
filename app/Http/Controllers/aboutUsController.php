<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ about_us_banner, seo, about_us_mission, about_us_vision, about_us_count, about_us_values, about_us_finance };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class aboutUsController extends Controller
{
    public function about_us_banner(){
        $seo = seo::where('page_name', 'about')->first();
        $banner = about_us_banner::first();

        return view('backend.about_us.banner.index')->with(compact('seo', 'banner'));
    }
    public function about_us_banner_update(Request $request){
        $oldban = about_us_banner::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'sub_headline' => 'nullable|string|max:30',
               
                'image' => 'nullable|mimes:png,webp|dimensions:width=694,height=694',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'sub_headline' => 'nullable|string|max:30',
               
                'image' => 'required|mimes:png,webp|dimensions:width=694,height=694',
            ]);
        }

        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'ABAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_banner = new about_us_banner;
        $about_us_banner->sub_title = $request->sub_title;
        $about_us_banner->headline = $request->headline;
        $about_us_banner->sub_headline = $request->sub_headline;
        $about_us_banner->image = $filename;
        if($about_us_banner->save()){
            FlashMessageServiceProvide::setMessage(1, 'Banner Updateed Successfully');
            return redirect()->route('superAdmin.about_us.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Banner Not Updateed Successfully');
            return back();
        }
    }
    
    public function about_us_seo_update(Request $request){
        
        $request->validate([
            'title' => 'string|nullable|max:50',
            'description' => 'string|nullable',
            'keywords' => 'string|nullable|max:200',
        ]);
        
        seo::where('page_name', 'about')->delete();

        $seo = new seo;
        $seo->page_name = 'about';
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            FlashMessageServiceProvide::setMessage(1, 'SEO Updateed Successfully');
            return redirect()->route('superAdmin.about_us.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'SEO Not Updateed Successfully');
            return back();
        }
    }

    public function about_us_vision(){
        $vision = about_us_vision::first();

        return view('backend.about_us.vision.index')->with(compact('vision'));
    }
    public function about_us_vision_update(Request $request){
        $oldban = about_us_vision::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'nullable|mimes:png,webp|dimensions:width=498,height=491',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'required|mimes:png,webp|dimensions:width=498,height=491',
            ]);
        }
        // dd($request);
        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'VIS'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/vision_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_vision = new about_us_vision;
        $about_us_vision->sub_title = $request->sub_title;
        $about_us_vision->headline = $request->headline;
        $about_us_vision->description = $request->description;
        $about_us_vision->url = $request->url;
        $about_us_vision->button_name = $request->button_name;
        $about_us_vision->image = $filename;
        $about_us_vision->is_show = $request->is_show?'true':'false';
        if($about_us_vision->save()){
            FlashMessageServiceProvide::setMessage(1, 'Vision Updateed Successfully');
            return redirect()->route('superAdmin.about_us.vision');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Vision Not Updateed Successfully');
            return back();
        }
    }
    public function about_us_mission(){
        $mission = about_us_mission::first();

        return view('backend.about_us.mission.index')->with(compact('mission'));
    }
    public function about_us_mission_update(Request $request){
        $oldban = about_us_mission::first();
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'nullable|mimes:png,webp|dimensions:width=498,height=491',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'image' => 'required|mimes:png,webp|dimensions:width=498,height=491',
            ]);
        }
        // dd($request);
        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'MIS'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/mission_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_mission = new about_us_mission;
        $about_us_mission->sub_title = $request->sub_title;
        $about_us_mission->headline = $request->headline;
        $about_us_mission->description = $request->description;
        $about_us_mission->url = $request->url;
        $about_us_mission->button_name = $request->button_name;
        $about_us_mission->image = $filename;
        $about_us_mission->is_show = $request->is_show?'true':'false';
        if($about_us_mission->save()){
            FlashMessageServiceProvide::setMessage(1, 'Mission Updateed Successfully');
            return redirect()->route('superAdmin.about_us.mission');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Mission Not Updateed Successfully');
            return back();
        }
    }
    public function about_us_count(){
        $count = about_us_count::first();

        return view('backend.about_us.count.index')->with(compact('count'));
    }
    public function about_us_count_update(Request $request){
        
        $request->validate([
            'headline' => 'string|required|max:150',
            'sub_headline' => 'string|required|max:150',
            'name_1' => 'nullable|required_with:count_1,name_2',
            'count_1' => 'nullable|numeric|required_with:name_1,name_2',
            'name_2' => 'nullable|required_with:count_2,name_3',
            'count_2' => 'nullable|numeric|required_with:name_2,name_3',
            'name_3' => 'nullable|required_with:count_3,name_4',
            'count_3' => 'nullable|numeric|required_with:name_3,name_4',
            'name_4' => 'nullable|required_with:count_4',
            'count_4' => 'nullable|numeric|required_with:name_4',
        ]);
        
        $oldban = about_us_count::first();
        if($oldban){
            $oldban->delete();
        }

        $about_us_count = new about_us_count;
        $about_us_count->headline = $request->headline;
        $about_us_count->sub_headline = $request->sub_headline;
        $about_us_count->name_1 = $request->name_1;
        $about_us_count->count_1 = $request->count_1;
        $about_us_count->name_2 = $request->name_2;
        $about_us_count->count_2 = $request->count_2;
        $about_us_count->name_3 = $request->name_3;
        $about_us_count->count_3 = $request->count_3;
        $about_us_count->name_4 = $request->name_4;
        $about_us_count->count_4 = $request->count_4;
        if($about_us_count->save()){
            FlashMessageServiceProvide::setMessage(1, 'Count Updateed Successfully');
            return redirect()->route('superAdmin.about_us.count');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Count Not Updateed Successfully');
            return back();
        }
    }
    public function about_us_values(){
        $values = about_us_values::first();

        return view('backend.about_us.values.index')->with(compact('values'));
    }
    public function about_us_values_update(Request $request){
        
        $request->validate([
            'sub_title' => 'string|required|max:150',
            'headline' => 'string|required|max:150',
            'url' => 'nullable|url|required_with:button_name',
            'button_name' => 'nullable|required_with:url',
            'description' => 'string|required|max:500',
            'icon_1' => 'nullable|required_with:title_1,detail_1',
            'title_1' => 'nullable|string|required_with:icon_1,detail_1',
            'detail_1' => 'nullable|string|required_with:icon_1,title_1',
            'icon_2' => 'nullable|required_with:title_2,detail_2',
            'title_2' => 'nullable|string|required_with:icon_2,detail_2',
            'detail_2' => 'nullable|string|required_with:icon_2,title_2',
            'icon_3' => 'nullable|required_with:title_3,detail_3',
            'title_3' => 'nullable|string|required_with:icon_3,detail_3',
            'detail_3' => 'nullable|string|required_with:icon_3,title_3',
            'icon_4' => 'nullable|required_with:title_4,detail_4',
            'title_4' => 'nullable|string|required_with:icon_4,detail_4',
            'detail_4' => 'nullable|string|required_with:icon_4,title_4',
            
        ]);
        
        $oldban = about_us_values::first();
        if($oldban){
            $oldban->delete();
        }

        $about_us_values = new about_us_values;
        $about_us_values->sub_title = $request->sub_title;
        $about_us_values->headline = $request->headline;
        $about_us_values->url = $request->url;
        $about_us_values->button_name = $request->button_name;
        $about_us_values->description = $request->description;
        $about_us_values->icon_1 = $request->icon_1;
        $about_us_values->title_1 = $request->title_1;
        $about_us_values->detail_1 = $request->detail_1;
        $about_us_values->icon_2 = $request->icon_2;
        $about_us_values->title_2 = $request->title_2;
        $about_us_values->detail_2 = $request->detail_2;
        $about_us_values->icon_3 = $request->icon_3;
        $about_us_values->title_3 = $request->title_3;
        $about_us_values->detail_3 = $request->detail_3;
        $about_us_values->icon_4 = $request->icon_4;
        $about_us_values->title_4 = $request->title_4;
        $about_us_values->detail_4 = $request->detail_4;
        if($about_us_values->save()){
            FlashMessageServiceProvide::setMessage(1, 'Values Updateed Successfully');
            return redirect()->route('superAdmin.about_us.values');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Values Not Updateed Successfully');
            return back();
        }
    }

    public function about_us_finance(){
        $finance = about_us_finance::first();

        return view('backend.about_us.finance.index')->with(compact('finance'));
    }
    public function about_us_finance_update(Request $request){
        $oldban = about_us_finance::first();
        // dd($request->all());
        if($oldban){
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'address' => 'nullable|required_with:map_url,distance_minutes',
                'map_url' => 'url|nullable|required_with:distance_minutes,address',
                'distance_minutes' => 'nullable|required_with:map_url,address',
                'image' => 'nullable|mimes:png,webp|dimensions:width=581,height=581',
            ]);
        } else {
            $request->validate([
                'sub_title' => 'string|required|max:50',
                'headline' => 'string|required|max:150',
                'description' => 'string|required|max:500',
                'url' => 'nullable|url|required_with:button_name',
                'button_name' => 'nullable|required_with:url',
                'address' => 'nullable|required_with:map_url,distance_minutes',
                'map_url' => 'url|nullable|required_with:distance_minutes,address',
                'distance_minutes' => 'nullable|required_with:map_url,address',
                'image' => 'required|mimes:png,webp|dimensions:width=581,height=581',
            ]);
        }
        // dd($request);
        $filename = '';
        if($request->hasfile('image'))
        {
            $filename = 'FIN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/finance_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_finance = new about_us_finance;
        $about_us_finance->sub_title = $request->sub_title;
        $about_us_finance->headline = $request->headline;
        $about_us_finance->description = $request->description;
        $about_us_finance->url = $request->url;
        $about_us_finance->button_name = $request->button_name;
        $about_us_finance->image = $filename;
        $about_us_finance->address = $request->address;
        $about_us_finance->map_url = $request->map_url;
        $about_us_finance->distance_minutes = $request->distance_minutes;
        if($about_us_finance->save()){
            FlashMessageServiceProvide::setMessage(1, 'Finance Updateed Successfully');
            return redirect()->route('superAdmin.about_us.finance');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Finance Not Updateed Successfully');
            return back();
        }
    }
}
