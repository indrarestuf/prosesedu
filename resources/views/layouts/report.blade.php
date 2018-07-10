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
            <p>{!! substr(strip_tags($laporan->isi), 0, 250) !!}{{ strlen(strip_tags($laporan->isi)) > 250 ? "..." : "" }}</p> 
            <div class="chip {{ $laporan->hadir == 'Hadir' ? 'hadir' : 'absen' }}">{{$laporan->hadir}}</div>
            <div class="chip kelas">{{$laporan->program}}</div>
            <div class="chip mapel">{{$laporan->mapel}}</div> 
            

 @foreach($komentars as $komentar)
 @if($laporan->id == $komentar->laporan_id)
<div class="media  pt-1 "> 
<img class="mr-3 rounded-circle" src="{{ $komentar->user->gravatar }}"  width="32" alt="Generic placeholder image">
 <div class="media-body  mb-0  border-gray">
      <p class="mt-0 mb-0"><strong class=" text-gray-dark">{{ $komentar->where('laporan_id' , $laporan->id)->count()}}</strong> </p>
              
       <p>{!! substr(strip_tags($komentar->isi), 0, 250) !!} {{ strlen(strip_tags($komentar->isi)) > 250? "...ReadMore" : "" }}</p>

    <small class="mt-0 ">{{$komentar->created_at->diffForHumans()}}&nbsp;&nbsp;&nbsp;&nbsp; &bull; &nbsp; 
    <div class="btn btn-light btn-sm delete" data-id="{{ $komentar->id }}"><i class="fa fa-trash"></i> hapus</div>
    </small>
</div>
 </div>

 @endif
 @endforeach
 <hr class="mb-1 mt-1">
  <a href="{{url('/laporan/'.$laporan->id.'')}}" class="btn btn-light mb-1  btn-block">Selengkapnya</a>
 </div>
 @endforeach
 