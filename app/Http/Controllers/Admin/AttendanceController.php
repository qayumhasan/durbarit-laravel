<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\StaffDirectory;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index ()
    {
        $attents = StaffDirectory::all();
        return view('admin.human_resource.attendance.index',compact('attents'));
    }

    public function store(Request $request)
    {
        $data = array();
        $keydata = array();
        foreach($request->attendance as $key=>$value){
            array_push($data,$value);
            array_push($keydata,$key);
        }
        return $keydata;
        
    }
}
