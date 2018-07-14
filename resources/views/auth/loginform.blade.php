    <div class="my-1 p-3 bg-white rounded shadow"> 

    <div class="collapse show multi-collapse" id="login">  
    <form class="login-form"  method="POST" action="{{ route('login')}}">
        {{ csrf_field() }}
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
  </div>
  <input type="text" name="username" class="form-control" value="{{ old('username') }}" required placeholder="Username">
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">&nbsp;<i class="fa fa-lock"></i></span>
  </div>
    <input type="password" id="password" name="password" class="form-control" required placeholder="Kata Sandi">
</div>
     
      <button class="btn btn-block btn-primary" type="submit">Masuk</button>
    </form>
      <a class="btn btn-flat btn-sm mt-2" data-toggle="collapse" data-target=".multi-collapse"  href="#lupa" role="button" aria-expanded="false" aria-controls="lupa">
    Lupa kata sandi?
  </a>
  </div>
    @include('auth.emailform')
</div>