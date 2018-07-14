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
<body>
  
   <header>
       <div class="navbar navbar-dark  box-shadow" style="background-color:rgb(19, 15, 64, 0.9); ">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
           <img src="{{asset('img/logo.png')}}" width="30" height="30" alt="">
                    {{ config('app.name', 'Laravel') }}
          </a>
  <ul class="navbar-nav justify-content-end">
        @auth
               @if(\Auth::user()->role == 'Admin')
      <li class="nav-item active">
       <a class="nav-link" href="{{ route('admin.userlist') }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30">&nbsp;&nbsp;{{Auth::user()->name}}</a>
      </li>
      @elseif (\Auth::user()->role == 'Tutor')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('tutor.profile', Auth::user()->username) }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30">&nbsp;&nbsp;<b>{{Auth::user()->name}}</b></a>
      </li>
      @elseif (\Auth::user()->role == 'Murid')
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('murid.profile', Auth::user()->username) }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30"> &nbsp;&nbsp;{{Auth::user()->name}}</a>
                            </li>
       @endif
                                  @endauth
    @guest
               <a class="btn btn-outline-light "  href="{{ route('login') }}">
            <i class="fa fa-sign-in"></i>  Masuk
            </a>
      @endguest
</ul>
 
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">We are Problem Solver Society</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>


    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="{{ asset('js/style.js') }}" defer></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
</body>
</html>
