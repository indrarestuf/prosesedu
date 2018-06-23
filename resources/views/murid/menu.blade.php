@if (Auth::user()->role == 'Murid')
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link {{ Request::path() == 'murid/'.Auth::user()->username.'' ? 'active' : '' }}" href="{{route('murid.profile', Auth::user()->username)}}">Beranda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::path() == 'murid/profile/edit' ? 'active' : '' }}" href="{{url('murid/profile/edit')}}">Ubah Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Ubah Password</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::path() == 'murid/telusuri/tutor' ? 'active' : '' }}" href="{{url('murid/telusuri/tutor')}}">Cari Tutor</a>
  </li>
</ul>
@else
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link {{ Request::path() == 'tutor/'.Auth::user()->username.'' ? 'active' : '' }}" href="{{route('tutor.profile', Auth::user()->username)}}">Beranda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::path() == 'tutor/profile/edit' ? 'active' : '' }}" href="{{url('tutor/profile/edit')}}">Ubah Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Ubah Password</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::path() == 'tutor/telusuri/murid' ? 'active' : '' }}" href="{{url('tutor/telusuri/murid')}}">Cari Tutor</a>
  </li>
</ul>
@endif