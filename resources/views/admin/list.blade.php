@foreach($users as $user)
<div class="media">
  <img class="mr-3" src="{{ $user->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">{{ $user->name }}</h5>
    {{ $user->email }} | {{$user->created_at->diffForHumans()}} | {{ $user->role }}
    </div>
        <form method="POST" action="{{url('/admin/userdelete/'.$user->id.'')}}">
{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>
</div>
<hr>
@endforeach
<center>
<a href="#" style="text:decoration:none;"> <p>Lihat semua user</p></a>
</center>
</div>
                </div>