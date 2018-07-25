<?php

namespace App;
use Auth;
use App\User;
use App\Rate;
use Illuminate\Http\Request;

trait RateableTrait
{
    public function rateIt(Request $request)
    {
       $this->rates()->where('user_id',Auth::user()->id)->update([
        'point' => $request->point,
        ]);
    }
       public function israted()
    {
        return $this->rates()->where('rateable_id',Auth::user()->id)->count();
    }
}