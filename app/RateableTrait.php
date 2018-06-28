<?php

namespace App;
use Auth;
use App\User;
use App\Rate;
use Illuminate\Http\Request;

trait RateableTrait
{


    public function rates()
    {
        return $this->morphMany(rate::class, 'rateable');
    }

    public function rateIt(Request $request)
    {
        $rate=new rate();
        $rate->user_id = Auth::user()->id;
        $rate->point =  $request->point;
        $this->rates()->save($rate);
        return $rate;
    }
    public function updateIt(Request $request)
    {
//        $rate = rate::find($id);
        $this->rates()->where('user_id',Auth::user()->id)->update([
        'point' => $request->point,
        ]);
    }
    public function israted()
    {
        return !!$this->rates()->where('user_id',auth()->id())->count();
    }
}