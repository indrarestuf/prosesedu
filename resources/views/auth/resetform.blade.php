<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
<div class="login-form has-feedback">
    <input type="hidden" name="token" value="{{ $token }}">
      <input type="email" name="email" required placeholder="Alamat Email"/>
     <input type="password" id="password2" name="password" required placeholder="Kata Sandi">
    <input type="password" id="password-confirm" name="password_confirmation" required placeholder="Ketik Ulang Kata Sandi">
<button type="submit">ubah kata sandi</button>
</div>
</form>