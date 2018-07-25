<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Laporan;
use App\Komentar;
use App\Profile;
use App\Info;
use App\Rate;
use Hash;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\errorLaporan;
use App\Http\Requests\errorProfile;

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
    return redirect()->back()->with('status', 'Berhasil, Siswa telah ditambahkan.');
    }
    
    public function unFollowUser($id){
        $user = User::find($id);

        if(! $user) {
         return redirect()->back()->with('error', 'Siswa tidak terdaftar.'); 
        }
        
        $user->tutors()->detach(auth()->user()->id);
        return redirect()->back()->with('status', 'Berhasil, Siswa telah dihapus.');
    }


    public function store($username,  errorLaporan $request)
    {
    
        $user = User::where('username' , $username)->first();
        $laporan=new Laporan;
        $laporan->user_id = \Auth::user()->id;
        $laporan->isi = nl2br($request->isi);
        $laporan->murid_id = $user->id;
        $laporan->mapel = $request->mapel;
        $laporan->level = $user->kelas;
        $laporan->kelas = $request->kelas;
        $laporan->hadir = $request->hadir;
        $laporan->nilai_afektif = $request->nilai_afektif;
        $laporan->nilai_kognitif = $request->nilai_kognitif;
        $laporan->save();
        return back()->with('status','Laporan Terkirim');
    }

      public function show($username)
    {
        $user = User::whereUsername($username)->first();
        $komentars = Komentar::with('laporan')->orderBy('created_at' , 'desc')->get();
        $rate = Rate::with('user')->where('rateable_id', Auth::user()->id)->first();
        $sum = Rate::where('user_id', $user->id)->sum('point');
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        
        // $oldrate =  number_format($avgrate, 1, '.', '');
        if (empty($user) || $user->role != 'Tutor') {
            abort(404);
        }
        elseif($user->role == 'Tutor') {
            return view('tutor.show' , compact('user' , 'sum', 'rate', 'laporans' , 'komentars' , 'infotutor', 'infomurid'));
        }
    }
    
    

    public function review()
    {
        $user = Auth::user();
        $laporans = Laporan::where('user_id' , $user->id)->orderBy('created_at' , 'desc')->limit(5)->get();
        $sum = Rate::where('user_id', Auth::user()->id)->sum('point');
        $rates = Rate::where('user_id', Auth::user()->id)->orderBy('created_at' , 'desc')->simplePaginate(10);
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        return view('tutor.review' , compact( 'rates','user','sum' , 'laporans', 'infotutor'));
    }
    
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect('tutor/'.Auth::user()->username.'')->with('status' , 'Laporan telah dihapus');
    }
    public function profile()
    {
        $user = Auth::user();
        $laporans = Laporan::where('user_id' , $user->id)->orderBy('created_at' , 'desc')->get();
        $sum = Rate::where('user_id', Auth::user()->id)->sum('point');
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        return view('tutor.profile', compact('user', 'sum' , 'laporans', 'infotutor'))->with('info' , Auth::user()->profile);   
    }
    public function profileUpdate(errorProfile $request)
    {
         $validatedData = $request->validate([
        'note' => 'required|max:255',
    ]);
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
    if(!count(Auth::user()->tutors) && !count($user->tutors)){
    $outputbody .=  '<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="'.$user->gravatar.'" width="40" height="40" alt="Generic placeholder image">
  <div class="media-body">
    <a href="/siswa/'.$user->username.'"><p class="mt-0 mb-0">'.$user->name.'</p></a>
    <small class="mt-0 ">'.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'</small>
    </div>

<a type="submit" href="/siswa/'.$user->id.'/follow" class="btn btn-light btn-sm"><i class="fa fa-user-plus"></i></a>
</div>
<hr>'; }
else{
    $outputbody .=  '<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="'.$user->gravatar.'" width="40" height="40" alt="Generic placeholder image">
  <div class="media-body">
    <a href="/siswa/'.$user->username.'"><p class="mt-0 mb-0">'.$user->name.'</p></a>
    <small class="mt-0 ">'.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'</small>
    </div>

<a type="submit" href="/siswa/'.$user->id.'/unfollow" class="btn btn-outline-dark btn-sm"><i class="fa fa-user-times"></i></a>
</div>
<hr>'; }
    }  

    echo $outputhead; 
    echo $outputbody; 
 }  
  else {
        echo $outputhead;
        echo 'tidak ditemukan';
    }
    }
 
 public function telusuri(){
        $user = Auth::user();
        $laporans = Laporan::where('user_id' , $user->id)->orderBy('created_at' , 'desc')->get();
        $sum = Rate::where('user_id', Auth::user()->id)->sum('point');
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        return view('tutor.telusuri', compact('user', 'sum', 'laporans' , 'infotutor'));
    }  
}
