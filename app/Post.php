<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
      'title' => 'required|max:50',    
      'body' => 'required|max:2000',
    );
    
    public function comments()
    {
      return $this->hasMany('App\PostComment');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
