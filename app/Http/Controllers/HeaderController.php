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

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = header::with(['mainmenu'])->get();

        return view('backend.setting.header.index')->with(compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $main_menu = header::where('is_sub_menu', 'false')->where('id', '!=',$request->id)->pluck('page_name','id');
        $menu = header::where('id', $request->id)->first();
        if(!$menu){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('superAdmin.setting.header');
        }
        return view('backend.setting.header.edit')->with(compact('main_menu', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if(!$request->id){
            FlashMessageServiceProvide::setMessage(0, 'Data not found');
            return redirect()->route('superAdmin.setting.header');
        } else {
            $menu = header::where('id', $request->id)->first();
            if(!$menu){
                FlashMessageServiceProvide::setMessage(0, 'Data not found');
                return redirect()->route('superAdmin.setting.header');
            }
        }
        if($request->is_sub_menu == 'false'){
            $request->validate([
                'menu_titel' => 'string|required|max:15',
                'is_sub_menu' => 'required',
                'is_show' => 'required',
            ]);
        } else {
            $request->validate([
                'menu_titel' => 'string|required|max:15',
                'is_sub_menu' => 'required',
                'main_id' => 'required',
                'is_show' => 'required',
            ]);
        }

        $menu->menu_titel = $request->menu_titel;
        $menu->is_sub_menu = $request->is_sub_menu;
        if($request->is_sub_menu == 'false'){
            $menu->main_id = null;
        } else {
            $menu->main_id = $request->main_id;
        }
        $menu->is_show = $request->is_show;
        if($menu->save()){
            FlashMessageServiceProvide::setMessage(1, 'Menu Updated Successfully');
            return redirect()->route('superAdmin.setting.header');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Menu Not Updated Successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(header $header)
    {
        //
    }
}
