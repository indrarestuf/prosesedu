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

                    You are logged in!
                    <a href="{{route('admin.userlist')}}"><div class="btn btn-primary">tambah user</div></a>
                    {{Auth::user()->role}}
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection
