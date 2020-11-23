<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LeapeApply;
use App\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $type = LeaveType::all();
        $applies = LeapeApply::all();
        return view('admin.leave.apply_leave',compact('applies','type'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'apply_date'=>'required',
            'leave_type'=>'required',
            'leave_form'=>'required',
            'leave_to'=>'required',
            'reason'=>'required',
        ]);
        $apply =new LeapeApply;
        $apply->apply_date = $request->apply_date;
        $apply->leave_type = $request->leave_type;
        $apply->leave_form = $request->leave_form;
        $apply->leave_to = $request->leave_to;
        $apply->reason = $request->reason;
        if($apply->save()){
            $notification = array(
                'messege' => 'Leave for Apply Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'apply_date'=>'required',
            'leave_type'=>'required',
            'leave_form'=>'required',
            'leave_to'=>'required',
            'reason'=>'required',
        ]);

        $apply =LeapeApply::findOrFail($request->id);
        $apply->apply_date = $request->apply_date;
        $apply->leave_type = $request->leave_type;
        $apply->leave_form = $request->leave_form;
        $apply->leave_to = $request->leave_to;
        $apply->reason = $request->reason;
        if($apply->save()){
            $notification = array(
                'messege' => 'Leave for Apply Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function status($id)
    {
        $page = LeapeApply::findOrFail($id);
        $status =$page->status;
        if($status==0){
            $page->status =1;
            $page->save();
        }else{
            $page->status =0;
            $page->save();   
        }

        $notification=array(
            'messege'=>' Leave Approved Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function delete ($id)
    {
        LeapeApply::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Apply for Leave Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }



    public function leaveType()
    {
        $leavetype = LeaveType::all();
        return view('admin.leave.leave_type',compact('leavetype'));

    }

    public function leaveTypeStore(Request $request)
    {
        
        $request->validate([
            'leave_type'=>'required'
        ]);
        $type = new LeaveType();
        $type->type = $request->leave_type;
        if($type->save()){
            $notification = array(
                'messege' => 'Leave Type add Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    public function typeUpdate(Request $request)
    {
        
        $request->validate([
            'type'=>'required'
        ]);
        $type = LeaveType::findOrFail($request->id);
        $type->type = $request->type;
        if($type->save()){
            $notification = array(
                'messege' => 'Leave Type Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteType($id)
    {

        LeaveType::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Leave Type Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);   
    }
}
