@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<form role="form" action="{{ route('tutor.profileupdate') }}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Kelas</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="kelas">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Sekolah</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="sekolah">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Orang Tua</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="ortu">
  </div>
  <div class="form-group">
    <label for="isi">Note</label>
    <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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