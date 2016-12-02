<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function getNameAttribute($value){
        return $value;
        return strtoupper($value);
    }

    function socialProviders(){
      return $this->hasMany(SocialProvider::class);
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function isAdmin(){
        if( $this->role == 'Admin')
            $this->is_admin = true;

        return $this->is_admin;
    }

}
