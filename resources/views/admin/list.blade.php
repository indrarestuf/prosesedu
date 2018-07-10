<div class="my-1 p-3 bg-white rounded shadow"> 
@include('admin.search')
<br>
 <div id="result-user"></div>
<div id="list-user">
@foreach($users as $user)
<div class="media">
  <img class="mr-3 rounded-circle" src="{{ $user->gravatar }}"  width="32" alt="Generic placeholder image">
  <div class="media-body">
@if($user->role == 'Tutor')
<a href="{{route('tutor.profile',  $user->username)}}" >
@elseif($user->role == 'Murid')
<a href="{{route('murid.profile',  $user->username)}}" >
@elseif($user->role == 'Admin')
<a href="#" >
@endif
<p class="mt-0 mb-0">{{ $user->name }}</p></a>
  <small class="mt-0">{{ $user->email }} | {{$user->created_at->diffForHumans()}} | {{ $user->role }}</small>
    </div>
<form method="POST" action="{{url('/admin/userdelete/'.$user->id.'')}}">
{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>
</div>
<hr>
@endforeach
</div></div>
