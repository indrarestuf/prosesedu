<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\User;
use Hash;
use Validator;

class KatasandiController extends Controller
{
    public function katasandi()
    {
        $user = Auth::user();
        if($user->role == 'Tutor'){
        return view('tutor.katasandi' , compact('user'))->with('info' , Auth::user()->id);    
        }
        else{
        return view('murid.katasandi' , compact('user'))->with('info' , Auth::user()->id);  
        }
        
    }
    
    public function katasandiGanti()
    {
    $user = Auth::user();
    $validation = Validator::make(Request::all(), [

    // Here's how our new validation rule is used.
    'password' => 'hash:' . $user->password,
    'new_password' => 'required|different:password',
    'password-confirm'=>'same:new_password|confirmed',
    ]);

    if ($validation->fails()) {
    return redirect()->back()->withErrors($validation->errors());
    }

    $user->password = Hash::make(Request::input('new_password'));
    $user->save();

    return redirect()->back()
    ->with('status', 'Your new password is now set!');
    }
}
