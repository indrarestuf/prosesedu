@extends('layouts.master')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-lg-3 pr-1 pl-1 pb-0  ">
        @include('layouts.profile')
        @include('layouts.listuser')
        </div>
        
        <div class="col-lg-6 pr-1 pl-1 pb-1 pt-0">
                    @if (session('status'))
                        <div class="alert alert-success mb-0">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="my-1 p-3 bg-white rounded shadow"> 
           <!-- search box container ends  -->
                    @include('tutor.carimurid')
                    <div  id="result-murid"></div>
                    <br>
                    <div id="list-murid">
@foreach($user->murids as $murid)
<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="{{$murid->gravatar}}" width="40" height="40" alt="Generic placeholder image">
  <div class="media-body">
    <a href="{{url('/siswa/'.$murid->username.'')}}"><p class="mt-0 mb-0">{{$murid->name}}</p></a>
    <small class="mt-0 ">{{$murid->username}} | {{$murid->created_at->diffForHumans()}} |{{$murid->role}}</small>
    </div>
<a type="submit" href="{{route('unfollow', $murid->id)}}" class="btn btn-outline btn-sm"><i class="fa fa-user-times"></i></a>
</div>
<hr>

@endforeach
</div>
</div>
        </div>
        <div class="col-lg-3 pr-1 pl-1 pb-1">
        @include('layouts.nilai')
        </div>
    </div>
</div>   
@endsection
