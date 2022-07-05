<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentPostChildren extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_post_children_name',
        'name_slug',
        'parent_post_children_id',
    ];
    public function ParentPost()
    {
        return $this->hasMany(Post::class, 'parent_post_children_slug', 'name_slug');
    }
}
