<div class="my-1 p-3 bg-white rounded shadow"> 

@foreach ($users as $user)
<div class="media">
  <img class="rounded-circle border-avatar mr-2 " src="{{$user->gravatar}}" width="32" height="32" alt="Generic placeholder image">
  <div class="media-body">
    <b>{{$user->name}}</b> mendapat <b>{{$rates->where('user_id', $user->id)->sum('point')}}</b> point
<div class="owl-carousel owl-theme pl-3">
@foreach ($rates as $rate)
@if($user->id == $rate->user_id)
    <div class="media mt-3">
        <div class="item">
            <center><img class="rounded-circle border-avatar" src="{{$rate->voter->gravatar}}" data-toggle="tooltip" data-placement="top" title="{{ $rate->review }} (+{{$rate->point}})" width="32" alt="Generic placeholder image" >
            <small class="text-muted  mt-0" >{{$rate->voter->username}}</small></center>
            </div></div>
    @endif
    @endforeach
    </div>
  </div>
</div>
<hr>
@endforeach

</div>
