<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\StaffDirectory;
use App\StaffRole;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        
        $roles = StaffRole::all();
        $department = Department::all();
        $atts = [];
        return view('admin.payroll.index',compact('roles','department','atts'));
    }

    public function payrollSearch(Request $request)
    {
        $request->validate([
            'role'=>'required',
            'department'=>'required',
            'year'=>'required',
            'month'=>'required',
        ]);
        $roles = StaffRole::all();
        
        $department = Department::all();
        $atts =Attendance::with('staff')->where('role',$request->role)->where('department',$request->department)->where('month',$request->month)->where('year',$request->year)->get();
        $attsQuery =$atts->unique('staff_id');
        $atts = $attsQuery->values()->all();
        return view('admin.payroll.index',compact('roles','department','atts'));
        
        


        

    }

    public function payrollGenerate ($id,$month)
    {
        $staff = StaffDirectory::findOrFail($id);

        $att =Attendance::where('month',$month)->where('staff_id',$id)->get();
        $staffID = [];
        foreach ($att as $key => $value) {
            $staffdata= $value->staff_id;
            array_push($staffID,$staffdata);
        }

        if($staffID == 0){
            $notification=array(
                'messege'=>' No Data Found.',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }

        $countPresent = 0;
        $countAbsent = 0;
        $countLate = 0;

        $staff_no =array_unique($staffID);
        
     
        
            
            $staffByAtt =Attendance::where('month',$month)->whereIn('staff_id',$staff_no)->get();

            foreach ($staffByAtt as $key => $value) {
                
                if($value->attendance == "present")
                {
                    $countPresent = $countPresent + 1;
                }elseif($value->attendance == "absent")
                {
                    $countAbsent = $countAbsent + 1;
                }elseif($value->attendance == "late"){
                    $countLate = $countLate + 1;
                }
            } 

        

        
        return view('admin.payroll.show',compact('staff','month','countPresent','countAbsent','countLate'));

    }
}
