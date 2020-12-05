<?php

namespace App\Http\Controllers\Admin;

use App\HeaderText;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderTextController extends Controller
{
    
    public function whyChooseUs(Request $request)
    {
        $request->validate([
            'chooseus'=>'required'
        ]);
        $data = HeaderText::where('type','choose')->first();
        $data->details = $request->chooseus;
        $data->save();
        $notification=array(
            'messege'=>' Why Choose Us Header Text Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function strength(Request $request)
    {
        $request->validate([
            'strength'=>'required'
        ]);
        $data = HeaderText::where('type','strength')->first();
        $data->details = $request->strength;
        $data->save();
        $notification=array(
            'messege'=>' Our Strength Header Text Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function service(Request $request)
    {
        $request->validate([
            'details'=>'required'
        ]);
        $data = HeaderText::where('type','service')->first();
        $data->details = $request->details;
        $data->save();
        $notification=array(
            'messege'=>' Services Header Text Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function project(Request $request)
    {
        $request->validate([
            'details'=>'required'
        ]);
        $data = HeaderText::where('type','project')->first();
        $data->details = $request->details;
        $data->save();
        $notification=array(
            'messege'=>' Projects Header Text Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function client(Request $request)
    {
        $request->validate([
            'details'=>'required'
        ]);
        $data = HeaderText::where('type','client')->first();
        $data->details = $request->details;
        $data->save();
        $notification=array(
            'messege'=>' Client Header Text Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
    
}
