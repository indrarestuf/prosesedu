<div class="my-1 p-3 bg-white rounded shadow">
@if($infotutor->untuk == 'Tutor')
Informasi untuk Tutor
<hr>
<form method="POST" action="{{route('admin.infotutor')}}">
    @csrf
<div class="form-group">
<textarea  id="isi" placeholder="Bagikan pengumuman"    type="text" class="form-control editor" name="isi" required rows="1">{!!$infotutor->isi!!}</textarea>
</div>
<button type="submit" class="btn btn-block btn-sm btn-info">
Kirim
</button>
</form>
@endif
<br>
@if($infomurid->untuk == 'Siswa')
Informasi untuk Siswa
<hr>
<form method="POST" action="{{route('admin.infomurid')}}">
    @csrf
<div class="form-group">
<textarea  id="isi" placeholder="Bagikan pengumuman" type="text" class="form-control editor" name="isi" required rows="1">{!!$infomurid->isi!!}</textarea>
</div>
<button type="submit" class="btn btn-block btn-sm btn-info">
Kirim
</button>
</form>
@endif
</div>



