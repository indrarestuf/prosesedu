@extends('layouts.master')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-lg-3 pr-1 pl-1 pb-0  ">
        @include('layouts.profile')
        @include('layouts.listuser')
        </div>
        
        <div class="col-lg-6 pr-1 pl-1 pb-1 pt-0">
         @include('layouts.report')
        </div>
        
        <div class="col-lg-3 pr-1 pl-1 pb-1">
        @include('layouts.nilai')
        </div>
    </div>
</div>   



   <script>
	/* global $ */
	function rateIt(userId,elem) {
	var csrfToken = '{{csrf_token()}}';
	var point = parseFloat($('input[type="radio"]:checked').val());
	var avg = parseFloat('{{$user->id}}');
	var avgcount = parseFloat(point) + parseFloat(avg);
	var newavg = avgcount/2;
	
               $('#ratecount').text(newavg.toFixed(1));
	$.post("{{route('murid.rating')}}", {userId:userId,_token:csrfToken,point:point}, function(data){
		console.log(point, avg, avgcount , newavg);
	});
	};
</script>         
@endsection
