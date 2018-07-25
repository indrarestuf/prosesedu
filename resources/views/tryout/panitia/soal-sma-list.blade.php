 @if(!count($soals))
 <div class="my-1 p-3 bg-white rounded box-shadow text-center">
     <i class="fa fa-file"></i>
     <p class="text-muted mb-0">Belum ada Soal</p>
     </div>
 @else
@foreach($soals as $soal)
<div class="my-1 p-3 bg-white rounded box-shadow">
<div class="card">
    <div class="card-header">
    Nomor {{ ($soals ->currentpage()-1) * $soals ->perpage() + $loop->index + 1 }}
                 <button type="button"  class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target=".laporan{{$soal->id}}"><i class="far fa-trash-alt"></i></button>

                <div class="modal fade laporan{{$soal->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                         <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Hapus soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
Anda akan menghapus soal Nomor {{$loop->iteration}}?
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-outline-dark " data-dismiss="modal">Batal</button>
         <form method="POST" action="{{url('/tryout/soal/delete/'.$soal->id.'')}}">  
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger "> Hapus</button>
                <input type="hidden" name="_method" value="DELETE">
        </form>
      </div></div></div></div>
                
         <a href="{{route('soalperbarui',$soal->id)}}" class="btn btn-primary btn-sm float-right mr-2"><i class="far fa-edit"></i></a>
  </div>
  <div class="card-body">
{!!$soal->pertanyaan!!}
  </div>
</div>
 <div class="row mb-3">
  <div class="col-md-6">
      <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">A</span>
  </div>
  <input type="text" aria-label="A" required name="A" disabled value="{{$soal->A}}" class="form-control">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">B</span>
  </div>
  <input type="text" aria-label="B" required name="B" disabled value="{{$soal->B}}" class="form-control">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">C</span>
  </div>
  <input type="text" aria-label="C" required name="C" disabled value="{{$soal->C}}" class="form-control">
</div>

  </div>
  
    <div class="col-md-6">
      <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">D</span>
  </div>
  <input type="text" aria-label="D" required name="D" disabled value="{{$soal->D}}" class="form-control">
</div>
  
        <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">E</span>
  </div>
  <input type="text" aria-label="E" name="E" placeholder="tidak perlu diisi, jika pilihan sampai D" disabled value="{{$soal->E}}" class="form-control">
</div>
 
  
        <div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text">Jawaban Benar</span>
  </div>
 <input type="text"  disabled value="{{$soal->kunci}}" class="form-control">
</div>
</div>
</div>
</div>
@endforeach
{{ $soals->links() }}
@endif