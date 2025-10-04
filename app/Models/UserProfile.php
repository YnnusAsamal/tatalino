<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'image',
        'user_description',
        'bio',
        'hobby',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
