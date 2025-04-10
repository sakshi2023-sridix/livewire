<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function likes()
{
    return $this->hasMany(Like::class);
}
public function posts()
{
    return $this->hasMany(Post::class);
}
public function notifications()
{
    return $this->hasMany(Notification::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}
// User.php
public function followers()
{
    return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'follower_user_id');
}

public function following()
{
    return $this->belongsToMany(User::class, 'follows', 'follower_user_id', 'followed_user_id');
}

public function isFollowing($userId)
{
    return $this->following()->where('followed_user_id', $userId)->exists();
}

}
