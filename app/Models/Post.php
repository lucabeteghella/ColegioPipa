<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image_id',
        'category_id',
        'tag_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
