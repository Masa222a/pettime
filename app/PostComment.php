<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostComment extends Model
{
    protected $fillable = [
        'body',
    ];
    
    protected $guarded = array('id');
    
    public static $rules = array(
      'body' => 'required|max:2000',
    );

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
