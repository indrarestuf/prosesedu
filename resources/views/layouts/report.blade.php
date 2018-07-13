 @foreach($laporans as $laporan)
        <div class="my-1 pl-3 pr-3 pb-1 pt-1 bg-white rounded box-shadow">
            <div class="media pt-3 ">
            <img src="{{ $laporan->user->gravatar }}" width="40" height="40" alt="" class="mr-2 rounded-circle  border-avatar">
            <div class="media-body">
              <p class="mt-0 mb-0"><strong class=" text-gray-dark">{{ $laporan->user->name }} &blacktriangleright; {{ $laporan->murid->name }} </strong></p>
               <small class="mt-0 d-inline">{{$laporan->created_at->diffForHumans()}}</small>
              </div>
              @if( Auth::user()->id == $laporan->user_id || Auth::user()->role == 'Admin')
                <form method="POST" action="{{url('/laporan/delete/'.$laporan->id.'')}}" class="form-inline">  
                {{ csrf_field() }}
                <button type="submit" class="btn btn-light btn-sm"><i class="fa fa-trash"></i> hapus</button>
                <input type="hidden" name="_method" value="DELETE">
                </form>
              @endif
              </div>
            <hr class="mb-2 mt-2">
            <div class="btn-group btn-group-sm btn-group-justified mb-2" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-secondary">Nilai Afektif {{ $laporan->nilai_afektif  }}</button>
  <button type="button" class="btn btn-outline-secondary">Nilai Kognitif {{$laporan->nilai_kognitif }}</button>
  </div>            <p>{!! substr(strip_tags($laporan->isi), 0, 250) !!}{{ strlen(strip_tags($laporan->isi)) > 250 ? "..." : "" }}</p> 
            <div class="chip {{ $laporan->hadir == 'Hadir' ? 'hadir' : 'absen' }}">{{$laporan->hadir}}</div>
            <div class="chip kelas">{{$laporan->program}}</div>
            <div class="chip mapel">{{$laporan->mapel}}</div> 

 <hr class="mb-1 mt-1">
@if(Auth::user()->id == $laporan->murid_id || Auth::user()->id == $laporan->user_id)
  <a href="{{url('/laporan/'.$laporan->id.'')}}" class="btn btn-light mb-1  btn-block" >{{ $komentars->where('laporan_id', $laporan->id)->count()}} komentar, Lihat selengkapnya</a>
 @endif
 </div>
 @endforeach
 