 <div class="my-1 p-3 bg-white rounded shadow"> 
 <p>Ubah Kata Sandi</p>
 <hr class="mt-1 mb-1">
 @if(Auth::user()->role == 'Murid')
 <form method="POST" action="{{ route('murid.katasandiganti') }}">
@elseif(Auth::user()->role == 'Tutor')
 <form method="POST" action="{{ route('tutor.katasandiganti') }}">
@endif
                        @csrf
<div class="form-group">
    <input type="password" class="form-control" id="password" placeholder="Kata sandi saat ini" required name="password">
  </div>
    <div class="form-group">
    <input type="password" class="form-control" id="new_password" placeholder="Kata sandi baru"  required  name="new_password">
  </div>
    <div class="form-group">
    <input type="password" class="form-control" id="password_confirmation" placeholder="Konfirmasi kata sandi baru"  required  name="password_confirmation">
  </div>

                         <button class="btn btn-block btn-primary" type="submit">Perbarui Kata Sandi</button>
                    </form>
        </div>