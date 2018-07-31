<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajarans';
    
    public $timestamps = false;
     
    public function soal()
    {
        return $this->hasMany('App\Soal');
    }
    
    public function skor()
    {
        return $this->hasMany('App\Skor');
    }
    
    public function jawaban()
    {
        return $this->hasMany('App\Jawaban');
    }
    
    public function level()
    {
        return $this->hasMany('App\Level');
    }
}
