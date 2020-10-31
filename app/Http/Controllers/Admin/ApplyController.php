<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apply;
use App\Carrer;

class ApplyController extends Controller
{
    public function index(){
    	$allapply=Apply::orderBy('id','DESC')->get();
    	return view('admin.career.apply',compact('allapply'));
    }

    public function active($id){
           $data=Apply::where('id',$id)->update([
           	'status'=>1,

           ]);
           if($data){
               $notification = array(
                   'messege' => 'success',
                   'alert-type' => 'success'
                     );
                     return Redirect()->back()->with($notification);
                }else{
                     $notification = array(
                         'messege' => 'Faild',
                         'alert-type' => 'error'
                     );
                     return Redirect()->back()->with($notification);
              }
    	
        }

        public function view($id){
        	$data=Apply::where('id',$id)->first();
        	return view('admin.career.view',compact('data'));
        }

        public function delete($id){
        	$data=Apply::where('id',$id)->delete();
        	      if($data){
               $notification = array(
                   'messege' => 'success',
                   'alert-type' => 'success'
                     );
                     return Redirect()->back()->with($notification);
                }else{
                     $notification = array(
                         'messege' => 'Faild',
                         'alert-type' => 'error'
                     );
                     return Redirect()->back()->with($notification);
              }
        }
}
