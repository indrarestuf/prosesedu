@extends('layouts.master')

@section('content')
@include('layouts.profile')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <br>
            
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img class="mr-3" src="{{ $user->gravatar }}"  width="50" alt="Generic placeholder image">
                    @include('tutor.rating')
                    {{$user->name}}
                    <br>
                    {{$user->role}}
                    <br>
                    {{$user->profile->note }}
                    
                    
                   
                    
                <br>    
@foreach($user->murids as $murid)
<div class="media">
  <img class="mr-3" src="{{ $murid->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('murid.profile',  $murid->username)}}" ><h5 class="mt-0">{{ $murid->name }}</h5></a>
    {{ $murid->email }} | {{$murid->created_at->diffForHumans()}} | {{ $murid->role }}
    </div>
    <a href="{{route('unfollow', $murid->id)}}"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
</div>
<hr>
@endforeach
<a class="btn btn-danger" href="{{route('tutor.telusuri')}}">Siswa</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
	/* global $ */
	function rateIt(userId,elem) {
	var csrfToken = '{{csrf_token()}}';
	var point = parseFloat($('input[type="radio"]:checked').val());
	var avg = parseFloat('{{$avgrate}}');
	var avgcount = parseFloat(point) + parseFloat(avg);
	var newavg = avgcount/2;
	
               $('#ratecount').text(newavg.toFixed(1));
	$.post("{{route('murid.rating')}}", {userId:userId,_token:csrfToken,point:point}, function(data){
		console.log(point, avg, avgcount , newavg);
	});
	};
</script>
@endsection