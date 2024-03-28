<?php

namespace App\Http\Controllers;

use App\Models\sitelogo;
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

class SitelogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sitelogo = sitelogo::first();

        return view('backend.setting.sitelogo.index')->with(compact('sitelogo'));
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
    public function show(sitelogo $sitelogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sitelogo $sitelogo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'header_logo' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=1932,height=574',
            'footer_logo' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=1932,height=574',
            'fav_icon' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=30,height=30',
            'login_logo' => 'nullable|mimes:png,webp,jpg,jpeg|dimensions:width=200,height=200',
        ]);

        $header_logo = '';
        if($request->hasfile('header_logo'))
        {
            $header_logo = 'HLI'.date('dHmiys').'.'.$request->header_logo->extension();  
            $request->header_logo->move(public_path('uploads/logo'), $header_logo);
        }
        $footer_logo = '';
        if($request->hasfile('footer_logo'))
        {
            $footer_logo = 'FLI'.date('dHmiys').'.'.$request->footer_logo->extension();  
            $request->footer_logo->move(public_path('uploads/logo'), $footer_logo);
        }
        $fav_icon = '';
        if($request->hasfile('fav_icon'))
        {
            $fav_icon = 'FII'.date('dHmiys').'.'.$request->fav_icon->extension();  
            $request->fav_icon->move(public_path('uploads/logo'), $fav_icon);
        }
        $login_logo = '';
        if($request->hasfile('login_logo'))
        {
            $login_logo = 'LLI'.date('dHmiys').'.'.$request->login_logo->extension();  
            $request->login_logo->move(public_path('uploads/logo'), $login_logo);
        }
        $sitelogo = sitelogo::first();
        if($header_logo){
            $sitelogo->header_logo = $header_logo;
        }
        if($footer_logo){
            $sitelogo->footer_logo = $footer_logo;
        }
        if($fav_icon){
            $sitelogo->fav_icon = $fav_icon;
        }
        if($login_logo){
            $sitelogo->login_logo = $login_logo;
        }
        if($sitelogo->save()){
            FlashMessageServiceProvide::setMessage(1, 'Logo Update Successfully');
            return redirect()->route('superAdmin.setting.logo');
        } else {
            FlashMessageServiceProvide::setMessage(0, 'Logo Not Update Successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sitelogo $sitelogo)
    {
        //
    }
}
