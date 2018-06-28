<?php

namespace App\Http\Controllers;

use App\Rate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RateController extends Controller
{
    public function rate(Request $request)
    {
    	$userId=Input::get('userId');
    	$point=Input::get('point');
        $user = user::findOrFail($userId);
        
         $usersrate= $user->rates()->where('user_id',auth()->id())->where('rateable_id',$userId)->first();
         
        if(!$user->israted()){
            $user->rateIt($request);
            return response()->json(['status'=>'success','message'=>'rated']);
        }
        else{
            $user->updateIt($request);
            return response()->json(['status'=>'success','message'=>'updated']);
        }
    }
    
}
