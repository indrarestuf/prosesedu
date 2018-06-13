<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
    return 'username';
    }
    
    /**
 * The user has been authenticated.
 * Method copied from "Illumunate\Foundation\Auth\AuthenticateUsers.php"
 * @param  \Illuminate\Http\Request  $request
 * @param  mixed  $user
 * @return mixed
 */
    protected function authenticated(Request $request, $user)
    {
    $username = Auth::user()->username;
    if( Auth::user()->role == 'Admin' ){
       return Redirect()->route('admin.userlist'); 
    } 

    elseif( Auth::user()->role == 'Tutor' ){
        return Redirect()->route('tutor.profile', $username);
        
    }

    if( Auth::user()->roles== 'Murid' ) {
        return Redirect()->route('murid.profile', $username);
    }

    }
}
