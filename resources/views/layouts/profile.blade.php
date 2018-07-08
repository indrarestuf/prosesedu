<div class="my-1 p-3 bg-white rounded shadow"> 
<div class="profile-pic" >
<div class="row">
<div class="col-xs-3 pt-1 pl-3">
    	<img class="border-avatar rounded-circle" width="50" src="{{$user->gravatar}}">
</div>
<div class="col-xs-9 pl-1 pt-1 ">
 
		<b>{{$user->name}}</b>
    <br>
		@if($user->role == 'Murid')
		<small>Kelas {{$user->profile->kelas}}&nbsp; &bull; &nbsp;{{$user->profile->sekolah}}</small>
		@elseif($user->role == 'Tutor')
		<small>{{$user->role}} &#9733; {{$avgrate}}</small>
		@endif

</div>
</div>
<hr class="mt-2 mb-2">
</div>
<small class="text-muted">Catatan</small>
@if(Auth::user()->id == $user->id)  
@if(Auth::user()->role == 'Murid')  
<a href="{{url('murid/profile/edit')}}"><button type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-gear"></i> Pengaturan</button></a>
@elseif(Auth::user()->role == 'Tutor') 
<a href="{{url('tutor/profile/edit')}}"><button type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-gear"></i> Pengaturan</button></a>
@endif
@endif
<br>

 <small>
 	@if($user->profile->note == NULL)
 	<br>
 	<br>
 	@else
 	{{$user->profile->note}}
 	@endif
 </small>
 @if($user->role == 'Tutor')

<div class=" text-center">   
	@include('tutor.rating')
</div>
@endif
</div>

