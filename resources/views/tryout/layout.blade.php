<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>Try Out | Problem Solver Society</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="Bimbingan belajar untuk persiapan ujian sekolah, ujian masuk sekolah & PTN dan Olimpiade Sains Nasional">
		<link rel="icon" 
      type="image/png" 
      href="{{asset('img/logo.png')}}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- Scripts -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<style>
html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}
.btn-group-justified {
  display: flex;
}
.btn-group-justified .btn {
  flex-grow: 1;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #130f40;
  color: #fff;
}
.chip {
    display: inline-block;
    padding: 0 20px;
    height: 30px;
    font-size: 12px;
    line-height: 30px;
    border-radius: 25px;
    background-color: #f1f1f1;
    margin:1px;
    color:#fff;
}


.chip:hover{
  border-radius: 10px;
  opacity:0.8;
  text-decoration:none;
}

/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
</head>
<body style="background-color:rgb(19, 15, 64, 1.0);padding-top:65px">
    
    <main>
        @yield('content')
    </main>
<footer class="footer text-center">
      <div class="container">
        <span>© Problem Solver Society 2018.</span>
      </div>
</footer>   
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML"></script>

@if(Request::is('/tryout/soal/buat'))
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'soal' );
</script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script>
/*global $*/
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script type="text/javascript">
/*global $*/
    $('#level').on('change', function(e){
        console.log(e);
        var level_id = e.target.value;
        $.get('/json-pelajarans?level_id=' + level_id,function(data) {
          console.log(data);
          $('#pelajaran').empty();
          $('#pelajaran').append('<option value="0" disable="true" selected="true">Pilih Materi</option>');
          
          $.each(data, function(index, pelajaransObj){
            $('#pelajaran').append('<option value="'+ pelajaransObj.id +'">'+ pelajaransObj.mapel +'</option>');
          });
  });
});
</script>

<script type="text/javascript">
/*global $*/
$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<div class="loading">Loading&#8230;</div>');

        var url = $(this).attr('href');  
        getSoals(url);
        window.history.pushState("", "", url);
    });

    function getSoals(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
          $( document ).ajaxSuccess(function( event, xhr, settings ) {
   let url = new URL(event.target.URL);
   let params = new URLSearchParams(url.search.slice(1));
   if (params.get('page') != null) {
      MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
   }
});
          $('.soals').html(data);  
        }).fail(function () {
            alert('soal gagal dimuat.');
        });
    }
});
</script>

<script>
/*global $*/
	function jawab(soalId,elem) {
	var csrfToken = '{{csrf_token()}}';
	var userId = '{{Auth::user()->id}}';
	var pilihan = $(".pilihan:checked").val();
	$.post("{{route('jawab')}}", {pilihan:pilihan,userId:userId,soalId:soalId,_token:csrfToken}, function(data){
	console.log(data);
	});
	};
</script>

<script>
/* global $*/
  $(document).ready(function() {
  var paused = false;
  var timer = function(time, selector) {
    this.pause = function() {
      return time;
    };
    this.time = time;
    this.select = selector;

    this.x = setInterval(function() {
      $(selector).html(formatTime(time));
      if (time > 0 && !paused) {
        time -= 1;
      }
      
    }, 1000);
    var pauseHolder =0;

  };
  longTimer = new timer(7200, '.timer');
  $('#reset').click(function() {
    if (!paused){
    clearInterval(longTimer.x);
    longTimer = new timer(7200, '.timer');}
    else {longTimer.time=7200;
    }

  });
  $('#pause').click(function() {
    if (!paused) {
      paused = true;
      pauseHolder = longTimer.pause();
      clearInterval(longTimer.x);
    }
    $('#pause').click(function() {
      if (paused) {
        paused = false;
        longTimer = new timer(pauseHolder, '.timer');}
        else {paused=true; pauseHolder = longTimer.pause(); clearInterval(longTimer.x);}
        
      
    });
  });

  var formatTime = function(input) {
    var seconds = Math.floor(input % 60);
    var minutes = Math.floor((input / 60) % 60);
    var hours = Math.floor(((input / 60) /60 )% 60);
    if (seconds<10) {seconds = '0' + seconds;}
    return hours +":"+ minutes + ":" + seconds;
  };

});
</script>

</body>
</html>
