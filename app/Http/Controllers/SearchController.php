<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class SearchController extends Controller
{
 public function search(Request $request){
    $search = $request->id;
    $users = User::where('name','LIKE',"%{$search}%")->get();  

    $outputhead = '';
    $outputbody = ''; 
    $outputdelete = ''; 
    $token = csrf_field();
    $delete = method_field('DELETE') ;
    
    $outputhead .= '<center><p>Hasil pencarian <b>'.$search.'</b></p></center>';
    
    
   if($users->isNotEmpty())   { 
    foreach ($users as $user){
        
    if($user->role == 'Tutor'){
          $outputbody .=  '<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="'.$user->gravatar.'" width="40" height="40"alt="Generic placeholder image">
  <div class="media-body">
    <a href="/tutor/'.$user->username.'"><p class="mt-0 mb-0">'.$user->name.'</p></a>
    <small class="mt-0 ">'.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'</small>
    </div>
    <form method="POST" action="/admin/userdelete/'.$user->id.'">
'.$token.'
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form></div>
<hr>';  
    }
    
    elseif($user->role == 'Murid'){
          $outputbody .=  '<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="'.$user->gravatar.'" width="40" height="40" alt="Generic placeholder image">
  <div class="media-body">
    <a href="/murid/'.$user->username.'"><p class="mt-0 mb-0">'.$user->name.'</p></a>
    <small class="mt-0 ">'.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'</small>
    </div>
    <form method="POST" action="/admin/userdelete/'.$user->id.'">
'.$token.'
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form></div>
<hr>';  
    }
    
    elseif($user->role == 'Admin'){
          $outputbody .=  '<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="'.$user->gravatar.'"  width="40" height="40" alt="Generic placeholder image">
  <div class="media-body">
    <a href=""><p class="mt-0 mb-0">'.$user->name.'</p></a>
    <small class="mt-0 ">'.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'</small>
    </div> 
</div>
<hr>';  
    }
 
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
