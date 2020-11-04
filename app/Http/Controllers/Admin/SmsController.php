<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SmsModel;
use Illuminate\Http\Request;

class SmsController extends Controller
{
 public function index()
 {
     $sms =SmsModel::findOrFail(1);
     return view('admin.sms.index',compact('sms'));
 }

 public function update(Request $request)
 {
     
    $sms =SmsModel::findOrFail(1);
    $sms->sms_url = $request->url;
    $sms->sms_username = $request->username;
    $sms->sms_password = $request->password;
    $sms->save();
    $notification=array(
        'messege'=>' Sms Updated Successfully.',
        'alert-type'=>'success'
         );
     return redirect()->back()->with($notification);

 }
}
