<form role="form" action="{{ route('tutor.laporan') }}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Nilai</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="nilai">
  </div>
  <div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="hadir" class="custom-control-input" value="1">
  <label class="custom-control-label" for="customRadio1">Hadir</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="hadir" class="custom-control-input" value="0">
  <label class="custom-control-label" for="customRadio2">Tidak Hadir</label>
</div>
 
  <div class="form-group">
    <label for="kelas">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="kelas">
      <option value="1">1</option>
      <option value="1">2</option>
      <option value="1">3</option>
      <option value="1">4</option>
    </select>
  </div>
   <div class="form-group">
    <label for="level">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="level">
      <option value="1">1</option>
      <option value="1" >2</option>
      <option value="1">3</option>
      <option value="1">4</option>
      <option value="1">5</option>
    </select>
  </div>
    <div class="form-group">
    <label for="mapel">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="mapel">
      <option value="1">1</option>
      <option value="1">2</option>
      <option value="1">3</option>
      <option value="1">4</option>
      <option value="1">5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="isi">Example textarea</label>
    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit">Kirim</button>
</form>