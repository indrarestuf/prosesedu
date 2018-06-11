@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
    </div>
</div>
<br>
@include('auth.partials.register-form')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- search box container starts  -->
    <div class="search">
        <h3 class="text-center title-color">Ajax Live Search Table Demo</h3>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <span class="input-group-addon" style="color: white; background-color: rgb(124,77,255);">BLOG SEARCH</span>
                    <input type="text" autocomplete="off" id="search" class="form-control input-lg" placeholder="Enter Blog Title Here">
                </div>
            </div>
        </div>   
    </div>  
<!-- search box container ends  -->
<div id="txtHint" class="title-color" style="padding-top:50px; text-align:center;" ><b>Blogs information will be listed here...</b></div>
     
           
            <div class="card">
                <div class="card-header">User yang baru ditambahkan</div>

                <div class="card-body">
@foreach($users as $user)
@if ($user->isMurid())
<div class="media">
  <img class="mr-3" src="{{ $user->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">{{ $user->name }}</h5>
    {{ $user->email }} | {{$user->created_at->diffForHumans()}} | Murid
    </div>
        <form method="user" action="{{url('/admin/userdelete/'.$user->id.'')}}">
{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>
</div>
<hr>
@endif

@if ($user->isTutor())
<div class="media">
  <img class="mr-3" src="{{ $user->gravatar }}" width="50" style="border-radius:100px;" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">{{ $user->name }}</h5>
    {{ $user->email }} | {{$user->created_at->diffForHumans()}} | Tutor
    </div>
    <form method="user" action="{{url('/admin/userdelete/'.$user->id.'')}}">
{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>
</div>
<hr>
@endif
@endforeach
<center>
<a href="#" style="text:decoration:none;"> <p>Lihat semua user</p></a>
</center>
                </div>
            </div>
        </div>
    </div>
</div>
<br>



@endsection
