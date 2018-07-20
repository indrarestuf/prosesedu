<div class="my-1 p-3 bg-white rounded shadow"> 
@if(!count($rates))
<div class="text-center mx-auto">
  <i class="fa fa-star-o"></i>
  <p class="text-muted mb-1">Belum ada review</p>
</div>
@else
<p class="text-muted">Jumlah point {{$sum}}</p>
<hr>
@foreach ($rates as $rate)
<div class="media">
  <img class="rounded-circle border-avatar mr-2 " src="{{$rate->voter->gravatar}}" width="32" height="32" alt="Generic placeholder image">
  <div class="media-body break">
    <b>{{$rate->voter->name}}</b> memberi <b>{{$rate->point}}</b> point
    <br>
    <small>{{$rate->review}}</small>
    </div>
  </div>
<hr>
@endforeach
{{$rates->links()}}
@endif
</div>
