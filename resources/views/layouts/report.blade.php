
           
        @foreach($laporans as $laporan)
        <div class="my-1 pl-3 pr-3 pb-1 pt-1 bg-white rounded box-shadow">
            <div class="media pt-3 ">
            <img src="{{ $laporan->user->gravatar }}" width="40" alt="" class="mr-2 rounded-circle">
            <div class="media-body">
              <p class="mt-0 mb-0"><strong class=" text-gray-dark">{{ $laporan->user->name }} &blacktriangleright; {{ $laporan->murid->name }} </strong></p>
              <form method="POST" action="{{url('/laporan/delete/'.$laporan->id.'')}}" class="form-inline">  
              <small class="mt-0 d-inline">{{$laporan->created_at->diffForHumans()}}&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;</small>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-light btn-sm"><i class="fa fa-trash"></i> hapus</button>
                <input type="hidden" name="_method" value="DELETE">
                </form>
                
              </div>
              <div class="nilai rounded  pt-2 text-center"><b>{{ $laporan->nilai }}</b></div>
              </div>
            <hr>
            <p>{!! $laporan->isi !!}</p> 
            <div class="chip {{ $laporan->hadir == 'Hadir' ? 'hadir' : 'absen' }}">{{$laporan->hadir}}</div>
            <div class="chip kelas">{{$laporan->program}}</div>
            <div class="chip mapel">{{$laporan->mapel}}</div> 
            

<form role="form" action="{{ url('laporan/'.$laporan->id.'/komentar') }}" class="pt-2 " method="POST" >
  <div class="form-group">
    {{ csrf_field() }}
<div class="input-group mb-3">
  <textarea type="text" style="height:35px"  class="form-control " name="isi" required placeholder="Beri Tanggapan" aria-label="komentar" aria-describedby="basic-addon2" {{Auth::user()->id == $laporan->murid_id || Auth::user()->id == $laporan->user_id ? '' : 'disabled'}} ></textarea>
  <div class="input-group-append">
    <button class="btn  btn-sm btn-primary" {{Auth::user()->id == $laporan->murid_id || Auth::user()->id == $laporan->user_id ? '' : 'disabled'}}  type="submit"><i class="fa fa-send"></i></button>
  </div>
 </div>
 </form>
<div class="add-new" id="load-data">
 @foreach($komentars as $komentar)
 @if($laporan->id == $komentar->laporan_id)
 <div class="komentar-hapus{{$komentar->id}}">
<div class="media  pt-1 komentar{{$komentar->id}}"> 
<img class="mr-3 rounded-circle" src="{{ $komentar->user->gravatar }}"  width="32" alt="Generic placeholder image">
 <div class="media-body  mb-0  border-gray">
      <p class="mt-0 mb-0"><strong class=" text-gray-dark">{{ $komentar->user->name }}</strong> </p>
              
       <p> {!! $komentar->isi !!}</p>

    <small class="mt-0 ">{{$komentar->created_at->diffForHumans()}}&nbsp;&nbsp;&nbsp;&nbsp; &bull; &nbsp; 
    <div class="btn btn-light btn-sm delete" data-id="{{ $komentar->id }}"><i class="fa fa-trash"></i> hapus</div>
    </small>
</div>
 </div>
</div>
 <hr>
 @endif
 @endforeach
 </div>
 </div>
 </div>
 @endforeach