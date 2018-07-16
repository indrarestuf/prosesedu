<div class="my-1 p-3 bg-white rounded box-shadow">
@if(Auth::user()->role == 'Tutor')
Jumlah laporan : {{$laporans->where('user_id', Auth::user()->id)->count()}}
@elseif(Auth::user()->role == 'Murid')
Kehadiran :
{{$laporans->where('murid_id', $user->id)->where('hadir', 'Hadir')->count()}} kali
<br>
Absen : 
{{$laporans->where('murid_id', $user->id)->where('hadir', 'Absen')->count()}} kali
<br>
@if(count($laporans->where('murid_id', $user->id)->where('mapel', 'Matematika')))
<hr>
Matematika 
<br>
Kognitif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Matematika')->max('nilai_kognitif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Matematika')->min('nilai_kognitif')}}
<br>
Afektif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Matematika')->max('nilai_afektif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Matematika')->min('nilai_afektif')}}
<br>
@endif
@if(count($laporans->where('murid_id', $user->id)->where('mapel', 'Fisika')))
<hr>
Fisika
<br>
Kognitif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Fisika')->max('nilai_kognitif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Fisika')->min('nilai_kognitif')}}
<br>
Afektif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Fisika')->max('nilai_afektif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Fisika')->min('nilai_afektif')}}
<br>
@endif
@if(count($laporans->where('murid_id', $user->id)->where('mapel', 'Kimia')))
<hr>
Kimia
<br>
Kognitif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Kimia')->max('nilai_kognitif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Kimia')->min('nilai_kognitif')}}
<br>
Afektif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Kimia')->max('nilai_afektif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Kimia')->min('nilai_afektif')}}
<br>
@endif

@if(count($laporans->where('murid_id', $user->id)->where('mapel', 'Biologi')))
<hr>
Biologi
<br>
Kognitif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Biologi')->max('nilai_kognitif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Biologi')->min('nilai_kognitif')}}
<br>
Afektif <i class="fa fa-arrow-circle-o-up"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Biologi')->max('nilai_afektif')}}
&nbsp;
<i class="fa fa-arrow-circle-o-down"></i> {{$laporans->where('murid_id', $user->id)->where('mapel', 'Biologi')->min('nilai_afektif')}}
@endif
@endif
</div>