<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class TutorController extends Controller
{
    
    /**
 * Follow the user.
 *
 * @param $profileId
 *
 */
    public function followUser($id)
    {
    $user = User::find($id);

     if(! $user) {
    
     return redirect()->back()->with('error', 'User does not exist.'); 
    }

    $user->tutors()->attach(auth()->user()->id);
    return redirect()->back()->with('status', 'Successfully followed the user.');
    }
    
    public function unFollowUser($id){
        $user = User::find($id);

        if(! $user) {
         return redirect()->back()->with('error', 'User does not exist.'); 
        }
        
        $user->tutors()->detach(auth()->user()->id);
        return redirect()->back()->with('status', 'Successfully unfollowed the user.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
       $user = User::whereUsername($username)->first();
       $murids = $user->murids;
        $tutors = $user->tutors;
        if (empty($user) || $user->role != 'Tutor') {
            abort(404);
        }
        elseif($user->role == 'Tutor') {
            return view('tutor.show' , compact('user' , 'murids'. 'tutors'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
