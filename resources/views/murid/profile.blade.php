@extends('layouts.app')

@section('content')
@include('layouts.profile')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                        @include('layouts.menu')
            <br>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<form role="form" action="{{ route('murid.profileupdate') }}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Kelas</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->profile->kelas}}" name="kelas">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Sekolah</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->profile->sekolah}}" name="sekolah">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Orang Tua</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->profile->ortu}}" name="ortu">
  </div>
  <div class="form-group">
    <label for="isi">Note</label>
    <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{Auth::user()->profile->note}}</textarea>
  </div>
  
  <button type="submit">Kirim</button>
</form>
</div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection