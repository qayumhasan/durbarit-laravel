<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
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
        
        
        $categores = ProjectCategory::all();
        return view('admin.invoice.categoey.index',compact('categores'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $category = new ProjectCategory();
        $category->name = $request->name;
        $category->details = $request->details;
        $category->save();

        $notification=array(
            'messege'=>' Category Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectCategory  $slider
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $staffcategoe = ProjectCategory::findOrFail($id);
        $status = $staffcategoe->status;
        if($status==0){
            $staffcategoe->status =1;
            $staffcategoe->save();
        }else{
            $staffcategoe->status =0;
            $staffcategoe->save();   
        }

        $notification=array(
            'messege'=>' Project Category Status Changed Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectCategory  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffcategoe = ProjectCategory::findOrFail($id);
        return response()->json($staffcategoe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectCategory  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $category =ProjectCategory::findOrFail($request->id);
        $category->name = $request->name;
        $category->details = $request->details;
        $category->save();
        $notification=array(
            'messege'=>' ProjectCategory Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectCategory  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete ($id)
    {
        
        
           
        $categoe =ProjectCategory::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Project Category Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
