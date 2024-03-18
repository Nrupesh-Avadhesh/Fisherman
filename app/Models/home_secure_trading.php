<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class home_secure_trading extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sub_title',
        'headline',
        'description',
        'point_1',
        'point_2',
        'point_3',
        'point_4',
        'image',
        'url',
        'button_name',
    ];
}
