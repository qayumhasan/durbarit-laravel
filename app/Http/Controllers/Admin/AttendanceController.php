<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\AttendanceCount;
use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\StaffDirectory;
use App\StaffRole;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function staffSearch(Request $request)
    {

        
        
        $role = StaffRole::all();
        $designation = Designation::all();
        $department = Department::all();

        $attents = StaffDirectory::where('role',$request->role)->where('department_id',$request->department)->where('designation_id',$request->designation)->get();
        
        return view('admin.human_resource.attendance.index',compact('attents','designation','role','department'));
    }
    public function index ()
    {
        $role = StaffRole::all();
        $designation = Designation::all();
        $department = Department::all();

        $attents = StaffDirectory::all();
        
        return view('admin.human_resource.attendance.index',compact('attents','designation','role','department'));
    }

    public function store(Request $request)
    {
        
        // return Carbon::now()->toDateString();

        
    $checkatt=Attendance::where('attend_date',Carbon::now()->toDateString())->first();
    if(!$checkatt){
        foreach($request->attendance as $key=>$row){
            $att = new Attendance;
            $att->staff_id = $key;
            $att->attendance = $row;
            $att->month = date('F');
            $att->year = date('Y');
            $att->day = date('d');
            if($row=='present'){
                $this->countAttendance($key,'present');
            }elseif($row=='absent'){
                $this->countAttendance($key,'absent');
            }elseif($row=='late'){
                $this->countAttendance($key,'late');
            }

            $att->attend_date = Carbon::now()->toDateString();
            $att->save();
          }
          foreach($request->note as $key=>$row){
            $att = Attendance::where('staff_id',$key)->first();
            $att->note = $row;
            $att->save();
            
          }

          $notification=array(
            'messege'=>' Staff Attendance submit Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }else{
        $notification=array(
            'messege'=>' You are already submit today Attendance.',
            'alert-type'=>'error'
             );
         return redirect()->back()->with($notification);
    }
   
      return back();
        
    }


    public function countAttendance($id,$type)
    {
        $att =AttendanceCount::where('staff_id',$id)->first();
        if($att){
            if($type == 'present'){
                $att->increment('present');
            }elseif($type == 'absent'){
                $att->increment('absent');
            }elseif($type == 'late'){
                $att->increment('late');
            }
        }else{
            $newatt = new AttendanceCount();
            $newatt->staff_id = $id;
            $newatt->month = date('F');
            $newatt->year = date('Y');
            if($type == 'present'){

                $newatt->present=1;

            }elseif($type == 'absent'){

                $newatt->absent=1;

            }elseif($type == 'late'){
                
                $newatt->late=1;
            }

            $newatt->save();
        }
    }

    public function reportShow()
    {
     
       
       

        $attents = [];

        return view('admin.human_resource.attendance_report.index',compact('attents'));
    }

    public function reportSearch(Request $request)
    {
        
        $attents = Attendance::where('month',$request->month)->where('year',$request->year)->get();
        $unique = $attents->unique('staff_id');

        $attents =$unique->values()->all();
     
        return view('admin.human_resource.attendance_report.index',compact('attents'));
    }

    public function singleReportShow($id,$year)
    {
        $staff = StaffDirectory::findOrFail($id);
        return view('admin.human_resource.attendance_report.show',compact('staff','id','year'));
    }
}
