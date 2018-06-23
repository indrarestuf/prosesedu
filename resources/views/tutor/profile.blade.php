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
    <label for="isi">Note</label>
    <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ Auth::user()->profile->note }}</textarea>
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