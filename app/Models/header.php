<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class header extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_name',
        'menu_titel',
        'route_name',
        'is_sub_menu',
        'main_id',
        'is_show',
    ];

    // submenu
    public function submenu()
    {
        return $this->hasMany('App\Models\header', 'main_id', 'id')->where('is_show', 'true')->where('is_sub_menu', 'true')->select('id', 'main_id', 'menu_titel', 'route_name');
    }
    public function mainmenu()
    {
        return $this->hasOne('App\Models\header', 'id', 'main_id')->where('is_sub_menu', 'false')->select('id', 'main_id', 'menu_titel', 'page_name');
    }
}
