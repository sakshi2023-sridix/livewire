<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = [
        'id','type', 'notifiable_id', 'notifiable_type', 'data', 'read_at'
    ];
    public function scopeUnread($query)
{
    return $query->whereNull('read_at');
}
}
