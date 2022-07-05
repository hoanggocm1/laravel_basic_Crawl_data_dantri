<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_post_name',
    ];

    public function ParentPostChildren()
    {
        return $this->hasMany(ParentPostChildren::class, 'parent_post_children_id', 'id');
    }
}
