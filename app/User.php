<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    

    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'gender' => 'required|in:m,f,others',
    );
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts() 
    {
        return $this->hasMany('App\Post');
    }
        
    public function pets()
    {
      return $this->hasMany('App\Pets');
    }
    
    public function photos()
    {
      return $this->hasMany('App\Photos');
    }
    
}
