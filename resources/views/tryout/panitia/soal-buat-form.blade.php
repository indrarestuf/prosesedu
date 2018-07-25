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
  <div class="col-md-6">
      <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">A</span>
  </div>
  <input type="text" aria-label="A" required name="A" class="form-control">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">B</span>
  </div>
  <input type="text" aria-label="B" required name="B" class="form-control">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">C</span>
  </div>
  <input type="text" aria-label="C" required name="C" class="form-control">
</div>

  </div>
  
    <div class="col-md-6">
      <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">D</span>
  </div>
  <input type="text" aria-label="D" required name="D" class="form-control">
</div>
  
        <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">E</span>
  </div>
  <input type="text" aria-label="E" name="E" placeholder="tidak perlu diisi, jika pilihan sampai D" class="form-control">
</div>
 
  
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