     <div class="collapse" id="lupa">      
<div class="my-1 p-3 bg-white rounded shadow"> 
            <form class="password-form"  method="POST" action="{{ route('password.email') }}">
                 {{ csrf_field() }}
      <div class="form-group">
      <input type="text" name="email" class="form-control" required placeholder="alamat email"/>
      </div>
       <button class="btn btn-block btn-primary" type="submit">Kirim Tautan ubah kata sandi</button>
    </form>
</div>
</div>