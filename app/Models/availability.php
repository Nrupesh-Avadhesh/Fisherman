<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class availability extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'is_available',
        'start_time',
        'end_time',
        'duration',
    ];
}
