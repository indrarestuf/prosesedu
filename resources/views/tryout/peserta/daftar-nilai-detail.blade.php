 @if(!count($skors))
 <div class="my-1 p-3 bg-white rounded box-shadow text-center">
     <i class="fas fa-star"></i>
     <p class="text-muted mb-0">Belum ada Nilai Try Out</p>
     </div>
 @else
<div class="my-1 p-3 bg-white rounded box-shadow text-center" >
<p>Hasil Try Out</p>
<div class="table-responsive">
    
<table class="table table-sm  table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Materi</th>
      <th scope="col">Benar</th>
      <th scope="col">Salah</th>
      <th scope="col">Kosong</th>
      <th scope="col">Skor</th>
    </tr>
  </thead>
  <tbody>
    @foreach($skors as $skor)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$skor->pelajaran->mapel}}</td>
      <td>{{$skor->benar}}</td>
      <td>{{$skor->salah}}</td>
      <td>{{$skor->kosong}}</td>
      <td>{{$skor->point}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

</div>
@endif