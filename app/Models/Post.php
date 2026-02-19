<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'author',
        'image',
        'category_id',
        'status',
        'published_at',
        'unpublished_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function users()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function likes() {
    return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

   

    public function isLikedByUser($userId) {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function likeCount() {
        return $this->likes()->count();
    }

    public function commentCount() {
        return $this->comments()->count();
    }

  
}
