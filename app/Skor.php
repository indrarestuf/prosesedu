<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    protected $fillable = ['user_id', 'pelajaran_id', 'point', 'benar', 'salah' , 'kosong'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
}
