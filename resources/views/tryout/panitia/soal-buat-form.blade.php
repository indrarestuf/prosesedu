<form role="form" action="{{url('tryout/soal/create')}}" method="POST">
    {{ csrf_field() }}
    
<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Kategori</span>
  </div>
  
   <select class="custom-select"  name="level_id" id="level" required>
    <option value="" >Pilih Jenjang</option>
    @foreach ($levels as $key => $value)
    <option value="{{$value->id}}">{{ $value->jenjang }}</option>
    @endforeach
  </select>
  
  <select class="custom-select"  name="pelajaran_id" id="pelajaran" required>
 <option value="">Pilih Materi</option>
  </select>
</div>
    
  <div class="form-group">
    <textarea name="pertanyaan" class="form-control" required id="soal" rows="3"></textarea>
  </div>
  
  <div class="row mb-3">
  <div class="col-md-12">
    
<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2 ">Pilihan A</h6>
 <textarea type="text" id="A" aria-label="A" contenteditable="true" required name="A" class="form-control">Klik di sini</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2 ">Pilihan B</h6>
 <textarea type="text" id="B" aria-label="B" contenteditable="true" required name="B" class="form-control">Klik di sini</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2d">Pilihan C</h6>
 <textarea type="text" id="C" aria-label="C" contenteditable="true" required name="C" class="form-control">Klik di sini</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2 ">Pilihan D</h6>
 <textarea type="text" id="D" aria-label="D" contenteditable="true" required name="D" class="form-control">Klik di sini</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class=" mb-2">Pilihan E (Jika ada)</h6>
 <textarea type="text" id="E" aria-label="E" contenteditable="true" name="E" class="form-control">Klik di sini</textarea>
</div></div>


 
  
        <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Jawaban Benar</span>
  </div>
  <select class="custom-select" required name="kunci" id="kunci">
    <option selected value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
        <option value="E">E</option>
  </select>
</div>

  </div>
  
  </div>
  
  <button class="btn btn-block btn-primary" type="submit">Tambahkan Soal</button>
</form>