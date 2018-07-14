<div class="collapse multi-collapse" id="lupa">
    <small class="text-center text-muted"><i class="fa fa-info-circle"></i>&nbsp; Kirim Tautan untuk mengubah kata sandi</small>   
<br><br>
            <form class="password-form"  method="POST" action="{{ route('password.email') }}">
                 {{ csrf_field() }}
                 
                 <div class="input-group">
  <input type="email" name="email" class="form-control" placeholder="Alamat email" aria-label="email" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-send"></i></button>
  </div>
</div>
    </form>
      <a class="btn btn-flat btn-sm mt-2" data-toggle="collapse" data-target=".multi-collapse"  href="#login" role="button" aria-expanded="false" aria-controls="login">
    Kembali
  </a>
</div>