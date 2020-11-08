<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
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
        
        $designations = Designation::all();
        return view('admin.human_resource.designation.index',compact('designations'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $designation = new Designation();
        $designation->name = $request->designation;
        $designation->save();

        $notification=array(
            'messege'=>' Staff Role Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $slider
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $staffdesignation = Designation::findOrFail($id);
        $status = $staffdesignation->status;
        if($status==0){
            $staffdesignation->status =1;
            $staffdesignation->save();
        }else{
            $staffdesignation->status =0;
            $staffdesignation->save();   
        }

        $notification=array(
            'messege'=>' Designation Status Changed Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffdesignation = Designation::findOrFail($id);
        return response()->json($staffdesignation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $designation =Designation::findOrFail($request->id);
        $designation->name = $request->designation;
        $designation->save();
        $notification=array(
            'messege'=>' Designation Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete ($id)
    {
        
        
           
        $designation =Designation::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Designation Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
