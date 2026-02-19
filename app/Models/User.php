<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function audit_trail()
    {
        return $this->hasMany(AuditTrail::class);
    }


    public function log($message)

    {
        $message = ucwords($message);

        $data = [
            'user_id' => $this->id,
            'name' => $this->name,
            'date' => \Carbon\Carbon::parse(now())->toDateString(),
            'activity' => "{$this->name} $message"

        ];
        AuditTrail::query()->create($data);
    }


    public function likes() {
    return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }


    public function posts()
    {
        return $this->hasMany(Post::class, 'author');
    }

    public function replies()
    {
        return $this->hasMany(ForumReply::class);
    }


}
