<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Laporan;
use App\Komentar;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


use App\Events\registerProfile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review(){
        $users = User::where('role', 1)->orderBy('created_at' , 'desc')->get();
        $rates = Rate::orderBy('created_at' , 'desc')->limit(10)->get();
        $laporans = Laporan::orderBy('created_at' , 'desc')->limit(10)->get();
        return view('admin.review' , compact('users' , 'rates', 'laporans'));
    }
    
    public function feeds()
    {
        $users = User::where('role', 'Tutor')->orderBy('created_at' , 'desc')->get();
        $laporans = Laporan::orderBy('created_at' , 'desc')->limit(10)->get();
        return view('admin.feeds' , compact('users' , 'laporans'));
    }
    
    public function index()
    {
        $users = User::orderBy('created_at' , 'desc')->get();
        $laporans = Laporan::orderBy('created_at' , 'desc')->get();
        return view('admin.user' , compact('users' , 'laporans' ));
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
        // dd($komentars);
    if (empty($laporan)) {
            abort(404);
        }
    else{
        return view('layouts.laporan' , compact('laporan' , 'komentars', 'user' ));  
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
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status' , 'user dihapus');
    }
    
    
}
