<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ faq, seo, faq_banner };
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;

class faqController extends Controller
{
    public function faq_banner(){
        $seo = seo::where('page_name', 'faq')->first();
        $banner = faq_banner::first();

        return view('backend.faq.banner.index')->with(compact('seo', 'banner'));
    }
    public function faq_banner_update(Request $request){
        $oldban = faq_banner::first();
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
            $filename = 'FBAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_banner = new faq_banner;
        $about_us_banner->sub_title = $request->sub_title;
        $about_us_banner->headline = $request->headline;
        $about_us_banner->sub_headline = $request->sub_headline;
        $about_us_banner->image = $filename;
        if($about_us_banner->save()){
            FlashMessageServiceProvide::setMessage(1, 'Banner Updateed Successfully');
            return redirect()->route('superAdmin.faq.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Banner Not Updateed Successfully');
            return back();
        }
    }
    
    public function faq_seo_update(Request $request){
        
        $request->validate([
            'title' => 'string|nullable|max:50',
            'description' => 'string|nullable',
            'keywords' => 'string|nullable|max:200',
        ]);
        
        seo::where('page_name', 'faq')->delete();

        $seo = new seo;
        $seo->page_name = 'faq';
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            FlashMessageServiceProvide::setMessage(1, 'SEO Updateed Successfully');
            return redirect()->route('superAdmin.faq.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'SEO Not Updateed Successfully');
            return back();
        }
    }

    public function faq_list(Request $request){
        $faq_list = faq::get();
        $edit_faq = '';
        if(isset($request->id)){
            $edit_faq = faq::where('id', $request->id)->first();
            if(!$edit_faq){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.faq.list');
            }
        }
        return view('backend.faq.index')->with(compact('edit_faq', 'faq_list'));
    }
    public function faq_list_update(Request $request){
        $request->validate([
            'question' => 'string|required|max:120',
            'answer' => 'string|required|max:600',
            'status' => 'required',
        ]);
        
        if($request->id){
            $faq = faq::where('id', $request->id)->first();
            if(!$faq){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.faq.list');
            }
        } else {
            $faq = new faq;
        }
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        if($faq->save()){
           if($request->id){
                FlashMessageServiceProvide::setMessage(1, 'FAQ Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(1, 'FAQ Added Successfully');
            }
            return redirect()->route('superAdmin.faq.list');
        } else {
            if($request->id){
                FlashMessageServiceProvide::setMessage(0, 'FAQ Not Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(0, 'FAQ Not Added Successfully');
            }
            return back();
        }
    }
}
