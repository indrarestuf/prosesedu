@if (Auth::user()->id == $tutor)
    <button type="button" class="my-1 pl-3 pr-3 pb-2 pt-2 btn btn-block btn btn-light text-left box-shadow " data-toggle="modal" data-target="#laporan-form">
        <img src="{{ Auth::user()->gravatar }}" width="40" alt="" class="mr-2 rounded-circle bg-white border-avatar">
            <span class="text-muted small">Hai {{Auth::user()->username}}, buat laporan sekarang</span> 
            <hr class="mb-0 mt-0" style="margin-left:50px;">
    </button>
     @include('tutor.laporan-modal')
     
@elseif(Auth::user()->role == 'Tutor')
    <div class="my-1 pl-3 pr-3 pb-2 pt-2 bg-white rounded box-shadow ">
        <img src="{{ Auth::user()->gravatar }}" width="40" alt="" class="mr-2 rounded-circle bg-white border-avatar">
        <span class="text-muted small">Tambahkan {{$user->username}} untuk membuat laporan</span>
        <a href="{{route('follow', $user->id)}}"> <div class="btn btn-info btn-sm float-right mr-0 mt-2 "><i class="fa fa-plus"></i></div></a>
    </div>
@endif