<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'post_body',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
