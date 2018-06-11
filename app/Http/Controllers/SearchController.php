<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request)
    { 
        $search = $request->id;

        if (is_null($search))
        {
           return view('admin.user');		   
        }
        else
        {
            $users = User::where('title','LIKE',"%{$search}%")
                           ->get();

            return view('admin.search')->withUsers($users);
        }
    }
    
    public function load(Request $request){
            $search = $request->id;
    $users = User::where('name','LIKE',"%{$search}%")
                           ->get();
                    if(!empty($users ))  
{ 

    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
                  
    foreach ($users as $user)    
    {   
    $outputbody .=  ' 
                
                            <tr> 
		                        <td>'.$count++.'</td>
		                        <td>'.$user->name.'</td>
		                        <td>'.$user->gravatar.'</td>
                                <td><a href="#" target="_blank" title="SHOW" ><span class="glyphicon glyphicon-list"></span></a></td>
                            </tr> 
                    ';
                
    }  

    $outputtail .= ' 
                        </tbody>
                    </table>
                </div>';
         
    echo $outputhead; 
    echo $outputbody; 
    echo $outputtail; 
 }  
 
 else  
 {  
    echo 'Data Not Found';  
 } 
    }
}
