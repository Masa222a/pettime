<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_id', 'user_id'];
    
    public static $rules = array(
      'title' => 'required|max:20',    
      'body' => 'required',
    );
    
    public function postcomments()
    {
      return $this->hasMany('App\PostComment');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
