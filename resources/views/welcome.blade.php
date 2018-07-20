<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Problem Solver Society</title>
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

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
    <style type="text/css">
body,html {
  height: 100%;
}
.wide {
  width:100%;
  height:100%;
  height:calc(100% - 1px);
  background-color:#130f40;
  background-size:cover;
  background-position: center bottom;
   background-attachment: fixed;
}

.wide img {
  width:100%;
}


    </style>
</head>
<body>
  
   <header>
       <div class="navbar navbar-dark  box-shadow" style="background-color:rgb(19, 15, 64, 1); ">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
           <img src="{{asset('img/logo.png')}}" width="30" height="30" alt="">
                    {{ config('app.name', 'Laravel') }}
          </a>
  <ul class="navbar-nav justify-content-end">
        @auth
               @if(\Auth::user()->role == 'Admin')
      <li class="nav-item active">
       <a class="nav-link" href="{{ route('admin.userlist') }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30"></a>
      </li>
      @elseif (\Auth::user()->role == 'Tutor')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('tutor.profile', Auth::user()->username) }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30"></a>
      </li>
      @elseif (\Auth::user()->role == 'Murid')
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('murid.profile', Auth::user()->username) }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30"></a>
                            </li>
       @endif
                                  @endauth
    @guest
               <a class="btn btn-flat btn-sm btn-outline-light "  href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>  Masuk
            </a>
      @endguest
</ul>
 
        </div>
      </div>
    </header>
<div class="wide mt-0" style="background-image:url({{asset('img/bg-langit.jpg')}});   background-attachment: fixed;">
        <div class="container desktop text-center" style="padding-top:150px;color:#fff">
          <h1 class="jumbotron-heading"><b> AKU MAU
  <span class="typewrite" data-period="2000" data-type='[ "LULUS UJIAN NASIONAL.", "MASUK PTN FAVORIT.", "JUARA OLIMPIADE SAINS.", "NILAI RAPOR BAGUS.", "MAMA PAPA BANGGA" ]'>
    <span class="wrap"></span></b>
  </span>
</h1>
<p class="lead"><b>Semua bisa terwujud di Bimbingan Belajar Proses.</b></p>
          </div>
        
                <div class="container smartphone text-center" style="padding-top:100px; color:#fff">
          <h6 class="jumbotron-heading mb-1"><b> AKU MAU
  <span class="typewrite" data-period="2000" data-type='[ "LULUS UN.", "MASUK PTN FAVORIT.", "JUARA OSN.", "NILAI RAPOR BAGUS.", "MAMA PAPA BANGGA" ]'>
    <span class="wrap"></span></b>
  </span>
</h6>
<small>Wujudkan Bersama Bimbel Proses.</small>
          </div>
</div>
    <main role="main">
        <section class="jumbotron m-0" style="background-image:url({{asset('img/floating-cogs.svg')}});  border-radius:0;">
        <div class="container text-center" >
          <div class="row">
              <div class="col-md-12">
               <h5>Mengapa Bimbel Proses?</h5>
          <hr>
          <p class="desktop">Bimbingan Belajar PROSES (Program Solver Society) ingin turut serta dalam memajukan wawasan dan kecerdasan siswa melalui proses pembelajaran yang ‘’smart” dan “berkualitas” dengan metode belajar " Smart logic System".
          </p>
          <small class="smartphone">Bimbingan Belajar PROSES (Program Solver Society) ingin turut serta dalam memajukan wawasan dan kecerdasan siswa melalui proses pembelajaran yang ‘’smart” dan “berkualitas” dengan metode belajar " Smart logic System".
          </small>
            </div>
          </div>
        </div>


           <div class="container ">
             
             <hr>
             <div class="text-center">
              <p class="desktop">
                Bimbel Proses telah berhasil membimbing para siswa untuk berprestasi lebih di bidang Olimpiade Sains atau berhasil masuk di Kampus-kampus ternama.
              </p>
          <small class="smartphone">
                Bimbel Proses telah berhasil membimbing para siswa untuk berprestasi lebih di bidang Olimpiade Sains atau berhasil masuk di Kampus-kampus ternama.            
          </small>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              
