@extends('layouts.master')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-lg-3 pr-1 pl-1 pb-0  ">
            <div class="my-1 p-3 bg-white rounded shadow">
@include('layouts.profile')
            </div>
        </div>
        <div class="col-lg-6 pr-1 pl-1 pb-1 pt-0">
               @if (session('status'))
                        <div class="alert alert-success m-3">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->id == $tutor)
                    <div class="my-1 p-2 bg-white rounded box-shadow " data-toggle="modal" data-target="#laporan-form" style="cursor:pointer">
                      
                    <img src="{{ Auth::user()->gravatar }}" width="50" alt="" class="mr-2 rounded">
                    <span class="text-muted small">Hai {{Auth::user()->username}}, buat laporan sekarang</span>
                    <hr class="mb-0 mt-0" style="margin-left:55px;">
                    @include('tutor.laporan-modal')
                    </div>
                    @elseif(Auth::user()->role == 'Tutor')
                    <div class="my-1 p-3 bg-white rounded box-shadow ">
                    <img src="{{ Auth::user()->gravatar }}" width="50" alt="" class="mr-2 rounded">
                    <span class="text-muted small">Tambahkan {{$user->username}} untuk membuat laporan</span>
                    <a href="{{route('follow', $user->id)}}"> <div class="btn btn-info float-right mr-2 mt-2 mb-2"><i class="fa fa-plus"></i></div> </a>
                    </div>
                    @endif
            
        @foreach($laporans as $laporan)
        <div class="my-1 p-2 bg-white rounded box-shadow">
          <div class="media text-muted pt-3 ">
          <img src="{{ $laporan->user->gravatar }}" width="32" alt="" class="mr-2 rounded">
          <div class="media-body  mb-0 small">
            <p class="mb-0"><strong class=" text-gray-dark">{{ $laporan->user->name }}</strong>&nbsp|&nbsp{{$laporan->created_at->diffForHumans()}}</p>
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
         <div class="col-lg-3 pr-1 pl-1 pb-1">
            <div class="my-1 p-3 bg-white rounded box-shadow">
                <div class="row">
                @foreach($user->tutors as $tutor)
<div class="col-sm-3 text-center ">
 <a href="{{route('tutor.profile',  $tutor->username)}}" style="text-decoration:none" data-toggle="tooltip" data-placement="top" title="{{ $tutor->username }}" >  
    <img class="rounded-circle border-avatar" src="{{ $tutor->gravatar }}"  width="64" alt="Generic placeholder image" >
    <center><small class="text-muted" >{{ $tutor->username }}</small></center>
</a>
</div>
@endforeach
</div>
            </div>
            
            <div class="my-1 p-3 bg-white rounded box-shadow">
                <div class="row">
                @foreach($user->tutors as $tutor)
<div class="col-sm-3 text-center ">
 <a href="{{route('tutor.profile',  $tutor->username)}}" style="text-decoration:none" data-toggle="tooltip" data-placement="top" title="{{ $tutor->username }}" >  
    <img class="rounded-circle border-avatar" src="{{ $tutor->gravatar }}"  width="64" alt="Generic placeholder image" >
    <center><small class="text-muted" >{{ $tutor->username }}</small></center>
</a>
</div>
@endforeach
</div>
            </div>
            
        </div>
    </div>
</div>
@endsection