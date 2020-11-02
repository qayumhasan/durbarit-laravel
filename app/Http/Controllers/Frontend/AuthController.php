<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\SmsModel;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        
        
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       
        $user=User::where('email', $request->email)->first();
        
        
            if ($user) {
                if (Auth::attempt(['email' => request('email'), 'password' => request('password'),'status'=>1], 
                    )) {
                    return redirect()->intended(route('customar.dashboard'));
                } else {
                    session()->flash('successMsg', 'Sorry !! Email or Password not matched!');
                    return redirect()->back();
                }
            }else{
                session()->flash('successMsg', 'Sorry !! Email or Password not matched!');
                return redirect()->back();
            }
       
    }

  
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $code =rand(1111,9999);
        $token =Str::random(40);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->remember_token =  $token;
        $user->verify_code = $code;
        $user->save();
        $this->sendSMS($request,$code);
        
        
        $notification = array(
            'messege' => 'Enter Your verification code now!',
            'alert-type' => 'error'
        );
        return redirect()->route('customar.verification',$token)->with($notification);

        

    }


    public function verification($token)
    {
        return view('frontend.auth.verification',compact('token'));
    }

    public function verifyAccount(Request $request)
    {
        
        $this->validate($request, [
            'verify' => 'required',
        ]);
        $user =User::where('remember_token',$request->token)->where('verify_code',$request->verify)->first();
        if($user){
            $user->status = 1;
            $user->remember_token = null;
            $user->verify_code = null;
            $user->save();
        }else{
            $notification = array(
                'messege' => 'Your Code Is not valid!',
                'alert-type' => 'error'
            ); 
            $token =$request->token;
            return view('frontend.auth.verification',compact('token'))->with($notification);
        }
        
        $notification = array(
            'messege' => 'Your Account Is verifed now!',
            'alert-type' => 'success'
        );
        return redirect()->route('customar.login')->with($notification);
        
    }

    




    // send user verification sms

    public function sendSMS($request,$verify_code){

        
        $siteUrl = URL::to("/");
        $sms_text = $request->name . "Your Verification Code is:" . $verify_code . ' ' . $siteUrl;
        $smsinfo =SmsModel::first();
        $smsurl =$smsinfo->sms_url;
        $smsname =$smsinfo->sms_username; #durbar2020
        $smspassword =$smsinfo->sms_password; #12345678
        
        $postData = array(
            'username'=>urlencode($smsname),
            'password'=>urlencode($smspassword),
            'sms_content'=>$sms_text,
            'number'=>urlencode($request->phone_email),
            'sms_type'=>1,
            
        );

        $ch = curl_init();
            curl_setopt_array($ch, array(
            CURLOPT_URL => $smsurl,
            // CURLOPT_URL => 'http://gosms.xyz/api/v1/sendSms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_FOLLOWLOCATION => true
            ));
            
            return $output = curl_exec($ch);
            
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
