<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                if (Auth::attempt(['email' => request('email'), 'password' => request('password')], 
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

  
    public function register(UserRequest $request)
    {
        $token = Str::random(60);
        $verify_code = rand(9999,99999);
        $user =$this->createUser($request,$token,$verify_code);
        $fieldType =$this->checkUserInfo($request);

        if($fieldType == 'email'){
            $user->email = $request->phone_email;    
           $this->verifyEmailSend($token,$request->phone_email);
           $user->save();
           session()->flash('errorMsg', 'A Verification Mail Send tO YOUR Email Address. Please Check Your Mail...');
            return redirect()->route('customar.login.form');
       }else{
            $user->phone = $request->phone_email;     
            $this->sendSMS($request,$verify_code);
            $user->save();
            return redirect()->route('customar.verification.page',$token);  
       }   
        

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
