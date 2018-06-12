@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
    </div>
</div>
<br>
@include('auth.partials.register-form')
<br>
@include('admin.search')
           
            <div class="card" >
                <div class="card-header">User yang baru ditambahkan</div>

                <div class="card-body">
<div  id="result"></div>
<div  id="list">
@include('admin.userlist')
</div>
            </div>
        </div>
    </div>
</div>
<br>



@endsection
