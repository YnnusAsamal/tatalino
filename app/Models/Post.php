<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;


class Post extends Model
{
    use HasFactory;
    use HasRichText;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'author',
        'image',
        'category',
        'status',
        'published_at',
        'unpublished_at'
    ];

    protected $richTextFields = [
        'content',
    ];

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

    
}
