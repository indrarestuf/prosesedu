<div class="add-new" id="load-data">
 @foreach($komentars as $komentar)
 @if($laporan->id == $komentar->laporan_id)
 <div class="komentar-hapus{{$komentar->id}}">
<div class="media  pt-1 komentar{{$komentar->id}}"> 
<img class="mr-3 rounded-circle border-avatar" src="{{ $komentar->user->gravatar }}"   width="40" height="40" alt="Generic placeholder image">
 <div class="media-body  mb-0  ">
     <p class="mt-0 mb-0"><strong class=" text-gray-dark">{{ $komentar->user->name }}</strong> </p>
     <p class=" mb-0"> {!! $komentar->isi !!}</p>
    <small class="mt-0 ">{{$komentar->created_at->diffForHumans()}} 
    @if(Auth::user()->id == $komentar->user_id || Auth::user()->role == 'Admin')
    &nbsp;&nbsp;&nbsp;&nbsp; &bull; &nbsp;
    <div class="btn btn-light btn-sm delete" data-id="{{ $komentar->id }}"><i class="fa fa-trash"></i> hapus</div>
    @endif
    </small>
</div>
 </div>
</div>
 <hr>
 @endif
 @endforeach
 </div>