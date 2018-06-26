<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['isi', 'nilai', 'kelas', 'mapel', 'level', 'hadir', 'user_id', 'murid_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
}
