<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="background-color:rgb(19, 15, 64, 0.9); color:#fff !important">
    <div class="container">
  <a class="navbar-brand" href="{{ url('/') }}">
      
                     <img src="{{asset('img/logo.png')}}" width="30" height="30" alt="">
                    {{ config('app.name', 'Laravel') }} <small><small><small>beta</small></small></small>
                </a>
 
  <button class="navbar-toggler btn-flat mt-1" style="border-color:transparent" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
  @auth
  <img src="{{Auth::user()->gravatar}}" class="rounded-circle border-avatar bg-white" width="30"></img> 
  @endauth
  @guest
  <span class="navbar-toggler-icon"></span>
  @endguest
    </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 justify-content-center">
 
    </ul>
    <ul class="navbar-nav justify-content-end">
        @auth
               @if(\Auth::user()->role == 'Admin')
      <li class="nav-item active">
       <a class="nav-link" href="{{ route('admin.userlist') }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30">&nbsp;&nbsp;{{Auth::user()->name}}</a>
      </li>
      @elseif (\Auth::user()->role == 'Tutor')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('tutor.profile', Auth::user()->username) }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30">&nbsp;&nbsp; {{Auth::user()->name}}</a>
      </li>
      @elseif (\Auth::user()->role == 'Murid')
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('murid.profile', Auth::user()->username) }}"><img src="{{Auth::user()->gravatar}}" class="rounded-circle bg-white border-avatar" width="30"> &nbsp;&nbsp;{{Auth::user()->name}}</a>
                            </li>
       @endif
       
      <li class="nav-item">
       
      </li>
       <button class="btn btn-outline-info btn-sm "  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="fa fa-sign-out"></i>  Keluar
                                    </button>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endauth
    @guest
    <li class="nav-item">
       <a class="nav-link" href="{{ route('login')}}">Masuk</a>
      </li>
      @endguest
</ul>
    <!--<form class="form-inline my-2 my-lg-0">-->
    <!--  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
    <!--  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
    <!--</form>-->
  </div>
  </div>
</nav>