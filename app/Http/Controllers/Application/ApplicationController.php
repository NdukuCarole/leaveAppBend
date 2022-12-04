<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApplicationController extends Controller
{
    //
  

    public function store(Request $request){
     
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
         
            $attachment = Storage::disk('public')->put('avatars', $image);
      
        }
        $days = $request['days'];
        $handover = $request['handover'];
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];
        $name = $request['name'];
        $url = $attachment;
        $comments = $request['comments'];
        $applicantId = $request['applicantId'];
     
       
        $data=array('days'=>$days,"handover"=>$handover,"startDate"=>$startDate,"endDate"=>$endDate,"attachment"=>$url,"comments"=>$comments,"name"=>$name,"applicantId"=>$applicantId);
        DB::table('applications')->insert($data);
    }
    public function getUsers(Request $request){
        $userId = Auth::user()->id;
        $users = User::where('id', '!=', $userId)->get();
        return response()->json([
            "status"=>'success',
            "data" => $users,
            
        ]);
    
    }
    public function getAllApplications(Request $request){
        
        $apps = DB::table('applications')->get();
        return response()->json([
            "status"=>'success',
            "data" => $apps,
            
        ]);
    
    }

}
