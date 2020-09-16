<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoComment extends Model
{
    protected $fillable = [
        'body',
    ];
    
    protected $guarded = array('id');
    
    public static $rules = array(
      'body' => 'required|max:2000',
    );
    
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
