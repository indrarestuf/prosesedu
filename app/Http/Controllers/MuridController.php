<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Laporan;
use App\Komentar;

use Auth;

class MuridController extends Controller
{
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
    public function store(Request $request, $id)
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
      $laporans = Laporan::where('murid_id' , $user->id)->orderBy('created_at' , 'desc')->limit(3)->get();
      $komentars = Komentar::with('laporan')->orderBy('created_at' , 'desc')->limit(5)->get();
 
        $murids = $user->murids;
        $tutors = $user->tutors()->where('tutor_id', Auth::user()->id)->first();
     
        if (empty($user) || $user->role != 'Murid') {
            abort(404);
        }
        else {
            return view('murid.show' , compact('user', 'tutors','komentars' , 'laporans' ));
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
    public function update(Request $request)
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
    
    public function search(Request $request){
    $search = $request->id;
    $users = User::where('name','LIKE',"%{$search}%")->where('role' , 1)
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
    
    public function profile()
    {
        return view('murid.profile')->with('info' , Auth::user()->profile);  
    }
    
    public function profileUpdate(Request $request)
    {
        Auth::user()->profile()->update([
        'kelas' => $request->kelas,
        'sekolah' => $request->sekolah,
        'ortu' => $request->ortu,
        'note' => $request->note,
        ]);
       return back()->with('status','Data Berhasil Disimpan');
    }
}
