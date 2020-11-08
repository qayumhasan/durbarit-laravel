<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $departments = Department::all();
        return view('admin.human_resource.department.index',compact('departments'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $department = new Department();
        $department->name = $request->department;
        $department->save();

        $notification=array(
            'messege'=>' Staff Role Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $slider
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $staffdepartment = Department::findOrFail($id);
        $status = $staffdepartment->status;
        if($status==0){
            $staffdepartment->status =1;
            $staffdepartment->save();
        }else{
            $staffdepartment->status =0;
            $staffdepartment->save();   
        }

        $notification=array(
            'messege'=>' Department Status Changed Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffdepartment = Department::findOrFail($id);
        return response()->json($staffdepartment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $department =Department::findOrFail($request->id);
        $department->name = $request->department;
        $department->save();
        $notification=array(
            'messege'=>' Department Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete ($id)
    {
        
        
           
        $department =Department::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Department Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
