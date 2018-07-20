<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\User;
use Hash;
use Validator;
use App\Http\Requests\errorKatasandi;

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
    
    public function katasandiGanti(errorKatasandi $request)
    {
    $user = Auth::user();
  
    $user->password = Hash::make(Request::input('new_password'));
    $user->save();

    return redirect()->back()
    ->with('status', 'Kata sandi berhasil diperbarui');
    }
}
