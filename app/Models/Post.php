<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Sử dụng trong bài Commands
    use HasFactory;
    protected $fillable = [
        'title',
        'title_slug',
        'content',
        'description',
        'image_zoom_post',
        'image_thumb_post',
        'parent_post_children_slug',
        'status',
    ];
}
