<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    public $timestamps = false;
    public function soal()
    {
        return $this->hasMany('App\Soal');
    }
}
