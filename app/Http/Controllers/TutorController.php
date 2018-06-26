<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Laporan;
use App\Profile;
use Hash;
use Validator;
use Illuminate\Support\Facades\Input;

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
    public function store($username,  Request $request)
    {
        $user = User::where('username' , $username)->first();
        $laporan=new Laporan;
        $laporan->user_id = \Auth::user()->id;
        $laporan->isi = nl2br($request->isi);
        $laporan->murid_id = $user->id;
        $laporan->mapel = $request->mapel;
        $laporan->level = $request->level;
        $laporan->kelas = $user->kelas;
        $laporan->hadir = $request->hadir;
        $laporan->nilai = $request->nilai;
        $laporan->save();
        return back()->with('status','Data Berhasil Disimpan');
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
        if (empty($user) || $user->role != 'Tutor') {
            abort(404);
        }
        elseif($user->role == 'Tutor') {
            return view('tutor.show' , compact('user' , 'laporans'));
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
    public function profile()
    {
        return view('tutor.profile')->with('info' , Auth::user()->profile);  
    }
    public function profileUpdate(Request $request)
    {
        Auth::user()->profile()->update([
        'note' => $request->note,
        ]);
       return back()->with('status','Data Berhasil Disimpan');
    }
    
    public function search(Request $request){
    $search = $request->id;
    $users = User::where('name','LIKE',"%{$search}%")->where('role' , 2)
                           ->get();  

    $outputhead = '';
    $outputbody = '';  
    $token = csrf_field();
    $delete = method_field('DELETE') ;
    
    $outputhead .= '<center><p>Hasil pencarian <b>'.$search.'</b></p></center>';
    
    
   if($users->isNotEmpty())   { 
    foreach ($users as $user){
    
    $outputbody .=  '<div class="media">
  <img class="mr-3" src="'.$user->gravatar.'"  width="50" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">'.$user->name.'</h5>
    '.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'
    </div>
</div>
<hr>';  
    }  

    echo $outputhead; 
    echo $outputbody; 
 }  
  else {
        echo $outputhead;
        echo 'tidak ditemukan';
    }
    }
   
}
