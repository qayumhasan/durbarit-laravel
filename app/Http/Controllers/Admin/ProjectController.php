<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
       
        return view('admin.project.index',compact('projects'));
    }

    public function create()
    {
        $categores = Category::all();
        $products = Product::all();
        return view('admin.project.create',compact('categores','products'));
    }

    public function store(Request $request)
    {
        
        
        $project = new Project();
        $project->cat_id = $request->cat_id;
        $project->title = $request->title;
        $project->product_id = $request->product_id;
        $project->save();

        $notification=array(
            'messege'=>' Project Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->route('admin.project.index')->with($notification);
    }

    public function edit ($id)
    {   $categores = Category::all();
        $project = Project::findOrFail($id);
        $products = Product::all();
        return view('admin.project.edit',compact('project','categores','products'));
    }

    public function update (Request $request,$id)
    {

        $project = Project::findOrFail($id);
        $project->cat_id = $request->cat_id;
        $project->title = $request->title;
        $project->product_id = $request->product_id;
        
        


        $project->save();

        $notification=array(
            'messege'=>' Project Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->route('admin.project.index')->with($notification);

    }

    public function status($id)
    {
        $project = Project::findOrFail($id);
        $status =$project->status;
        if($status==0){
            $project->status =1;
            $project->save();
        }else{
            $project->status =0;
            $project->save();   
        }

        $notification=array(
            'messege'=>' Project Status Changed Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        
        $project = Project::findOrFail($id);
        
        $project->delete();
        $notification=array(
            'messege'=>' Project Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    } 
}
