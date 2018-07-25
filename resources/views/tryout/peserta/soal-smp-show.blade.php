 @if(!count($soals))
 <div class="my-1 p-3 bg-white rounded box-shadow text-center">
     <i class="fa fa-file"></i>
     <p class="text-muted mb-0">Belum ada Soal</p>
     </div>
 @else
 <div id="load" style="position: relative;">
     
@foreach($soals as $soal)
<div class="my-1 p-3 bg-white rounded box-shadow">
<div class="card mb-2"><div class="card-header">
    Nomor {{ ($soals ->currentpage()-1) * $soals ->perpage() + $loop->index + 1 }} / {{$soals->lastPage()}}
    <button class="btn btn-primary float-right">Selesai</button>
  </div>
  <div class="card-body">
{!!$soal->pertanyaan!!}
  </div></div>
@if(!count($soal->jawaban))
<form>
<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)" type="radio" id="A" value="A"  name="pilihan" class="custom-control-input pilihan" >
  <label class="custom-control-label" for="A">{{$soal->A}}</label>
</div></div></div>

<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)"  type="radio" id="B" value="B" name="pilihan" class="custom-control-input pilihan" >
  <label class="custom-control-label" for="B">{{$soal->B}}</label>
</div></div></div>

<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)" type="radio" id="C" value="C" name="pilihan" class="custom-control-input pilihan">
  <label class="custom-control-label" for="C">{{$soal->C}}</label>
</div></div></div>

<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)" type="radio" id="D" value="D" name="pilihan" class="custom-control-input pilihan">
  <label class="custom-control-label" for="D">{{$soal->D}}</label>
</div></div></div>
</form>
@elseif(count($soal->jawaban))
<form>
<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)" type="radio" id="A" value="A"  name="pilihan" class="custom-control-input pilihan" {{$soal->jawaban->pilihan == 'A' ? 'checked':''}}>
  <label class="custom-control-label" for="A">{{$soal->A}}</label>
</div></div></div>

<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)"  type="radio" id="B" value="B" name="pilihan" class="custom-control-input pilihan" {{$soal->jawaban->pilihan == 'B' ? 'checked':''}}>
  <label class="custom-control-label" for="B">{{$soal->B}}</label>
</div></div></div>

<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)" type="radio" id="C" value="C" name="pilihan" class="custom-control-input pilihan"{{$soal->jawaban->pilihan == 'C' ? 'checked':''}}>
  <label class="custom-control-label" for="C">{{$soal->C}}</label>
</div></div></div>

<div class="card mb-2"><div class="card-body"><div class="custom-control custom-radio">
  <input onclick="jawab('{{$soal->id}}',this)" type="radio" id="D" value="D" name="pilihan" class="custom-control-input pilihan" {{$soal->jawaban->pilihan == 'D' ? 'checked':''}}>
  <label class="custom-control-label" for="D">{{$soal->D}}</label>
</div></div></div>
</form>
@endif
</div>
@endforeach
</div>
{{ $soals->links() }}
@endif