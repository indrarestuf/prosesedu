@extends('layouts.app')

@section('content')
@include('layouts.profile')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (Auth::user()->id == $tutor)
                    @include('tutor.laporan-form')
                    @elseif(Auth::user()->role == 'Tutor')
                    <p>Add aja</p>
                    <a href="{{route('follow', $user->id)}}"> <div class="btn btn-info btn-sm"><i class="fa fa-plus"></i></div> </a>
                    @endif
                    </div></div>
                    <br>
            
@foreach($laporans as $laporan)
 <div class="card">
                <div class="card-body">
<div class="media"> 
<img class="mr-3" src="{{ $laporan->user->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('tutor.profile',  $laporan->user->username)}}" ><h6 class="mt-0">{{ $laporan->user->name}}</h6></a>
 <p>{!! $laporan->isi !!}</p>
 
<div class="chip {{ $laporan->hadir == 'Hadir' ? 'hadir' : 'absen' }}">{{$laporan->hadir}}</div> <div class="chip kelas">{{$laporan->program}}</div>  <div class="chip mapel">{{$laporan->mapel}}</div> 
 <hr>
 @foreach($komentars as $komentar)
 @if($laporan->id == $komentar->laporan_id)

 <div class="media"> 
<img class="mr-3" src="{{ $komentar->user->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body"><p>{{$komentar->user->name}}  !</p>
 <p>{{$komentar->isi}}</p>
 </div>
 </div>
 <hr>
 @endif
 @endforeach
 <form role="form" action="{{ url('laporan/'.$laporan->id.'/komentar') }}" method="POST" >
  <div class="form-group">
    {{ csrf_field() }}
    <textarea name="isi" required class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Kirim tanggapan untuk Tutor"></textarea>
  </div>
  <button class="btn btn-outline-primary" type="submit">Kirim</button>
 </form>
    </div>
    <h5>{{$laporan->nilai}}</h5>
</div>
</div></div>
@endforeach
                
        </div>
    </div>
</div>
<br>
@endsection