<?php

namespace App\Http\Controllers;

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

class blogController extends Controller
{
    public function blog_banner(){
        $seo = seo::where('page_name', 'blog')->first();
        $banner = blog_banner::first();

        return view('backend.blog.banner.index')->with(compact('seo', 'banner'));
    }
    public function blog_banner_update(Request $request){
        $oldban = blog_banner::first();
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
            $filename = 'BBAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner_img'), $filename);
        }
        
        if(!$filename && $oldban){
            $filename = $oldban->image;
        }
        if($oldban){
            $oldban->delete();
        }

        $about_us_banner = new blog_banner;
        $about_us_banner->sub_title = $request->sub_title;
        $about_us_banner->headline = $request->headline;
        $about_us_banner->sub_headline = $request->sub_headline;
        $about_us_banner->image = $filename;
        if($about_us_banner->save()){
            FlashMessageServiceProvide::setMessage(1, 'Banner Updateed Successfully');
            return redirect()->route('superAdmin.blog.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Banner Not Updateed Successfully');
            return back();
        }
    }
    
    public function blog_seo_update(Request $request){
        
        $request->validate([
            'title' => 'string|nullable|max:50',
            'description' => 'string|nullable',
            'keywords' => 'string|nullable|max:200',
        ]);
        
        seo::where('page_name', 'blog')->delete();

        $seo = new seo;
        $seo->page_name = 'blog';
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        if($seo->save()){
            FlashMessageServiceProvide::setMessage(1, 'SEO Updateed Successfully');
            return redirect()->route('superAdmin.blog.banner');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'SEO Not Updateed Successfully');
            return back();
        }
    }

    public function blog_category(Request $request){
        $category_list = category::get();
        $edit_category = '';
        if(isset($request->id)){
            $edit_category = category::where('id', $request->id)->first();
            if(!$edit_category){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.blog.category');
            }
        }
        return view('backend.blog.category.index')->with(compact('category_list', 'edit_category'));
    }
    public function blog_category_update(Request $request){
        $request->validate([
            'name' => 'string|required|max:150',
            'description' => 'string|required|max:500',
            'status' => 'required',
        ]);
        
        if($request->id){
            $category = category::where('id', $request->id)->first();
            if(!$category){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.home.service');
            }
            // category::where('id', $request->id)->delete();
        } else {
            $category = new category;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        if($category->save()){
           if($request->id){
                FlashMessageServiceProvide::setMessage(1, 'Category Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(1, 'Category Added Successfully');
            }
            return redirect()->route('superAdmin.blog.category');
        } else {
            if($request->id){
                FlashMessageServiceProvide::setMessage(0, 'Choose Us Not Updated Successfully');
            } else {
                FlashMessageServiceProvide::setMessage(0, 'Choose Us Not Added Successfully');
            }
            return back();
        }
    }

    public function blog_index(){
        $blog = blog::with(['category'])->get();

        return view('backend.blog.blog.index')->with(compact('blog'));
    }
    public function blog_add(){
        $category = category::where('status', 'Active')->pluck('name','id');

        return view('backend.blog.blog.crate')->with(compact('category'));
    }
    public function blog_store(Request $request){
        $request->validate([
            'title' => 'string|required|max:300',
            'status' => 'required',
            'category_id' => 'required',
            'heading' => 'string|required|max:400',
            'label_image' => 'required|mimes:png,webp,jpg,jpeg|dimensions:width=690,height=460',
            'image' => 'required|mimes:png,webp,jpg,jpeg|dimensions:width=720,height=386',
            'description_1' => 'string|required',
            'author_name' => 'string|nullable|max:200|required_with:author_image',
            'author_image' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=690,height=690|required_with:author_name',
            'keywords' => 'string|required|max:400',
            'description' => 'string|required|max:800',
        ]);

        $label_image = '';
        if($request->hasfile('label_image'))
        {
            $label_image = 'LBAN'.date('dHmiys').'.'.$request->label_image->extension();  
            $request->label_image->move(public_path('uploads/blog_img'), $label_image);
        }
        $image = '';
        if($request->hasfile('image'))
        {
            $image = 'BBAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/blog_img'), $image);
        }
        $author_image = '';
        if($request->hasfile('author_image'))
        {
            $author_image = 'ABAN'.date('dHmiys').'.'.$request->author_image->extension();  
            $request->author_image->move(public_path('uploads/blog_img'), $author_image);
        }

        $blog = new blog;
        $blog->title = $request->title;
        $blog->status = $request->status;
        $blog->category_id = $request->category_id;
        $blog->heading = $request->heading;
        $blog->image = $image;
        $blog->label_image = $label_image;
        $blog->description_1 = $request->description_1;
        $blog->author_name = $request->author_name;
        $blog->author_image = $author_image;
        $blog->keywords = $request->keywords;
        $blog->description = $request->description;
        $blog->date = date('Y-m-d H:i:s');
        if($blog->save()){
            FlashMessageServiceProvide::setMessage(1, 'Blog Added Successfully');
            return redirect()->route('superAdmin.blog.blog');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Blog Not Added Successfully');
        }
        return back();
    }
    
    public function blog_edit(Request $request){
        $category = category::where('status', 'Active')->pluck('name','id');
        $blog = blog::where('id', $request->id)->first();
        if(!$blog){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('superAdmin.blog.blog');
        }
        return view('backend.blog.blog.edit')->with(compact('category', 'blog'));
    }

    public function blog_update(Request $request){
        if(!$request->id){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('superAdmin.blog.blog');
        } else {
            $blog = blog::where('id', $request->id)->first();
            if(!$blog){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.blog.blog');
            }
        }
        $request->validate([
            'title' => 'string|required|max:300',
            'status' => 'required',
            'category_id' => 'required',
            'heading' => 'string|required|max:400',
            'label_image' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=690,height=460',
            'image' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=720,height=386',
            'description_1' => 'string|required',
            'author_name' => 'string|nullable|max:200|required_with:author_image',
            'author_image' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=690,height=690|required_with:author_name',
            'keywords' => 'string|required|max:400',
            'description' => 'string|required|max:800',
        ]);

        $label_image = '';
        if($request->hasfile('label_image'))
        {
            $label_image = 'LBAN'.date('dHmiys').'.'.$request->label_image->extension();  
            $request->label_image->move(public_path('uploads/blog_img'), $label_image);
        }
        $image = '';
        if($request->hasfile('image'))
        {
            $image = 'BBAN'.date('dHmiys').'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/blog_img'), $image);
        }
        $author_image = '';
        if($request->hasfile('author_image'))
        {
            $author_image = 'ABAN'.date('dHmiys').'.'.$request->author_image->extension();  
            $request->author_image->move(public_path('uploads/blog_img'), $author_image);
        }

        $blog = blog::where('id', $request->id)->first();
        $blog->title = $request->title;
        $blog->status = $request->status;
        $blog->category_id = $request->category_id;
        $blog->heading = $request->heading;
        if($image){
            $blog->image = $image;
        }
        if($label_image){
            $blog->label_image = $label_image;
        }
        $blog->description_1 = $request->description_1;
        $blog->author_name = $request->author_name;
        if($author_image){
            $blog->author_image = $author_image;
        }
        $blog->keywords = $request->keywords;
        $blog->description = $request->description;
        if($blog->save()){
            FlashMessageServiceProvide::setMessage(1, 'Blog Update Successfully');
            return redirect()->route('superAdmin.blog.blog');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Blog Not Update Successfully');
        }
        return back();
    }
}
