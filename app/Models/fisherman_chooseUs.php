<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fisherman_chooseUs extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sub_title',
        'headline',
        'description',
        'url',
        'button_name',
    ];
}
