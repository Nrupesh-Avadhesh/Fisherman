<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class home_service extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sub_title',
        'headline',
        'description',
    ];
}
