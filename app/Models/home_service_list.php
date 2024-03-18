<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class home_service_list extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'icon',
        'title',
        'description',
        'url',
        'button_name',
        'status',
    ];
}
