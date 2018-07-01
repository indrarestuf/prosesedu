@extends('layouts.master')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-3">
            <div class="my-1 p-0 bg-white rounded box-shadow">
@include('layouts.profile')
            </div>
        </div>
        <div class="col-md-6">
               @if (session('status'))
                        <div class="alert alert-success m-3">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->id == $tutor)
                    <div class="my-1 p-0 bg-white rounded box-shadow ">
                      
                    <img src="{{ Auth::user()->gravatar }}" width="50" alt="" class="mr-2 rounded">
                    <span class="text-muted small">Hallo {{Auth::user()->name}}, Klik buat laporan untuk membuat laporan</span>
                    <button class="btn btn-primary float-right mt-2 mb-2 mr-2" data-toggle="modal" data-target="#laporan-form">buat laporan</button>
                    @include('tutor.laporan-modal')
                    </div>
                    @elseif(Auth::user()->role == 'Tutor')
                    <p>Add aja</p>
                    <a href="{{route('follow', $user->id)}}"> <div class="btn btn-info btn-sm"><i class="fa fa-plus"></i></div> </a>
                    @endif
            
        @foreach($laporans as $laporan)
        <div class="my-1 p-3 bg-white rounded box-shadow">
          <div class="media text-muted pt-3 ">
          <img src="{{ $laporan->user->gravatar }}" width="32" alt="" class="mr-2 rounded">
          <div class="media-body  mb-0 small">
            <p><strong class=" text-gray-dark">{{ $laporan->user->name }}</strong> {{$laporan->created_at->diffForHumans()}}</p>
           <p>{!! $laporan->isi !!}</p> <div class="chip {{ $laporan->hadir == 'Hadir' ? 'hadir' : 'absen' }}">{{$laporan->hadir}}</div> <div class="chip kelas">{{$laporan->program}}</div>  <div class="chip mapel">{{$laporan->mapel}}</div> 
             <form role="form" action="{{ url('laporan/'.$laporan->id.'/komentar') }}" class="pt-2 " method="POST" >
  <div class="form-group">
    {{ csrf_field() }}
    <div class="input-group mb-3">
  <textarea type="text" style="height:35px" class="form-control" name="isi" required placeholder="Komentari Laporan" aria-label="komentar" aria-describedby="basic-addon2">
  </textarea>
  <div class="input-group-append">
    <button class="btn  btn-sm btn-outline-primary"  type="submit">Kirim</button>
  </div>
</div>
      </div>
 </form>
      @foreach($komentars as $komentar)
 @if($laporan->id == $komentar->laporan_id)
 <div class="media text-muted pt-1"> 
<img class="mr-3" src="{{ $komentar->user->gravatar }}"  width="32" alt="Generic placeholder image">
  <div class="media-body  mb-0  border-gray"><p><strong class="d-block text-gray-dark">{{ $komentar->user->name }}</strong>
           {!! $komentar->isi !!}</p>
 </div>
 </div>
 @endif
 @endforeach
 
           </div>     
  
             </div>
             </div>
        @endforeach
        </div>
         <div class="col-md-3 m-0">
            <div class="my-1 p-3 bg-white rounded box-shadow">
<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre aria-labelledby="dropdownMenuOffset">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     @if(Auth::user()->role == 'Tutor')
                                     <a class="dropdown-item" href="{{url('tutor/profile/edit')}}">Ubah Profile</a>
                                     <a class="dropdown-item" href="{{url('tutor/kata-sandi')}}">Ubah Password</a>
                                    @elseif(Auth::user()->role == 'Murid')
                                     <a class="dropdown-item" href="{{url('murid/profile/edit')}}">Ubah Profile</a>
                                     <a class="dropdown-item"href="{{url('murid/kata-sandi')}}">Ubah Password</a>
                                    @endif
            </div>
        </div>
    </div>
</div>
