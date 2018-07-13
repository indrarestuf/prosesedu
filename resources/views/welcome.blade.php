@extends('layouts.master')
@section('content')
<div class="container" >
<div class="row" >
<div class="col-md-12 text-center mt-3" >
<div class="login-page mx-auto justify-content-center">
  <img src="{{asset('img/logo.png')}}" class="mb-3" width="50" height="50" alt="">
  
  <div class="form">
  	@if ($errors->any())        
            @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <span style="font-size:12px">{{ $error }}</span>
</div>
            @endforeach
@endif
  @include('auth.loginform')
  @include('auth.emailform')
  </div>
</div>
</div>
</div>
</div>
@endsection