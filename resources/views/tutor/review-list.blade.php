<div class="my-1 p-3 bg-white rounded shadow"> 

@foreach ($rates as $rate)
<div class="media">
  <img class="rounded-circle border-avatar mr-2 " src="{{$rate->voter->gravatar}}" width="32" height="32" alt="Generic placeholder image">
  <div class="media-body">
    <b>{{$rate->voter->name}}</b> memberi <b>{{$rate->point}}</b> point
    <br>
    <small>{{$rate->review}}</small>
    </div>
  </div>
<hr>
@endforeach

</div>
