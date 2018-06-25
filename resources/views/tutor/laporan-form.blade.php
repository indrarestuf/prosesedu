<form role="form" action="{{ url('tutor/'.$user->username.'/laporan') }}" method="POST">
    {{ csrf_field() }}
 
  <div class="input-group mb-3">
    <div class="btn-group btn-group-toggle justify-content-between" data-toggle="buttons">
  <label class="btn btn-outline-danger ">
    <input type="radio" name="hadir" value="0" id="option1" autocomplete="off" checked> Absen
  </label>
  <label class="btn btn-outline-info" style="border-radius:0">
    <input type="radio" name="hadir" value="1"  id="option2" autocomplete="off" > Hadir
  </label>
</div>
  <input type="text" class="form-control" name="nilai" placeholder="Ketik Nilai">
   <input type="text" class="form-control" name="mapel" placeholder="Ketik mata pelajaran">
        <select class="form-control custom-select" id="" name="kelas">
      <option selected disableds>Jenis Kelas</option>
      <option value="1">Kelas Regular</option>
      <option value="2">Kelas Private</option>
      <option value="3">Kelas Intensif</option>
      <option value="4">Kelas Master</option>
      <option value="5">Kelas Olimpiade</option>
    </select>
</div>
  <div class="form-group">
    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan"></textarea>
  </div>
  <button class="btn btn-outline-primary" type="submit">Kirim</button>
</form>