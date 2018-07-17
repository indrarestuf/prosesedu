<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $fillable = [
  	'sekolah', 'kelas', 'ortu', 'info'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
