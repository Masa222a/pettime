<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
      'image' => 'required|image|mimes:jpeg,jpggif.png',
      );

    public function pet()
    {
      return $this->belongsTo('App\Pet');
    }
}
