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
                        <li>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>