<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\Payroll;
use App\StaffDirectory;
use App\StaffRole;
use Carbon\Carbon;
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

    public function payrollGenerate ($id,$month,$year)
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

        

        
        return view('admin.payroll.show',compact('staff','month','year','countPresent','countAbsent','countLate'));

    }

    public function payrollSalaryCount(Request $request)
    {
        
        
        $basic = StaffDirectory::findOrFail($request->id);
        $basic = $basic->basic_salary;
        $tax = $request->tax;

        $earningvalue = 0;
        $deductionvalue = 0;

        foreach($request->earningvalue as $value){
            $earningvalue = $earningvalue + $value;
        }

        foreach($request->deductionvalue as $value){
            $deductionvalue = $deductionvalue + $value;
        }

        $gross = $basic + $earningvalue -$deductionvalue;

        $netsalary =$basic + $earningvalue -$deductionvalue - $tax;

        
        return view('admin.payroll.ajax.payroll',compact('earningvalue','deductionvalue','gross','basic','tax','netsalary'));


    }

    public function payrollGenerateCreate(Request $request)
    {
        
        $payroll = new Payroll;

        $payroll->staff_id= $request->id;

        $earningtype =array();
        foreach ($request->earningtype as $value) {
            array_push($earningtype,$value);
            
        }
        $earningvalue =array();
        foreach ($request->earningvalue as $value) {
            array_push($earningvalue,$value);
        }


        $deductiontype =array();
        foreach ($request->deductiontype as $value) {
            array_push($deductiontype,$value);
            
        }
        $deductionvalue =array();
        foreach ($request->deductionvalue as $value) {
            array_push($deductionvalue,$value);
        }

        $earnings = array_combine($earningtype, $earningvalue);
        $deduction = array_combine($deductiontype, $deductionvalue);

        $payroll->earnings= json_encode($earnings);
        $payroll->deductions= json_encode($deduction);
        $payroll->basic_salary= $request->basic;
        $payroll->total_earning= $request->earning;
        $payroll->total_deduction= $request->deductions;
        $payroll->gross_salary= $request->gslary;
        $payroll->tax= $request->tax;
        $payroll->net_salary= $request->netsalary;
        $payroll->net_salary= $request->netsalary;
        $payroll->month= $request->month;
        $payroll->year= $request->year;
        $payroll->genared_date= Carbon::now();
        $payroll->save();

        $notification=array(
            'messege'=>' Payroll Created Successfully.',
            'alert-type'=>'success'
             );
         
        return redirect()->route('admin.payroll.index')->with($notification);
        // return redirect()->back()->with($notification);


        
        
    }


    public function payrollGeneratePaymentMethod(Request $request)
    {
        $payroll =Payroll::findOrFail($request->id);
        $payroll->payment_method = $request->payment_method;
        $payroll->note = $request->note;
        $payroll->ispaid = 1;
        $payroll->save();

        $notification=array(
            'messege'=>' Payment Created Successfully.',
            'alert-type'=>'success'
             );
         
        return redirect()->route('admin.payroll.index')->with($notification);

    }

    public function adminViewPayroll (Request $request)
    {
        $payroll =Payroll::with('staff')->where('staff_id',$request->data)->first();
        return view('admin.payroll.ajax.viewpayroll',compact('payroll'));
    }

}
