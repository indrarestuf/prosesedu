<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="background-color:rgb(19, 15, 64, 0.9)">
    <div class="container">
  <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 justify-content-center">
 
    </ul>
    <ul class="navbar-nav justify-content-end">
               @if (Auth::user()->role == 'Admin')
      <li class="nav-item active">
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
</ul>
    <!--<form class="form-inline my-2 my-lg-0">-->
    <!--  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
    <!--  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
    <!--</form>-->
  </div>
  </div>
</nav>