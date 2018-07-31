@extends('tryout.layout')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row mt-0">
        <div class="col-md-8 offset-md-2 pr-1 pl-1 pb-1 pt-0">
        @include('tryout.peserta.soal-ptn-hasil-list')
        </div>
    </div>
</div>   
@endsection