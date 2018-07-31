<div class="my-1 p-3 bg-white rounded box-shadow">
<p class="text-muted">Soal Try Out SMP</p>
<hr>
<a href="{{url('tryout/smp/bahasa indonesia')}}">
<div class="chip bg-primary">
  Bahasa Indonesia ({{$soalsmp->where('pelajaran_id', 1)->count()}})
</div>
</a>
<a href="{{url('tryout/smp/bahasa inggris')}}">
<div class="chip bg-primary">
 Bahasa Inggris ({{$soalsmp->where('pelajaran_id', 2)->count()}})
</div>
</a>
<a href="{{url('tryout/smp/matematika')}}">
<div class="chip bg-primary">
 Matematika ({{$soalsmp->where('pelajaran_id', 3)->count()}})
</div>
</a>
<a href="{{url('tryout/smp/ipa')}}">
<div class="chip bg-primary">
IPA ({{$soalsmp->where('pelajaran_id', 4)->count()}})
</div>
</a>
</div>

<div class="my-1 p-3 bg-white rounded box-shadow">
    <p class="text-muted">Soal Try Out SMA</p>
    <hr>
<a href="{{url('tryout/sma/bahasa indonesia')}}">
<div class="chip bg-info">
  Bahasa Indonesia ({{$soalsma->where('pelajaran_id', 5)->count()}})
</div>
</a>
<a href="{{url('tryout/sma/bahasa inggris')}}">
<div class="chip bg-info">
 Bahasa Inggris ({{$soalsma->where('pelajaran_id', 6)->count()}})
</div>
</a>
<a href="{{url('tryout/sma/matematika')}}">
<div class="chip bg-info">
 Matematika ({{$soalsma->where('pelajaran_id', 7)->count()}})
</div>
</a>
<a href="{{url('tryout/sma/fisika')}}">
<div class="chip bg-info">
Fisika ({{$soalsma->where('pelajaran_id', 8)->count()}})
</div>
</a>
<a href="{{url('tryout/sma/kimia')}}">
<div class="chip bg-info">
Kimia ({{$soalsma->where('pelajaran_id', 9)->count()}})
</div>
</a>
<a href="{{url('tryout/sma/biologi')}}">
<div class="chip bg-info">
Biologi ({{$soalsma->where('pelajaran_id', 10)->count()}})
</div>
</a>
</div>

<div class="my-1 p-3 bg-white rounded box-shadow">
    <p class="text-muted">Soal Try Out PTN</p>
    <hr>
<a href="{{url('tryout/ptn/saintek')}}">
<div class="chip bg-success">
Saintek ({{$soalptn->where('pelajaran_id', 11)->count()}})
</div>
</a>

<a href="{{url('tryout/ptn/soshum')}}">
<div class="chip bg-success">
Soshum ({{$soalptn->where('pelajaran_id', 12)->count()}})
</div>
</a>

<a href="{{url('tryout/ptn/tkpa')}}">
<div class="chip bg-success">
TKPA ({{$soalptn->where('pelajaran_id', 13)->count()}})
</div>
</a>
</div>