@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('murid.menu')
            <br>
            <div class="card">
                <div class="card-body">
            @if (Auth::user()->role == 'Murid')
                    @include('murid.caritutor')
                    <div  id="result-tutor"></div>
                    @endif
                    </div>
                    </div>
                    <br>
@endsection