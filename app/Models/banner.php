<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class banner extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sub_title',
        'headline',
        'sub_headline_1',
        'sub_headline_2',
        'sub_headline_3',
        'offer_line',
        'offer_count',
        'image',
    ];
}
