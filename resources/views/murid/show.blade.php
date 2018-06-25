@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('murid.menu')
            <br>
            
            <div class="card">
                 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card-body">
            @if ($tutors != Null && $tutors->pivot->tutor_id == Auth::user()->id)
                    @include('tutor.laporan-form')
                    @else
                    <p>Add aja</p>
                    <a href="{{route('follow', $user->id)}}"> <div class="btn btn-info btn-sm"><i class="fa fa-plus"></i></div> </a>
                    @endif
                    </div></div>
                    <br>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in!
                    <br>
                    {{$user->name}}
                    <br>
                    {{$user->role}}
                    
                    
                    
                    
                    
                    
                    
                <br>    
                
                                <br>    
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
    </div>
</div>
<br>
@endsection