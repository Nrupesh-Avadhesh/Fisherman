<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sitelogo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'fav_icon',
        'login_logo',
    ];
}