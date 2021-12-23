<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'slug',
        'likes',
        'content'
    ];

    protected $casts = [
        'likes' => 'integer',
    ];
}
