<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use DB;
use App\Laporan;
use App\Info;
use App\Komentar;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


use App\Events\registerProfile;

class UserController extends Controller
{
    public function infotutor(Request $request)
    {
        DB::table('infos')
            ->where('untuk', 'Tutor')
            ->update(['isi' => nl2br($request->isi)]);
       return back()->with('status','Info diumumkan');
    }
    public function infomurid(Request $request)
    {
        DB::table('infos')
            ->where('untuk', 'Siswa')
            ->update(['isi' => nl2br($request->isi)]);
       return back()->with('status','Info diumumkan');
    }
    public function review(){
        $users = User::where('role', 1)->orderBy('created_at' , 'desc')->simplePaginate(5);
        $rates = Rate::orderBy('created_at' , 'desc')->simplePaginate(5);
        $laporans = Laporan::orderBy('created_at' , 'desc')->simplePaginate(5);
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        return view('admin.review' , compact('users' , 'rates', 'laporans', 'infotutor', 'infomurid'));
    }
    
    public function feeds()
    {
        $users = User::where('role', 'Tutor')->orderBy('created_at' , 'desc')->get();
        $laporans = Laporan::orderBy('created_at' , 'desc')->simplePaginate(8);
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        return view('admin.feeds' , compact('users' , 'laporans', 'infotutor', 'infomurid'));
    }
    
    public function index()
    {
        $users = User::orderBy('created_at' , 'desc')->simplePaginate(5);
        $laporans = Laporan::orderBy('created_at' , 'desc')->get();
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        return view('admin.user' , compact('users' , 'laporans', 'infotutor', 'infomurid'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function tambah()
    {
        return view('admin.addform')->with('info' , Auth::user()->profile); 
    }
    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->username = $request->username;
        $user->save();
        event(new registerProfile($user));
        return back()->with('status','Data Berhasil Disimpan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function komentar( Request $request)
    {
        $laporanId=Input::get('laporanId');
        $laporan = Laporan::findOrFail($laporanId);

        $komentar=new Komentar();
        $komentar->user_id = \Auth::user()->id;
        $komentar->isi = nl2br($request->isi);
        $komentar->laporan_id = $laporan->id;
        $komentar->save();
        return response()->json([$komentar]);
    }
    
    
    public function hapuskomentar($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();
        return response()->json(['status'=>'success','message'=>'deleted']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $laporan = Laporan::whereId($id)->first();
    $user = Auth::user();
    $komentars = Komentar::with('laporan')->orderBy('created_at' , 'desc')->get();
    $rate = Rate::with('user')->where('rateable_id', Auth::user()->id)->first();
        $sum = Rate::where('user_id', $user->id)->sum('point');
    $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
    $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        // dd($komentars);
    if (empty($laporan)) {
            abort(404);
        }
    else{
        return view('layouts.laporan' , compact('laporan' , 'komentars', 'user', 'infotutor', 'infomurid','sum' ));  
    }
      
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status' , 'user dihapus');
    }
    
    
}
