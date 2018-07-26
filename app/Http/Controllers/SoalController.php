<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Soal;
use App\Level;
use App\Pelajaran;
use App\Jawaban;

use App\User;
use Auth;

class SoalController extends Controller
{
   public function soalsmp($mapel){
    $pelajaran = Pelajaran::where('level_id', 1)->whereMapel($mapel)->first();
    $soals = Soal::with('pelajaran')->where('level_id', 1)->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->simplePaginate(5);
    return view('tryout.panitia.soal-smp', compact('pelajaran' , 'soals'));
   }

   public function soalsma($mapel){
    $pelajaran = Pelajaran::where('level_id', 2)->whereMapel($mapel)->first();
    $soals = Soal::with('pelajaran')->where('level_id', 2)->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->simplePaginate(5);
    return view('tryout.panitia.soal-sma', compact('pelajaran' , 'soals'));
   }

   public function soalptn($mapel){
    $pelajaran = Pelajaran::whereMapel($mapel)->first();
    $soals = Soal::with('pelajaran')->where('level_id', 3)->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->simplePaginate(5);
    return view('tryout.panitia.soal-ptn', compact('pelajaran' , 'soals'));
   }
   
   public function edit($id){
    $pelajarans = Pelajaran::all();
    $soal = Soal::findOrFail($id);
    return view('tryout.panitia.soal-update', compact('soal', 'pelajarans'));
   }
   
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();
        return back()->with('status' , 'soal telah dihapus');
    }
    
    public function update($id , Request $request)
    {
      
        Soal::find($id)->update([
        'level_id' => $request->level_id,
        'pelajaran_id' => $request->pelajaran_id,
        'pertanyaan' => $request->pertanyaan,
        'A' => $request->A,
        'B' => $request->B,
        'C' => $request->C,
        'D' => $request->D,
        'E' => $request->E,
        'kunci' => $request->kunci,
        ]);
       return back()->with('status','Soal berhasil diperbarui');
    }
   
    public function buat(){
      $levels = Level::all();
      $soals =Soal::all();
      return view('tryout.panitia.soal-buat', compact('levels' , 'soals'));
    }
    
    public function index(){
      $soalsmp =Soal::where('level_id', 1)->get();
      $soalsma =Soal::where('level_id', 2)->get();
      $soalptn =Soal::where('level_id', 3)->get();
      return view('tryout.panitia.soal-list', compact('soalsmp', 'soalsma', 'soalptn', 'pelajarans'));
    }
    
    public function create(Request $request){
        $soal = new Soal;
        $soal->level_id = $request->level_id;
        $soal->pelajaran_id = $request->pelajaran_id;
        $soal->pertanyaan = $request->pertanyaan;
        $soal->A = $request->A;
        $soal->B = $request->B;
        $soal->C = $request->C;
        $soal->D = $request->D;
        $soal->E = $request->E;
        $soal->kunci = $request->kunci;
        $soal->save();
        return back()->with('status' , 'Soal Berhasil Disimpan');
    }

    public function pelajarans(){
      $levels_id = Input::get('level_id');
      $pelajarans = Pelajaran::where('level_id', '=', $levels_id)->get();
      return response()->json($pelajarans);
    }
    
    //peserta
   public function tosmp($mapel, Request $request){
    $pelajaran = Pelajaran::where('level_id', 1)->whereMapel($mapel)->first();
    $soals = Soal::with('jawaban')->where('level_id', 1)->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->paginate(1);
     if ($request->ajax()) {
         $jawaban = Jawaban::with('user')->where('user_id', Auth::user()->id)->first();
            return view('tryout.peserta.soal-smp-show', ['soals' => $soals])->render();  
        }
    return view('tryout.peserta.soal-smp', compact('pelajaran' , 'soals', 'userjawab'));
   }
   
   public function tosma($mapel){
    $pelajaran = Pelajaran::where('level_id', 2)->whereMapel($mapel)->first();
    $soals = Soal::with('pelajaran')->where('level_id', 2)->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->paginate(5);
    $jawaban = Jawaban::where('user_id', Auth::user()->id)->get();
    return view('tryout.peserta.soal-sma', compact('pelajaran' , 'soals'));
   }

   public function toptn($mapel){
    $pelajaran = Pelajaran::whereMapel($mapel)->first();
    $soals = Soal::with('pelajaran')->where('level_id', 3)->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->paginate(5);
    return view('tryout.peserta.soal-ptn', compact('pelajaran' , 'soals'));
   }
   
   public function jawab($mapel,Request $request)
    {
    	$userId=Input::get('userId');
    	$soalId=Input::get('soalId');
    	$pilihan=Input::get('pilihan');
    	$mapelId=Input::get('mapelId');
        $user = user::findOrFail($userId);
        $userjawab= Jawaban::where('user_id',auth()->id())->where('soal_id',$soalId)->first();
        if(!count($userjawab)){
             Jawaban::where('user_id',Auth::user()->id)->create([
            'pilihan' => $request->pilihan,
            'soal_id' => $soalId,
            'user_id' => $userId,
            'mapel_id'=> $mapelId,
              ]);
            return response()->json(['status'=>'success','message'=>'terjawab']);
        }
        else{
             Jawaban::where('user_id',Auth::user()->id)->update([
            'pilihan' => $request->pilihan,
            'soal_id' => $soalId,
            'user_id' => $userId,
            'mapel_id'=> $mapelId,
              ]);
            return response()->json(['status'=>'success','message'=>'updated']);
        }
    }
    
    public function hasiltosmp($mapel){
    $pelajaran = Pelajaran::where('level_id', 1)->whereMapel($mapel)->first();
    $soals = Soal::with('jawaban')
    ->where('level_id', 1)
    ->where('pelajaran_id' , $pelajaran->id)->orderBy('created_at' , 'desc')->get();

    $userjawabs = Jawaban::with(['soal:id,kunci,pelajaran_id', 'user'])->where('mapel_id', $pelajaran->id)->where('user_id' , Auth::user()->id)->get();
    $benar=0;
    $salah = 0;
    foreach($userjawabs as $userjawab){
        if($userjawab->pilihan == $userjawab->soal->kunci){
           $benar++ ;
        }
        if($userjawab->pilihan != $userjawab->soal->kunci){
           $salah++ ;
        }
    }
    
    $kosong = $soals->count() - $benar - $salah;
    
    return view('tryout.peserta.soal-smp-hasil', compact( 'soals', 'userjawabs', 'benar' , 'salah' , 'kosong'));
    }
}
