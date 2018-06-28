@extends('layouts.app')
@section('content')
@include('layouts.profile')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('murid.caritutor')
                    <div  id="result-tutor"></div>
                    <br>
                    <div id="list-tutor">
@foreach($user->tutors as $tutor)
<div class="media">
  <img class="mr-3" src="{{ $tutor->gravatar }}"  width="50" alt="Generic placeholder image">
  <div class="media-body">
 <a href="{{route('tutor.profile',  $tutor->username)}}" ><h5 class="mt-0">{{ $tutor->name }}</h5></a>
    {{ $tutor->email }} | {{$tutor->created_at->diffForHumans()}} | {{ $tutor->role }}
    </div>
    <a href="{{route('unfollow', $tutor->id)}}"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
</div>
<hr>
@endforeach
</div>

                    </div>
                    </div>
                    <br>
@endsection