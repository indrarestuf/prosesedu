<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
   protected $fillable = ['pilihan', 'soal_id', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function soal()
    {
        return $this->belongsTo('App\Soal');
    }
    
}
