<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fisherman_service extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sub_title',
        'headline',
        'url',
        'button_name',
        'icon_1',
        'title_1',
        'detail_1',
        'url_1',
        'button_name_1',
        'icon_2',
        'title_2',
        'detail_2',
        'url_2',
        'button_name_2',
        'icon_3',
        'title_3',
        'detail_3',
        'url_3',
        'button_name_3',
    ];
}
