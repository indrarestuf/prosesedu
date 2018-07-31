@extends('tryout.layout')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row mt-0">
        <div class="col-md-8 offset-md-2 pr-1 pl-1 pb-1 pt-0">
<div class="my-1 p-3 bg-primary rounded box-shadow text-center" style="color:#fff">
     
<h1 class="display-4"><div class="timer">--:--</div></h1>
</div>
  <div class="soals">
        @include('tryout.peserta.soal-sma-show')
</div>
        </div>
    </div>
</div>   
@endsection