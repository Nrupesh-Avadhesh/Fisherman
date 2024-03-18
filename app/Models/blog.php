<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'title',
        'author_name',
        'author_image',
        'date',
        'description',
        'description_1',
        'heading',
        'keywords',
        'label_image',
        'image',
        'status',
    ];
    // category
    public function category()
    {
        return $this->hasOne('App\Models\category', 'id', 'category_id')->select('id', 'name');
    }
}
