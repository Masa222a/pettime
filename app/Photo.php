<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['pet_id', 'user_id'];
    
    public static $rules = array(
      'image' =>  [
          'required',
          'image',
          'mimes:jpeg,jpg,gif,png',
        ]
      );

    public function pet()
    {
      return $this->belongsTo('App\Pet');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function photocomments()
    {
      return $this->belongsTo('App\PhotoComment');
    }
}
