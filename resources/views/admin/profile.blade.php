<div class="my-1 p-3 bg-white rounded shadow"> 
<div class="profile-pic" >
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
</div>
</div>


@include('admin.addform')


