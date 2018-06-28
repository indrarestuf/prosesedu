<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
   	protected $fillable = [
		'user_id', 'rateable_type', 'rateable_id'
	];

protected $casts = [
    'my_decimal' => 'float',
];
    public function rateable(){
      return $this->morphTo();
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
