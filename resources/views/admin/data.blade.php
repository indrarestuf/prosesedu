<div class="my-1 p-3 bg-white rounded shadow"> 
Jumlah Tutor : {{$users->where('role', 'Tutor')->count()}}
<br>
Jumlah Murid : {{$users->where('role', 'Murid')->count()}}
<br>
Jumlah Laporan : {{$laporans->count()}}
</div>



