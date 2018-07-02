
    
<div class="profile-pic" >
<div class="row">
<div class="col-sm-3">
    	<img class="border-avatar rounded" width="50" src="{{$user->gravatar}}">
</div>
<div class="col-sm-9 pl-1">
 
		<b>{{$user->name}}</b>
		<br>
		<small>Kelas {{$user->profile->kelas}} | {{$user->profile->sekolah}}</small>
		<br>
		<small> {{$user->profile->ortu}}</small>
</div>
</div>
<hr>
</div>
<br>
 {{$user->profile->bio}}
     <hr>
<div class="btn btn-block btn-info">Edit profile</div>


