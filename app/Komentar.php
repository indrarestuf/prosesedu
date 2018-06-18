<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
        
    protected $fillable = [
  	'user_id', 'laporan_id', 'isi'
    ];

        public function user()
    {
    	return $this->belongsTo('App\User');
    }
        public function laporan()
    {
    	return $this->belongsTo('App\Laporan');
    }
}
