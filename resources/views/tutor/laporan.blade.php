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
         @include('layouts.laporan-single')
        </div>
        
        <div class="col-lg-3 pr-1 pl-1 pb-1">
        @include('layouts.nilai')
        </div>
    </div>
</div>   

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  
<script>
/*global $*/
	$(document).ready(function() {

     // on button click we are getting values by input name.
      $(".komentar").click(function(e){
        e.preventDefault();
        var _token = $("input[name='_token']").val(); // get csrf field.
        var isi = $("#isi").val();
        var userId = '{{Auth::user()->id}}';
        var username = '{{Auth::user()->name}}';
        var avatar = '{{Auth::user()->gravatar}}';      
        var laporanId = '{{$laporan->id}}';
    if(isi == '') 
      {
        $('.rounded-corners').removeClass('purple-border');
        $('.rounded-corners').addClass('error-border');
        return false;
      }
    $('#isi').val("");
        $.ajax({
              url: "{{route('komentar')}}",
              type:'POST',
              
    		  dataType: "json",
              data: { _token:_token, isi:isi, userId:userId, laporanId:laporanId},
              success:function(data) {
    		console.log(data);
    		var komentar = '<div class="komentar-hapus'+data[0].id+'"><div class="media  pt-1 komentar'+data[0].id+'"><img class="mr-3 rounded-circle" src="'+avatar+'"  width="32" alt="Generic placeholder image"><div class="media-body  mb-0  border-gray"><p class="mt-0 mb-0"><strong class=" text-gray-dark">'+username+'</strong> </p><p> '+data[0].isi+'</p> <small class="mt-0 ">Baru saja&nbsp;&nbsp;&nbsp;&nbsp; &bull; &nbsp; <div class="btn btn-light btn-sm delete" data-id="'+data[0].id+'"><i class="fa fa-trash"></i> hapus</div></small></div> </div></div><hr>';
         $('.add-new').prepend(komentar);
     			}});
  })
  });
</script>
@endsection
