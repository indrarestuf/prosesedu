<?php

namespace App\Http\Controllers;

use App\Rate;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\errorReview;

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
    
    public function create($username , errorReview $request)
    {  
        $user = User::whereUsername($username)->first();
        $rate= Rate::Create([
                'point' => request()->point, 
                'review' => request()->review,
                'user_id' => $user->id,
                'rateable_id' => Auth::user()->id,
                'rateable_type' => Auth::user()->id,
                ]);
        
        return back()->with('status','Review terkirim');
    }
    public function update($username , errorReview $request)
    {  
        $user = User::whereUsername($username)->first();
        Rate::where('rateable_id', Auth::user()->id)->first()
        ->update([
                'point' => $request->point, 
                'review' => $request->review,
                'user_id' => $user->id,
                'rateable_id' => Auth::user()->id,
                'rateable_type' => Auth::user()->id,
        ]);
        
        return back()->with('status','Review diperbarui');
    }
}
