<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['isi', 'nilai_afektif', 'nilali_kognitif', 'kelas', 'mapel', 'level', 'hadir', 'user_id', 'murid_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function murid()
    {
        return $this->belongsTo('App\User','murid_id');
    }
    
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
    public function getProgramAttribute()
    {
        $program = '';
    if ($this->attributes['kelas'] == 1 ){
        $program = 'Kelas Regular';
    }
    elseif ($this->attributes['kelas'] == 2){
        $program = 'Kelas Private';
    }
    elseif ($this->attributes['kelas'] == 3){
        $program = 'Kelas Intensif';
    }
    elseif ($this->attributes['kelas'] == 4){
        $program = 'Kelas Master';
    }
    elseif ($this->attributes['kelas'] == 5){
        $program = 'Olimpiade';
    }
    return $program;
    }
    
    public function getHadirAttribute()
    {
        $hadir = '';
    if ($this->attributes['hadir'] == 0 ){
        $hadir = 'Absen';
    }
    elseif ($this->attributes['hadir'] == 1){
         $hadir = 'Hadir';
    }
    
    return $hadir;
    }
}