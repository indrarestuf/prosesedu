<form role="form" action="{{ url('tutor/'.$user->username.'/laporan') }}" method="POST">
    {{ csrf_field() }}
  <div class="input-group mb-3">
    <div class="btn-group btn-group-toggle justify-content-between" data-toggle="buttons">
  <label class="btn btn-outline-danger ">
    <input type="radio" name="hadir" value="0" id="option1" autocomplete="off" required> Absen
  </label>
  <label class="btn btn-outline-info" style="border-radius:0">
    <input type="radio" name="hadir" value="1"  id="option2" autocomplete="off" required > Hadir
  </label>
</div>
  <input type="text" class="form-control" name="nilai" placeholder="Ketik Nilai" required >
   <input type="text" class="form-control " id="mapel" name="mapel" placeholder="Ketik mata pelajaran" required >
   <div class="autocomplete"></div>
        <select class="form-control custom-select" id="" name="kelas" required >
      <option value="">Jenis Kelas</option>
      <option value="1">Kelas Regular</option>
      <option value="2">Kelas Private</option>
      <option value="3">Kelas Intensif</option>
      <option value="4">Kelas Master</option>
      <option value="5">Kelas Olimpiade</option>
    </select>
</div>
  <div class="form-group">
    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan" required ></textarea>
  </div>
  <button class="btn btn-outline-primary" type="submit">Kirim</button>
</form>