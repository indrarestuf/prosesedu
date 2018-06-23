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
        'name', 'email', 'password','role', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
     // A user can send a laporan
    public function sent()
    {
        return $this->hasMany(Laporan::class, 'sender_id');
    }

    // A user can also receive a laporan
    public function received()
    {
        return $this->hasMany(Laporan::class, 'sent_to_id');
    }
    
   
        
    public function getGravatarAttribute()
    {
    $hash = md5(strtolower(trim($this->attributes['email'])));
    return "http://www.gravatar.com/avatar/$hash?d=identicon";
    }
    
    public function getRoleAttribute()
    {
    if ($this->attributes['role'] == 1 ){
        $role = 'Tutor';
    }
    elseif ($this->attributes['role'] == 2){
        $role = 'Murid';
    }
    else {
        $role = 'Admin';
    }
    return "$role";
    }
    
    /**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
    public function murids()
    {
    return $this->belongsToMany(User::class, 'muridlist', 'tutor_id', 'murid_id')->withTimestamps();
    }

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
    public function tutors()
    {
    return $this->belongsToMany(User::class, 'muridlist', 'murid_id', 'tutor_id')->withTimestamps();
    }
    
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
