<div class="my-1 p-3 bg-white rounded shadow"> 

<div class="row">
<div class="col-md-12 text-center">
    	<img class="border-avatar rounded-circle" width="50" src="{{$user->gravatar}}">
</div>
<div class="col-md-12 p-2 text-center ">
 
		<b>{{$user->name}}</b>
    <br>
		@if($user->role == 'Murid')
		@if($user->profile->kelas != NULL)
		<small>Kelas {{$user->profile->kelas}}&nbsp; &bull; &nbsp;{{$user->profile->sekolah}}</small>
		@endif
		@elseif($user->role == 'Tutor')
		<small>{{$user->role}} &#9733; {{$sum}}</small>
		@endif
		@if(Auth::user()->id == $user->id) 
<div class="btn-group btn-group-sm mx-auto btn-group-justified" role="group" aria-label="Basic example">
@if(Auth::user()->role == 'Murid')  
<a href="{{url('siswa/profile/edit')}}"  class="btn btn-light btn-sm" ><i class="fa fa-gear"></i> Pengaturan</a>
<a href="{{url('siswa/telusuri/tutor')}}"  class="btn btn-light btn-sm" ><i class="fa fa-search"></i> Telusuri</a>

@elseif(Auth::user()->role == 'Tutor') 
<a href="{{url('tutor/profile/edit')}}" class="btn btn-light btn-sm" ><i class="fa fa-gear"></i> Pengaturan</a>
 <a href="{{url('tutor/telusuri/siswa')}}" class="btn btn-light btn-sm"  ><i class="fa fa-search"></i> Telusuri</a>
 <a href="{{url('tutor/review')}}"  class="btn btn-light btn-sm"  ><i class="fa fa-star"></i> Review</a>
       
@endif
</div>
@endif
</div>
<hr class="mt-2 mb-2">
</div>
<small class="text-muted">Catatan</small>
<hr class="mb-1 mt-1">

 <small>
 	@if($user->profile->note == NULL)
 	<br>
 	<br>
 	@else
 	{{$user->profile->note}}
 	@endif
 </small>

</div>

