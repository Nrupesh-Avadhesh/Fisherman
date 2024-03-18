<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class demo_call extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'investment_amount',
        'date',
        'time',
        'new_date',
        'new_time',
        'uuid_call',
        'id_call',
        'start_time',
        'join_url',
        'password',
        'status',
    ];
}
