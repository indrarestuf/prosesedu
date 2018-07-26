
@foreach($userjawabs as $userjawab)

{{$userjawab->pilihan}} = {{$userjawab->soal->kunci}}
<br>
@if($userjawab->pilihan == $userjawab->soal->kunci && $userjawab->soal->pelajaran_id == $userjawab->mapel_id)
1
@endif
<br>
@endforeach
Jawaban : {{$benar}} benar | {{$salah}} salah | {{$kosong}} Tidak terjawab | total : {{$soals->count()}} soal