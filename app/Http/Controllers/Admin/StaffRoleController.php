<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\StaffRole;
use Illuminate\Http\Request;

class StaffRoleController extends Controller
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
        
        $roles = StaffRole::all();
        return view('admin.human_resource.role.index',compact('roles'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $role = new StaffRole();
        $role->name = $request->role;
        $role->save();

        $notification=array(
            'messege'=>' Staff Role Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffRole  $slider
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $staffrole = StaffRole::findOrFail($id);
        $status = $staffrole->status;
        if($status==0){
            $staffrole->status =1;
            $staffrole->save();
        }else{
            $staffrole->status =0;
            $staffrole->save();   
        }

        $notification=array(
            'messege'=>' StaffRole Status Changed Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffRole  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffrole = StaffRole::findOrFail($id);
        return response()->json($staffrole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffRole  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $role =StaffRole::findOrFail($request->id);
        $role->name = $request->role;
        $role->save();
        $notification=array(
            'messege'=>' StaffRole Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffRole  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete ($id)
    {
        
        
           
        $role =StaffRole::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' StaffRole Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
