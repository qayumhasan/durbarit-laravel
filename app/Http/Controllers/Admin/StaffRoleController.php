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
    public function show(StaffRole $slider)
    {
        $status =$slider->status;
        if($status==0){
            $slider->status =1;
            $slider->save();
        }else{
            $slider->status =0;
            $slider->save();   
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
    public function edit(StaffRole $slider)
    {
        return view('admin.role.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffRole  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffRole $slider)
    {
        
        $slider->heading = $request->heading;
        $slider->paragraph = $request->paragraph;

        if ($request->hasFile('image')) {
            $link = base_path('public/images/slider/') . $slider->image;
		    unlink($link);
            $slider_id =Str::random(6);
            $slider_img = $request->file('image');
            $imagename = $slider_id . '.' . $slider_img->getClientOriginalExtension();
            Image::make($slider_img)->resize(2560, 1705)->save(base_path('public/images/slider/' . $imagename), 50);
            $slider->image = $imagename;
        }

        $slider->link = $request->link;
        $slider->save();
        $notification=array(
            'messege'=>' StaffRole Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->route('slider.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffRole  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffRole $slider)
    {
        
        
            $link = base_path('public/images/slider/') . $slider->image;
		    unlink($link);
        
        $slider->delete();
        $notification=array(
            'messege'=>' StaffRole Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->route('slider.index')->with($notification);
    }
}
