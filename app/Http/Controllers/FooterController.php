<?php

namespace App\Http\Controllers;

use App\Models\header;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\{ blog_banner, seo, category, blog};
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Hash;
use App\Providers\FlashMessageServiceProvide;
use App\Models\social_media;
use App\Models\footer;

class FooterController extends Controller
{
    public function index(Request $request){
        $footer = footer::first();
        $social_media = social_media::get();
        $edit_social_media = '';
        if(isset($request->id)){
            $edit_social_media = social_media::where('id', $request->id)->first();
            if(!$edit_social_media){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.setting.footer');
            }
        }
        return view('backend.setting.footer.index')->with(compact('footer', 'social_media', 'edit_social_media'));
    }
    public function footer_update(Request $request){
        $oldban = footer::first();
        $request->validate([
            'email' => 'string|email|required|max:200',
            'copyright' => 'string|required|max:150',
            'about' => 'string|required|max:200',
        ]);
        
        if($oldban){
            $oldban->delete();
        }

        $footer = new footer;
        $footer->email = $request->email;
        $footer->copyright = $request->copyright;
        $footer->about = $request->about;
        if($footer->save()){
            FlashMessageServiceProvide::setMessage(1, 'Footer Updateed Successfully');
            return redirect()->route('superAdmin.setting.footer');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Footer Updateed Successfully');
            return back();
        }
    }
    public function social_media_update(Request $request){
        $request->validate([
            'icon' => 'string|required|max:150|required_with:url',
            'is_show' => 'required',
            'url' => 'nullable|url|required_with:icon',
        ]);
        
        if($request->id){
            $social_media = social_media::where('id', $request->id)->first();
            if(!$social_media){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.setting.footer');
            }
        } else {
            $social_media = new social_media;
        }
        $social_media->icon = $request->icon;
        $social_media->url = $request->url;
        $social_media->is_show = $request->is_show;
        if($social_media->save()){
            if($request->id){
                FlashMessageServiceProvide::setMessage(1, 'Social Media Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(1, 'Social Media Added Successfully');
            }
            return redirect()->route('superAdmin.setting.footer');
        } else {
            if($request->id){
                FlashMessageServiceProvide::setMessage(0, 'Social Media Not Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(0, 'Social Media Not Added Successfully');
            }
            return back();
        }
    }
}
