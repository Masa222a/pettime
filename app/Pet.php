<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
      'name' => 'required',
      'type' => 'required',
      'gender' => 'required',
      );

}
