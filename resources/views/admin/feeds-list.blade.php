<div class="my-1 p-3 bg-white rounded shadow"> 
@foreach ($laporans as $laporan)
<div class="media">
  <img class="rounded-circle border-avatar mr-2 " src="{{$laporan->user->gravatar}}" width="32" height="32" alt="Generic placeholder image">
  <div class="media-body mt-1">
   <b>{{$laporan->user->name}}</b> menulis <b>Laporan</b> untuk <b>{{$laporan->murid->name}}</b>
  </div>
  <a href="{{url('laporan/'.$laporan->id.'')}}" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
</div>
<hr>
@endforeach
</div>