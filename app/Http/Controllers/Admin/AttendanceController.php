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

use function GuzzleHttp\json_decode;

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
        $checkatt=Attendance::where('month',date('F'))->where('year',date('Y'))->where('date',date('d-m-Y'))->first();
        if($checkatt){
            $notification=array(
                'messege'=>' You already Take Todays attendance.',
                'alert-type'=>'warning'
                 );
             return redirect()->back()->with($notification);
        }
        

        if ($request->attendance == NULL) {
            $notification=array(
                'messege'=>' You did not check any Empaloye\'s attendance status.',
                'alert-type'=>'warning'
                 );
             return redirect()->back()->with($notification);
            
        }

        
        $index = 0;
        $notes = $request->note;
       
        date_default_timezone_set('Asia/Dhaka');

        foreach ($request->attendance as $emapoly_id => $attendance_status) {

            $staff = StaffDirectory::findOrFail($emapoly_id);

            
            $addCurrentDayAttendance = new Attendance();

            $addCurrentDayAttendance->staff_id = $emapoly_id;
            $addCurrentDayAttendance->month = date('F');
            $addCurrentDayAttendance->year = date('Y');
            $addCurrentDayAttendance->date = date('d-m-Y');
            $addCurrentDayAttendance->attendance = $attendance_status;
            $addCurrentDayAttendance->note = $notes[$index] ? $notes[$index] : NULL;
            if($staff){
                $addCurrentDayAttendance->role =$staff->role;
                $addCurrentDayAttendance->department =$staff->department_id;
                $addCurrentDayAttendance->designation =$staff->designation_id;
            }
            $addCurrentDayAttendance->save();
            $index++;
        }

        
        
        $notification=array(
            'messege'=>' Successfully Current day attendance has been taken..',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);

        
    }


   

    public function reportSearch(Request $request)
    {
        
        $request->validate([
            'role' => 'required',
            'department' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);
        
        $checkatt=Attendance::where('month',$request->month)->where('year',$request->year)->first(); 
        if(!$checkatt){
            $notification=array(
                'messege'=>' No Data Found Of your selected Month and Year.',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }
        $staffs = StaffDirectory::where('role',$request->role)->where('department_id',$request->department)->get();
        $roles = StaffRole::all();
        $department = Department::all();


        

        $yearMonth = date('Y-F');
        $splitYearMonth = explode('-', $yearMonth);
        $requestYear = $splitYearMonth[0];
        $requestMonth = $splitYearMonth[1];

        $monthLists = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8, 'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];
        $monthDates = array();
        $month = $monthLists[$requestMonth];
        $year = $requestYear;
        
        for($d=1; $d<=31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, 2020);          
            if (date('m', $time) == $month)       
            $monthDates[] = date('d-D', $time);
        }
        $year = $request->year;
        $month = $request->month;


        return view('admin.human_resource.attendance_report.index',compact('roles','department','staffs','monthDates','month','year'));
    }

    public function reportShow(Request $request)
    {
        
        $roles = StaffRole::all();
        $department = Department::all();
        $staffs = [];
        return view('admin.human_resource.attendance_report.index',compact('roles','department','staffs'));
    }
}

    
