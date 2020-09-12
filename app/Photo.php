<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
      'image' => 'image|file',
      );

    public function pets()
    {
      return $this->hasMany('App\Pets');
    }
}
