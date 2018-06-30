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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/style.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth
                        <!-- Authentication Links -->
                        @if (Auth::user()->role == 'Admin')
                         <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.userlist') }}">Dashboard</a>
                            </li>
                        @elseif (Auth::user()->role == 'Tutor')
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('tutor.profile', Auth::user()->username) }}">Dashboard</a>
                            </li>
                        @elseif (Auth::user()->role == 'Murid')
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('murid.profile', Auth::user()->username) }}">Dashboard</a>
                            </li>
                        @endif
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre aria-labelledby="dropdownMenuOffset">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     @if(Auth::user()->role == 'Tutor')
                                     <a class="dropdown-item" href="{{url('tutor/profile/edit')}}">Ubah Profile</a>
                                     <a class="dropdown-item" href="{{url('tutor/kata-sandi')}}">Ubah Password</a>
                                    @elseif(Auth::user()->role == 'Murid')
                                     <a class="dropdown-item" href="{{url('murid/profile/edit')}}">Ubah Profile</a>
                                     <a class="dropdown-item"href="{{url('murid/kata-sandi')}}">Ubah Password</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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


</body>
</html>
