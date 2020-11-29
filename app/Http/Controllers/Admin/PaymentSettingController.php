<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.payment_setting');
    }

    public function stripeUpdate(Request $request)
    {
        
      
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        $notification=array(
            'messege'=>' Stripe Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
      
    }


    public function paypalUpdate(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        $notification=array(
            'messege'=>' Paypal Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }


    public function sslCommerzUpdate(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        $notification=array(
            'messege'=>' SSL Commerz Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . $type . '=' . $val);
            }
        }
    }
}
