<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
   
    public function load(Request $request){
            $search = $request->id;
            
            
    $users = User::where('name','LIKE',"%{$search}%")
                           ->get();
             
    $outputhead = '';
    $outputbody = '';  
    $token = csrf_field();
    $delete = method_field('DELETE') ;
    
    $outputhead .= '<center><p>Hasil pencarian <b>'.$search.'</b></p></center>';
    
    
   if($users->isNotEmpty())   { 
    foreach ($users as $user){
    
    $outputbody .=  '<div class="media">
  <img class="mr-3" src="'.$user->gravatar.'"  width="50" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">'.$user->name.'</h5>
    '.$user->email.' | '.$user->created_at->diffForHumans().' | '.$user->role.'
    </div>
<form action="/admin/userdelete/'.$user->id.'" method="POST">
     '.$token.' '.$delete.'
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>
<a href="/murid/'.$user->id.'/follow"> <div class="btn btn-info btn-sm"><i class="fa fa-plus"></i></div> </a>
<a href="/murid/'.$user->id.'/unfollow"> <div class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></div> </a>
</div>
<hr>
                    ';
                
    }  

    echo $outputhead; 
    echo $outputbody; 
 }  
  else {
        echo 'data not found';
    }
    }
   
}
