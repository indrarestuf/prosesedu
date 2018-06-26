@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('murid.menu')
            <br>
            
            <div class="card">
                 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card-body">
                    You are logged in!
                    <br>
                    {{$user->name}}
                    <br>
                    {{$user->role}}
                    
            @if ($tutors != Null && $tutors->pivot->tutor_id == Auth::user()->id && $user->role == 'Tutor')
                    @include('tutor.laporan-form')
                    @else
                    @if($user->role != 'Murid')
                    <p>Add aja</p>
                    <a href="{{route('follow', $user->id)}}"> <div class="btn btn-info btn-sm"><i class="fa fa-plus"></i></div> </a>
                    @endif
                    @endif
                    </div></div>
                    <br>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                                <br>    
@foreach($user->tutors as $tutor)
<div class="media">
  <img class="mr-3" src="{{ $tutor->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('tutor.profile',  $tutor->username)}}" ><h5 class="mt-0">{{ $tutor->name }}</h5></a>
    {{ $tutor->email }} | {{$tutor->created_at->diffForHumans()}} | {{ $tutor->role }}
    </div>
    <a href="{{route('unfollow', $tutor->id)}}"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
</div>
<hr>
@endforeach
</div></div>
<br>
@foreach($laporans as $laporan)
 <div class="card">
                <div class="card-body">
<div class="media"> 
<img class="mr-3" src="{{ $tutor->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('tutor.profile',  $laporan->user->username)}}" ><h6 class="mt-0">{{ $laporan->user->name}}</h6></a>
 <p>{{$laporan->isi}}</p>
 <p>{{$laporan->hadir}} | {{$laporan->kelas}} | {{$laporan->mapel}}</p>
 
 @foreach($komentars as $komentar)
 @if($laporan->id == $komentar->laporan_id)
 <hr>
 <div class="media"> 
<img class="mr-3" src="{{ $komentar->user->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body"><p>{{$komentar->user->name}}  !</p>
 <p>{{$komentar->isi}}</p>
 </div>
 </div>
 @endif
 @endforeach
 <form role="form" action="{{ url('laporan/'.$laporan->id.'/komentar') }}" method="POST" >
  <div class="form-group">
    {{ csrf_field() }}
    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Kirim tanggapan untuk Tutor"></textarea>
  </div>
  <button class="btn btn-outline-primary" type="submit">Kirim</button>
 </form>
    </div>
    <h5>{{$laporan->nilai}}</h5>
</div>
</div></div><br>
@endforeach
                
        </div>
    </div>
</div>
<br>
@endsection