<div class="my-1 p-3 bg-white rounded shadow"> 

<div class="row">
<div class="col-md-12 text-center">
    	<img class="border-avatar rounded-circle" width="50" src="{{Auth::user()->gravatar}}">
</div>
<div class="col-md-12 p-2  text-center">
 
		<b>{{Auth::user()->name}}</b>
    <br>
		@if(Auth::user()->profile->kelas != NULL)
		<small>Kelas {{Auth::user()->profile->kelas}}&nbsp; &bull; &nbsp;{{Auth::user()->profile->sekolah}}</small>
				<br>
		@endif


<div class="btn-group btn-group-sm mx-auto btn-group-justified" role="group" aria-label="Basic example">
<a href="{{url('tryout')}}" class="btn btn-light btn-sm" ><i class="fas fa-book-open"></i> Soal TO</a>
<a href="{{url('tryout/nilai')}}"class="btn btn-light btn-sm" ><i class="fas fa-star"></i> Nilai TO</a>
</div>

</div>
<hr class="mt-2 mb-2">
</div>
<small class="text-muted">Catatan</small>
<hr class="mb-1 mt-1">

 <small>
 	@if(Auth::user()->profile->note == NULL)
 	<br>
 	<br>
 	@else
 	{{Auth::user()->profile->note}}
 	@endif
 </small>

</div>

