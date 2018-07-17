<div class="my-1 p-3 bg-white rounded shadow"> 
<p class="mb-1">Aktivitas Tutor</p>
<hr>
@foreach ($laporans as $laporan)
<div class="media">
  <img class="rounded-circle border-avatar mr-2 " src="{{$laporan->user->gravatar}}" width="32" height="32" alt="Generic placeholder image">
  <div class="media-body">
   <b>{{$laporan->user->name}}</b> menulis <b>Laporan</b> untuk <b>{{$laporan->murid->name}}</b> 
   <br>
   <small>{{date('d F Y', strtotime($laporan->created_at))}}</small>
  </div>
  <a href="{{url('laporan/'.$laporan->id.'')}}" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
</div>
<hr>
@endforeach
</div>
 {{ $laporans->links() }}