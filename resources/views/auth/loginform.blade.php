    <div class="my-1 p-3 bg-white rounded shadow"> 
    <form class="login-form"  method="POST" action="{{ route('login')}}">
        {{ csrf_field() }}
      <input type="text" name="username" class="form-control mb-1" value="{{ old('username') }}" required placeholder="Username"/>
 <div class="form-group has-feedback">
    <input type="password" id="password" name="password" class="form-control" required placeholder="Kata Sandi">
  </div>
      <button class="btn btn-block btn-primary" type="submit">Masuk</button>
    </form>
      <a class="btn btn-flat btn-sm mt-2" data-toggle="collapse" href="#lupa" role="button" aria-expanded="false" aria-controls="lupa">
    Lupa kata sandi?
  </a>
</div>