<ul class="list-group list-group-flush">
  <li class="list-group-item"><img class="rounded-circle border-avatar" src="{{asset('img/avatar.png')}}"  width="32" alt="Generic placeholder image" >
    <small class="text-muted " >Irfan Urane Aziz | Medali Emas OSN Matematika SMP</small></li>
  <li class="list-group-item"> <img class="rounded-circle border-avatar" src="{{asset('img/avatar.png')}}"  width="32" alt="Generic placeholder image" >
  <small class="text-muted" >Timoty Jacob | Medali Emas OSN Matematika SMA</small></li>
  <li class="list-group-item">  <img class="rounded-circle border-avatar" src="{{asset('img/avatar.png')}}"  width="32" alt="Generic placeholder image" >
  <small class="text-muted" >Andrew Wiratmaja | Medali Emas OSN Matematika SMA</small></li>
</ul>
</div>

  <div class="col-md-6 col-sm-12">
    <ul class="list-group list-group-flush">
  <li class="list-group-item"><img class="rounded-circle border-avatar" src="{{asset('img/avatar.png')}}"  width="32" alt="Generic placeholder image" >
  <small class="text-muted" >Gifari | Tokyo Institute</small></li>
  <li class="list-group-item"> <img class="rounded-circle border-avatar" src="{{asset('img/avatar.png')}}"  width="32" alt="Generic placeholder image" >
  <small class="text-muted" >M. Lukman | University of Southampton</small></li>
  <li class="list-group-item">  <img class="rounded-circle border-avatar" src="{{asset('img/avatar.png')}}"  width="32" alt="Generic placeholder image" >
  <small class="text-muted" >Sri Wahyuni Teknik|  Pertambangan ITB</small></li>
</ul>
</div></div>
            </div>
      </section>
      
              <section class="jumbotron m-0 bg-white" style=" border-radius:0;">
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
<ul class="list-group list-group-flush">
  <li class="list-group-item"><i class="fas fa-chalkboard-teacher"></i> | Tutor berpengalaman, kompeten dan berkualitas dari PTN ternama.</li>
  <li class="list-group-item"><i class="fas fa-users"></i> | Kelas lebih nyaman dengan isi 6-8 siswa.</li>
  <li class="list-group-item"><i class="fas fa-wifi"></i> | Free wifi untuk kemudahan akses sumber belajar.</li>
  <li class="list-group-item"><i class="far fa-file-alt"></i>&nbsp; | Laporan Perkembangan Siswa Online yang dapat diakses kapanpun dimanapun</li>
  <li class="list-group-item"><i class="fas fa-file-signature"></i> | Tersedia modul dan kumpulan latihan soal berkala</li>
</ul>
            
            </div>
       
          </div>
        </div>
      </section>
      
       <section class="jumbotron m-0  text-center" style="background-image:url({{asset('img/glamorous.svg')}}); border-radius:0;">
    <div class="container">
          <h5>Program Bimbel Proses</h5>
          <hr>
        <div class="row">

          <div class="col-md-4 mb-3">
            <button type="button" class="btn btn-block mb-2 btn-primary" data-toggle="collapse" data-target="#reguler" aria-expanded="false" aria-controls="reguler">Kelas Regular</button>
<div class="collapse" id="reguler"><div class="card">
  <div class="card-body">
   <small>Kelas untuk mendalami materi pelajaran sekolah.</small>
  </div>
</div></div></div>

<div class="col-md-4 mb-3">
  <button type="button" class="btn btn-block mb-2 btn-info" data-toggle="collapse" data-target="#private" aria-expanded="false" aria-controls="private">Kelas Private</button>
<div class="collapse" id="private"><div class="card">
  <div class="card-body">
   <small>Kelas yang dirancang untuk siswa agar lebih leluasa berinteraksi dengan Tutor.</small>
  </div>
</div></div></div>
        
                  <div class="col-md-4 mb-3">
                    <button type="button" class="btn btn-block mb-2 btn-success" data-toggle="collapse" data-target="#intensif" aria-expanded="false" aria-controls="intensif">Kelas Intensif</button>
<div class="collapse" id="intensif"><div class="card">
  <div class="card-body">
    <small>Kelas untuk mendalami materi-materi Ujian Nasional, Ujian masuk Sekolah dan PTN favorit.</small>
  </div>
</div></div></div>

<div class="col-md-4 mb-3">
  <button type="button" class="btn btn-block mb-2 btn-warning" data-toggle="collapse" data-target="#master" aria-expanded="false" aria-controls="master">Kelas Master</button>
<div class="collapse" id="master"><div class="card">
  <div class="card-body">
