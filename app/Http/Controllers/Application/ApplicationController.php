<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class ApplicationController extends Controller
{
    //
  

    public function store(Request $request){
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $imageLink= Storage::disk('public')->put('avatars', $image);
        }
        $days = $request['days'];
        $handover = $request['handover'];
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];
        $name = $request['name'];
        $url = $imageLink;
        $comments = $request['comments'];
     
       
        $data=array('days'=>$days,"handover"=>$handover,"startDate"=>$startDate,"endDate"=>$endDate,"attachment"=>$url,"comments"=>$comments,"name"=>$name);
        DB::table('applications')->insert($data);
    }
}
