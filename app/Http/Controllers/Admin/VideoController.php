<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        
        $video = Video::findOrFail(1); 
        return view('admin.video.video',compact('video'));
    }

    public function update(Request $request)
    {
       $aboutus = Video::findOrFail(1);
       $aboutus->title = $request->title;
       $aboutus->link = $request->link;

    $aboutus->save();

    $notification=array(
        'messege'=>'  Video Section Updated Successfully.',
        'alert-type'=>'success'
         );
     return redirect()->back()->with($notification);
       

    }
}
