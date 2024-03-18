<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class about_us_values extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sub_title',
        'headline',
        'description',
        'url',
        'button_name',
        'icon_1',
        'title_1',
        'detail_1',
        'icon_2',
        'title_2',
        'detail_2',
        'icon_3',
        'title_3',
        'detail_3',
        'icon_4',
        'title_4',
        'detail_4',
    ];
}
