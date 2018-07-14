<div class="my-1 p-3 bg-white rounded shadow"> 

<div class="row">
    
<div class="col-xs-3 pt-1 pl-3">
    	<img class="border-avatar rounded-circle" width="50" src="{{Auth::user()->gravatar}}">
</div>

<div class="col-xs-9 pl-2 mt-1 ">
	<b>{{Auth::user()->name}}</b>
    <br class="mb-0 mt-0">
	<small>{{Auth::user()->role}}</small>
</div>
</div>
<hr>

<div class="btn-group btn-group-sm mx-auto btn-group-justified" role="group" aria-label="Basic example">
<a href="{{url('/admin/user')}}" type="button" class="btn btn-light"><i class="fa fa-users"></i></a>
<button type="button" class="btn btn-light"  data-toggle="collapse" data-target="#adduser" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-user-plus"></i></button>
<a href="{{url('/admin/user/feeds')}}" type="button" class="btn btn-light"><i class="fa fa-list"></i></a>
<a href="{{url('/admin/user/review')}}" type="button" class="btn btn-light"><i class="fa fa-star"></i></a>
</div>

</div>

<div class="collapse" id="adduser">
@include('admin.addform')
</div>


