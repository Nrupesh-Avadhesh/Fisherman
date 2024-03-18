<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class about_us_count extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'headline',
        'sub_headline',
        'name_1',
        'count_1',
        'name_2',
        'count_2',
        'name_3',
        'count_3',
        'name_4',
        'count_4',
    ];
}
