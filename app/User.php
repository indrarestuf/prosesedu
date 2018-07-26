<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\RateableTrait;

class User extends Authenticatable
{
    use RateableTrait;
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
    
  public function laporans()
    {
        return $this->belongsToMany('App\Laporan')->withTimestamps();
    }
    
      public function jawabans()
    {
        return $this->belongsToMany('App\Jawaban')->withTimestamps();
    }
    
    public function infos()
    {
        return $this->belongsToMany('App\Info')->withTimestamps();
    }
    public function komentars()
    {
        return $this->belongsToMany('App\Komentar')->withTimestamps();
    }
        
    public function getGravatarAttribute()
    {
    $hash = md5(strtolower(trim($this->attributes['email'])));
    return "https://www.gravatar.com/avatar/$hash?d=robohash&f=y";
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
    
    public function rate()
    {
        return $this->hasOne('App\Rate');
    }
}
