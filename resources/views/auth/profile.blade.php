<div class="my-1 p-3 bg-white rounded shadow"> 

<div class="row">
<div class="col-md-12 text-center">
    	<img class="border-avatar rounded-circle" width="50" src="{{$user->gravatar}}">
</div>
<div class="col-md-12 p-2 text-center ">
 
		<b>{{$user->name}}</b>
    <br>
		@if($user->role == 'Murid')
		<small>Kelas {{$user->profile->kelas}}&nbsp; &bull; &nbsp;{{$user->profile->sekolah}}</small>
		@elseif($user->role == 'Tutor')
		<small>{{$user->role}} &#9733; </small>
		@endif
		@if(Auth::user()->id == $user->id)  
@if(Auth::user()->role == 'Murid')  
<a href="{{url('murid/profile/edit')}}"><button type="button" class="btn btn-light btn-sm "><i class="fa fa-gear"></i> Pengaturan</button></a>
@elseif(Auth::user()->role == 'Tutor') 
<a href="{{url('tutor/profile/edit')}}"><button type="button" class="btn btn-light btn-sm "><i class="fa fa-gear"></i> Pengaturan</button></a>
@endif
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