<small>Kelas berjenjang yang dirancang untuk siswa dengan level-level yang terus meningkat.</small>
  </div>
</div></div></div>

<div class="col-md-4 mb-3">
  <button type="button" class="btn btn-block mb-2 btn-danger" data-toggle="collapse" data-target="#olimpiade" aria-expanded="false" aria-controls="olimpiade">Kelas Olimpiade</button>
<div class="collapse" id="olimpiade"><div class="card">
  <div class="card-body">
<small>Kelas khusus persiapan menjuarai olimpiade sains.</small>
  </div>
</div></div></div>
       
       
<div class="col-md-4 mb-3">
  <button type="button" class="btn btn-block mb-2 btn-dark" data-toggle="collapse" data-target="#parenting" aria-expanded="false" aria-controls="parenting">Parenting Guide</button>
<div class="collapse" id="parenting"><div class="card">
  <div class="card-body">
   <small>Kelas khusus orang tua untuk menjadikan putra dan putrinya berprestasi.</small>
  </div>
</div></div></div>

<div class="col-md-4 offset-md-4 mb-3">
  <button type="button" class="btn btn-block mb-2 btn-light" data-toggle="collapse" data-target="#camp" aria-expanded="false" aria-controls="camp">Olimpiade Camp</button>
<div class="collapse" id="camp"><div class="card">
  <div class="card-body">
   <small>Program khusus persiapan OSN menginap di penginapan, dilaksanakan 2 kali setahun.</small>
  </div>
</div></div></div>
        
        </div>

      
         </div>

         
        </div>
      </section>
      
             <section class="jumbotron m-0" style="color:white; border-radius:0; background-image:url({{asset('img/bg-fun.jpg')}});background-attachment: fixed; background-size:cover; background-position:center">
        <div class="container">
    <br>
    <br>
    <br><br><br>
    <br>
    <br><br>
        
         
        </div>
      </section>

<section class="jumbotron m-0" style="background-image:url({{asset('img/jigsaw.svg')}});border-radius:0 ">
        <div class="container text-center">
    <h5>Kunjungi Kami</h5>
          <i class="fas fa-building"></i> Jalan Balai Pustaka Timur Blok B06 - Rawamangun, Jakarta Timur
          <br>
          <i class="fas fa-phone"></i> (021) 471-0673 <br><i class="fas fa-envelope-open"></i> prosesedu@gmail.com
        </section>
        
       <section class="jumbotron m-0 p-0" style=" border-radius:0;">
          <div class="col-md-12 p-0">
     <div class="map-responsive"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.97348767127!2d106.8863901!3d-6.1984517!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x73b57b1e9dfe9b24!2sBimbingan+Belajar+Proses+(Problem+Solver+Society)!5e0!3m2!1sen!2sid!4v1532070644798" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
      </div>
      </section>
      
          <section class="jumbotron m-0" style="background-image:url({{asset('img/leaf.svg')}});  border-radius:0;">
        <div class="container text-center">
          <div class="row">
             
            <div class="col-md-6 offset-md-3">
 <h5>Hubungi Kami</h5>
          <hr>
<form role="form" action="" method="POST">
    {{ csrf_field() }}
<div class="input-group mb-2">
  <input type="text" aria-label="name" placeholder="Nama"  class="form-control">
  <input type="email" aria-label="email" placeholder="Alamat email"  class="form-control">
</div>

  <div class="form-group">
    <textarea name="note" placeholder="Ketik pesan..." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  
  <button class="btn btn-block btn-info" type="submit">Kirim Pesan</button>
</form>
<hr>
<div class="btn-group btn-group-justified" role="group" aria-label="Basic example">
  <a href="https://wa.me/"  target="_blank" class="btn btn-success " type="submit"><i class="fab fa-whatsapp"></i> Whatsapp</a>
  <a href="https://m.me/prosesedu" target="_blank" class="btn  btn-primary " type="submit"><i class="fab fa-facebook-messenger"></i> Messenger</a>
      </div>
</div>
  
          </div>
         </div>
      </section>
<section class="text-center p-2" style="background-color:#130f40;color:#fff;border-radius:0;">
      <div class="container">
        <span>© Proses 2018.</span>
      </div>
</section>
    </main>



    

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=3162112687401797&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
/*global $*/
$(document).ready(function(){
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        },
    }
});
});
</script>

<script>
  var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
</body>
</html>
