@extends('tryout.layout')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-lg-3 pr-1 pl-1 pb-0  ">
        @include('tryout.peserta.profile')
        </div>
        
        <div class="col-lg-6 pr-1 pl-1 pb-1 pt-0">
           @if (session('status'))
                        <div class="alert alert-success mb-0 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="alert alert-warning mb-0 mt-1">
  <strong>Perhatian!</strong> Waktu pengerjaan Try Out berjalan setelah memilih soal.</a>
</div>
        @include('tryout.peserta.daftar-soal-detail')
        </div>
        <div class="col-lg-3 pr-1 pl-1 pb-1">
        @include('layouts.nilai')
        </div>
    </div>
</div>   