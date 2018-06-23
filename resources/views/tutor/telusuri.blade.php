@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('murid.menu')
            <br>
            <div class="card">
                <div class="card-body">
                    @if (Auth::user()->role == 'Tutor')
                    @include('tutor.carimurid')
                    <div  id="result-murid"></div>
                    @endif
                </div>
            </div>
            <br>
                    
@endsection