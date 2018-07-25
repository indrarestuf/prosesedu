@extends('tryout.layout')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row mt-0">
      
        <div class="col-md-8 offset-md-2 pr-1 pl-1 pb-1 pt-0">
              @include('tryout.menu')
             @if (session('status'))
                        <div class="alert alert-success mb-0 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
 
        @include('tryout.panitia.soal-ptn-list')

        </div>
    </div>
</div>   
@endsection