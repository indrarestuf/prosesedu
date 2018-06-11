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
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isAdmin(){
        if ($this->role == 0) return true;
        return false;
        }
        
            public function isTutor(){
        if ($this->role == 1) return true;
        return false;
        }
        
            public function isMurid(){
        if ($this->role == 2) return true;
        return false;
        }
        
    public function getGravatarAttribute()
{
    $hash = md5(strtolower(trim($this->attributes['email'])));
    return "http://www.gravatar.com/avatar/$hash?d=identicon";
}
}
