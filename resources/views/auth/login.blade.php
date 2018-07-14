@extends('layouts.master')
@section('content')
<div class="container" >
<div class="row" >
<div class="col-md-12 text-center mt-3" >
<div class="login-page mx-auto">
  <img src="{{asset('img/logo.png')}}" class="mb-3" width="50" height="50" alt="">
  

@if ($errors->any())        
@foreach ($errors->all() as $error)
<div class="alert alert-warning alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<span>{{ $error }}</span>
</div>
@endforeach
@endif
@if (session('status'))
    <div class="alert alert-info alert-dismissible" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <span>{{ session('status') }}</span>
    </div>
@endif
  @include('auth.loginform')
  <a class="btn btn-outline-info btn-sm mt-3"  href="/" role="button" >
   <i class="fa fa-home"></i> &nbsp;Kembali
  </a>
  </div>
</div>
</div>
</div>
</div>
@endsection