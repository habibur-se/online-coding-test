<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'   
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
