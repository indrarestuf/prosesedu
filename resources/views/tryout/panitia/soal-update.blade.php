@extends('tryout.layout')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row  mt-0">
        <div class="col-md-8 offset-md-2 pr-1 pl-1 pb-1 pt-0">
          @include('tryout.menu')
             @if (session('status'))
                        <div class="alert alert-success mb-0 mt-1">
                            {{ session('status') }}
                        </div>
            @endif
 <div class="my-1 p-3 bg-white rounded box-shadow">
     
<form role="form" action="{{route('soalupdate', $soal->id)}}" method="POST">
    {{ csrf_field() }}
    
<div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Kategori</span>
  </div>
  
   <select class="custom-select"  name="level_id" id="level" required>
    <option {{$soal->level->id == 1 ? 'selected':''}} value="1">SMP</option>
    <option {{$soal->level->id == 2 ? 'selected':''}} value="2" >SMA</option>
    <option {{$soal->level->id == 3 ? 'selected':''}} value="3" >PTN</option>
  </select>
  
  <select class="custom-select" name="pelajaran_id" id="pelajaran" required>
@foreach($pelajarans as $pelajaran)
@if($soal->level->id == $pelajaran->level_id )
 <option value="{{$pelajaran->id}}" {{$pelajaran->id == $soal->pelajaran_id ? 'selected':''}}>{{$pelajaran->mapel}}</option>
@endif
@endforeach
  </select>
</div>
    
  <div class="form-group">
    <textarea name="pertanyaan" class="form-control" required id="soal" rows="3">{{$soal->pertanyaan}}</textarea>
  </div>
  
  <div class="row mb-3">
  <div class="col-md-12">
  
 <div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2 ">Pilihan A</h6>
 <textarea type="text" id="A" aria-label="A" contenteditable="true" required name="A" class="form-control">{!!$soal->A!!}</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2 ">Pilihan B</h6>
 <textarea type="text" id="B" aria-label="B" contenteditable="true" required name="B" class="form-control">{!!$soal->B!!}</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2d">Pilihan C</h6>
 <textarea type="text" id="C" aria-label="C" contenteditable="true" required name="C" class="form-control">{!!$soal->C!!}</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class="card-subtitle mb-2 ">Pilihan D</h6>
 <textarea type="text" id="D" aria-label="D" contenteditable="true" required name="D" class="form-control">{!!$soal->D!!}</textarea>
</div></div>

<div class="card mb-2 p-0"><div class="card-body p-2 text-muted"><h6 class=" mb-2">Pilihan E (Jika ada)</h6>
 <textarea type="text" id="E" aria-label="E" contenteditable="true" name="E" class="form-control">{!!$soal->E!!}</textarea>
</div></div>
  
        <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Jawaban Benar</span>
  </div>
  <select class="custom-select" required name="kunci" id="kunci">
    <option {{$soal->kunci == 'A' ? 'selected':'' }} value="A">A</option>
    <option {{$soal->kunci == 'B' ? 'selected':'' }} value="B">B</option>
    <option {{$soal->kunci == 'C' ? 'selected':'' }} value="C">C</option>
    <option {{$soal->kunci == 'D' ? 'selected':'' }} value="D">D</option>
    <option {{$soal->kunci == 'E' ? 'selected':'' }} value="E">E</option>
  </select>
</div>

  </div>
  
  </div>
  
  <button class="btn btn-block btn-primary" type="submit">Ubah Soal</button>
</form>

</div>
        
    </div>
        </div>
    </div>
</div>   
@endsection