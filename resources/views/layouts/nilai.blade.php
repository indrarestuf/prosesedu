
<div class="my-1 p-3 bg-white rounded box-shadow">
    <p class="mb-1">Pengumuman</p>
<hr>
@if(Auth::user()->role == 'Tutor')
{!!$infotutor->isi!!}
@else
{!!$infomurid->isi!!}
@endif
</div>
