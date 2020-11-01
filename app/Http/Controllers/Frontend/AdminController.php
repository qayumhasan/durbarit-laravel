<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        return view('frontend.dashboard.dashboard',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;

        
        if($user->image !='user.jpg'){
            $link = base_path('public/images/user/') . $user->image;
		    unlink($link);
        }
        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(650, 425)->save('public/images/user/' . $ImageName);
            $user->image = $ImageName;

        }
        $user->save();

        $notification = array(
            'messege' => 'Profile Update SUccessfully😄😄',
            'alert-type' => 'success'
        );
        return Redirect()->route('customar.dashboard')->with($notification);
    }


}
