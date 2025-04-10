<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'user_id', 'title', 'body', 'media_path','created_at','updated_at','location'
    ];
    public function likes()
{
    return $this->hasMany(Like::class);
}

public function comments()
{
    return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
}

public function user()
{
    return $this->belongsTo(User::class);
}


}
