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
        

        if ($request->attendance == NULL) {
            return \response()->json(['errorMsg' => 'You did not check any Empaloye\'s attendance status.']);
        }

        
        $index = 0;
        $notes = $request->note;
       
        date_default_timezone_set('Asia/Dhaka');

        foreach ($request->attendance as $emapoly_id => $attendance_status) {

            
            $addCurrentDayAttendance = new Attendance();

            $addCurrentDayAttendance->staff_id = $emapoly_id;
            $addCurrentDayAttendance->month = date('F');
            $addCurrentDayAttendance->year = date('Y');
            $addCurrentDayAttendance->date = date('d-m-Y');
            $addCurrentDayAttendance->attendance = $attendance_status;
            $addCurrentDayAttendance->note = $notes[$index] ? $notes[$index] : NULL;
            $addCurrentDayAttendance->save();
            $index++;
        }

        
        return \response()->json(['successMsg' => 'Successfully Current day attendance has been taken.']);

    //     // return $request;
    //     // return Carbon::now()->toDateString();
    //     // return date('F');
    //     // return date('Y');

        
        

        

        
    // $checkatt=Attendance::where('month',date('F'))->where('year',date('Y'))->first();
    // if($checkatt){
        
    //     foreach(json_decode($checkatt->attendance) as $key=> &$row){

    //     }
        


    // }else{
       

    //     $attents = array();
    //     foreach($request->attendance as $key=>$row){
           
    //         $item['1']=date('d') == 1?$row:0;
    //         $item['2']=date('d') == 2?$row:0;
    //         $item['3']=date('d') == 3?$row:0;
    //         $item['4']=date('d') == 4?$row:0;
    //         $item['5']=date('d') == 5?$row:0;
    //         $item['6']=date('d') == 6?$row:0;
    //         $item['7']=date('d') == 7?$row:0;
    //         $item['8']=date('d') == 8?$row:0;
    //         $item['9']=date('d') == 9?$row:0;
    //         $item['10']=date('d') == 10?$row:0;
    //         $item['11']=date('d') == 11?$row:0;
    //         $item['12']=date('d') == 12?$row:0;
    //         $item['13']=date('d') == 13?$row:0;
    //         $item['14']=date('d') ==14?$row:0;
    //         $item['15']=date('d') ==15?$row:0;
    //         $item['16']=date('d') == 16?$row:0;
    //         $item['17']=date('d') == 17?$row:0;
    //         $item['18']=date('d') == 18?$row:0;
    //         $item['19']=date('d') == 19?$row:0;
    //         $item['20']=date('d') == 20?$row:0;
    //         $item['21']=date('d') == 21?$row:0;
    //         $item['22']=date('d') == 22?$row:0;
    //         $item['23']=date('d') == 23?$row:0;
    //         $item['24']=date('d') == 24?$row:0;
    //         $item['25']=date('d') == 25?$row:0;
    //         $item['26']=date('d') == 26?$row:0;
    //         $item['27']=date('d') == 27?$row:0;
    //         $item['28']=date('d') == 28?$row:0;
    //         $item['29']=date('d') == 29?$row:0;
    //         $item['30']=date('d') == 30?$row:0;
    //         $item['31']=date('d') == 31?$row:0;
    //         array_push($attents,$item);
    //     }

    //     $index = 0;
    //     foreach($request->attendance as $key=>$row){
    //         $att = new Attendance();
    //         $att->month = date('F');
    //         $att->year = date('Y');
    //         $att->attendance = json_encode($attents[$index]);
    //          if($row=='present'){
    //             $att->present = 1;
    //         }elseif($row=='absent'){
    //             $att->absent = 1;
    //         }elseif($row=='late'){
    //             $att->late = 1;
    //         }

    //         $att->staff_id = $key;
    //         $att->save();
    //         $index ++;
    //     }
        
    // }
    // return 'ok';
        
    }


   

    public function reportSearch(Request $request)
    {
        
        
        
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

    
