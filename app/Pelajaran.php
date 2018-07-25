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
}
