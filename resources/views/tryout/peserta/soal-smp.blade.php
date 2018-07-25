@extends('tryout.layout')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row mt-0">
        <div class="col-md-8 offset-md-2 pr-1 pl-1 pb-1 pt-0">
<div class="my-1 p-3 bg-white rounded box-shadow text-center">
     <i class="fas fa-stopwatch"></i>
<h3><div class="timer">--:--</div></h3>
        <button id="reset">reset</button>
        <button id="pause">pause</button>
</div>
  <div class="soals">
        @include('tryout.peserta.soal-smp-show')
</div>
        </div>
    </div>
</div>   
@endsection