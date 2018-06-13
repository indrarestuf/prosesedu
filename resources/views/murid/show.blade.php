@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$user->name}} are logged in!
                    {{$user->role}}
                    <a href="{{route('unfollow', $user->id)}}"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection