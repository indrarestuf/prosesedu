    <div class="my-1 p-3 bg-white rounded shadow"> 
<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
    @csrf
<input type="hidden" name="token" value="{{ $token }}">
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
  </div>
  <input type="text" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Alamat email">
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">&nbsp;<i class="fa fa-lock"></i></span>
  </div>
    <input type="password" id="password" name="password" class="form-control" required placeholder="Kata Sandi">
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">&nbsp;<i class="fa fa-lock"></i></span>
  </div>
    <input type="password" id="password-confirmation" name="password_confirmation" class="form-control" required placeholder="Kata Sandi">
</div>


<button class="btn btn-block btn-primary" type="submit">Ubah Kata Sandi</button>
</div>
</form>
</div>