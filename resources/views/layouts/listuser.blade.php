<div class="my-1 pl-3 pr-3 pb-1 pt-1 bg-white rounded box-shadow">
        <small >{{ $user->role == 'Tutor' ? 'Murid' : 'Tutor' }}</small>
        
        @if(Auth::user()->id == $user->id)
        @if(Auth::user()->role == 'Tutor')
        <a href="{{url('tutor/telusuri/murid')}}" ><button type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-search"></i> Telusuri</button></a>
        @elseif(Auth::user()->role == 'Murid')
        <a href="{{url('murid/telusuri/tutor')}}"><button  type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-search"></i> Telusuri</button></a>
        @endif
        @endif
        <hr class="mt-2 mb-2">
        <div class="row">
            @if($user->role == 'Murid')
            <div class="owl-carousel owl-theme pl-3">
            @foreach($user->tutors as $guru)
            <div class="item">
            <a href="{{route('tutor.profile',  $guru->username)}}" style="text-decoration:none" data-toggle="tooltip" data-placement="top" title="{{ $guru->name }}" >  
            <center><img class="rounded-circle border-avatar" src="{{ $guru->gravatar }}"  width="64" alt="Generic placeholder image" >
            <small class="text-muted mt-0" >{{ $guru->username }}</small></center>
            </a>
            </div>
            @endforeach
            </div>
            
            @elseif($user->role == 'Tutor')
            <div class="owl-carousel owl-theme pl-3">
            @foreach($user->murids as $murid)
            <div class="item">
            <a href="{{route('murid.profile',  $murid->username)}}" style="text-decoration:none" data-toggle="tooltip" data-placement="top" title="{{ $murid->name }}" >  
            <center><img class="rounded-circle border-avatar" src="{{ $murid->gravatar }}"  width="64" alt="Generic placeholder image" >
            <small class="text-muted  mt-0" >{{ $murid->username }}</small></center>
            </a>
            </div>
            @endforeach
            </div>
            
            @endif
        </div>
</div>