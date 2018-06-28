@extends('layouts.app')
@section('content')
@include('layouts.profile')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.menu')
            <br>
            <div class="card">
                <div class="card-body">
                    @include('tutor.carimurid')
                    <div  id="result-murid"></div>
                    <br>
                    <div id="list-murid">
@foreach($user->murids as $murid)
<div class="media">
  <img class="mr-3" src="{{ $murid->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('murid.profile',  $murid->username)}}" ><h5 class="mt-0">{{ $murid->name }}</h5></a>
    {{ $murid->email }} | {{$murid->created_at->diffForHumans()}} | {{ $murid->role }}
    </div>
    <a href="{{route('unfollow', $murid->id)}}"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
</div>
<hr>
@endforeach

                </div>
            </div>
            <br>
                    
@endsection