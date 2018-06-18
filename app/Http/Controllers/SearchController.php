<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class SearchController extends Controller
{
   
    public function load(Request $request){
            $search = $request->id;
            
    if (Auth::user()->role == 'Tutor') {
      $users = User::where('name','LIKE',"%{$search}%")->where('role' , 2)
                           ->get();  
    }     
    elseif (Auth::user()->role == 'Murid') {
     $users = User::where('name','LIKE',"%{$search}%")->where('role', 1)
                           ->get();
    }
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
    '.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'
    </div>
</div>
<hr>';  
    }  

    echo $outputhead; 
    echo $outputbody; 
 }  
  else {
        echo $outputhead;
        echo 'tidak ditemukan';
    }
    }
   
}
