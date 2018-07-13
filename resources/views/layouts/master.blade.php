<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- Scripts -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/owl.theme.min.css') }}" rel="stylesheet">
</head>
<body style="background-color:rgb(19, 15, 64, 1.0);padding-top:65px">
    
    <main>
        @yield('content')
    </main>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="{{ asset('js/style.js') }}" defer></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
<script>
/*global $*/
$(document).ready(function(){
   $("#search-murid").keyup(function(){
       var str=  $("#search-murid").val();
       if(str == "") {
               $( "#result-murid" ).hide(); 
               $( "#list-murid" ).show(); 
       }else {
           $( "#list-murid" ).hide(); 
           $( "#result-murid" ).show(); 
               $.get( "{{ url('tutor/cari?id=') }}"+str, function( data ) {
                   $( "#result-murid" ).html( data );
               });
           }
   });  
}); 
</script>

    <script>
/*global $*/
$(document).ready(function(){
   $("#search-tutor").keyup(function(){
       var str=  $("#search-tutor").val();
       if(str == "") {
               $( "#result-tutor" ).hide(); 
               $( "#list-tutor" ).show(); 
       }else {
           $( "#list-tutor" ).hide(); 
           $( "#result-tutor" ).show(); 
               $.get( "{{ url('murid/cari?id=') }}"+str, function( data ) {
                   $( "#result-tutor" ).html( data );
               });
           }
   });  
}); 
</script>
<script>
/*global $*/
$(document).ready(function(){
   $("#search-user").keyup(function(){
       var str=  $("#search-user").val();
       if(str == "") {
               $( "#result-user" ).hide(); 
               $( "#list-user" ).show(); 
       }else {
           $( "#list-user" ).hide(); 
           $( "#result-user" ).show(); 
               $.get( "{{ url('user/cari?id=') }}"+str, function( data ) {
                   $( "#result-user" ).html( data );
               });
           }
   });  
}); 
</script>
<script>
/*global $*/
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
</script>
<script>
/*global $*/
$(document).ready(function(){
$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:5
        },
        600:{
            items:5
        },
        1000:{
            items:5
        }
    }
});
});
</script>
<script type="text/javascript">
/*global $*/
	$(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        var _token = $("input[name='_token']").val(); 
        
        $.ajax(
        {
            url: '{{ url("/komentar/delete") }}' + '/' + id,
            type: 'POST',
          
            data: {
                id: id,
                _token: _token,
            },
            success: function ()
            {
              $('.komentar' +id).remove();
              $('.komentar-hapus' +id).html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Success!</strong> Komentar berhasil dihapus.</div>");
                console.log("terhapus");
            }
        });
    });
</script>


</body>
</html>
