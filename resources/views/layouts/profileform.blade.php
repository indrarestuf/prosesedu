 <div class="my-1 p-3 bg-white rounded shadow"> 
 <p>Ubah Profile</p>
 <hr class="mt-1 mb-1">
@if(Auth::user()->role == 'Murid')
<form role="form" action="{{ route('murid.profileupdate') }}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Kelas</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->profile->kelas}}" name="kelas">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Sekolah</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->profile->sekolah}}" name="sekolah">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Orang Tua</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->profile->ortu}}" name="ortu">
  </div>

  <div class="form-group">
    <label for="isi">Catatan</label>
    <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{Auth::user()->profile->note}}</textarea>
  </div>
  
  <button class="btn btn-block btn-primary" type="submit">Kirim</button>
</form>
@elseif(Auth::user()->role == 'Tutor')
<form role="form" action="{{ route('tutor.profileupdate') }}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="isi">Catatan</label>
    <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{Auth::user()->profile->note}}</textarea>
  </div>
  
  <button class="btn btn-block btn-primary" type="submit">Perbarui Profile</button>
</form>
@endif
        </div>