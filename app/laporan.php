<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $fillable = ['isi', 'nilai', 'kelas', 'mapel', 'level', 'hadir', 'user_id', 'murid_id'];

    // A message belongs to a sender
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // A message also belongs to a receiver    
    public function receiver()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}
