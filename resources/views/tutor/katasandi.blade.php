 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('murid.menu')
            <br>
            <div class="card">
                <div class="card-header">Ubah Kata Sandi</div>

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 <form method="POST" action="{{ route('tutor.katasandiganti') }}">
                        @csrf
                        
                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       <div class="form-group row">
                            <label for="new_password" class="col-md-4 col-form-label text-md-right">Kata Sandi Baru</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>

                                @if ($errors->has('new_password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Kata Sandi Baru</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ubah Kata Sandi
                                </button>
                            </div>
                        </div>
                    </form>
                                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
