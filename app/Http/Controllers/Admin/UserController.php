<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $admins = Admin::all();
        return view('admin.users.index',compact('users','admins'));
    }

    public function create()
    {

        return view('admin.users.create');
    }

    public function store(Request $request)
    {


        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        if($request->type == "Admin"){
            $notification= $this->createAdmin($request);
        }elseif($request->type == "User"){
           $notification= $this->createUser($request);
        }

         return redirect()->route('admin.user.index')->with($notification);
    }

    public function createUser($request)
    {
        
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now();

        if ($request->hasFile('image')) {
            $user_id =Str::random(6);
            $user_img = $request->file('image');
            $imagename = $user_id . '.' . $user_img->getClientOriginalExtension();
            Image::make($user_img)->resize(600, 400)->save(base_path('public/images/user/' . $imagename), 50);
            $user->image = $imagename;
        }
        $user->save();

        return $notification=array(
            'messege'=>' User Insert Successfully',
            'alert-type'=>'success'
             );


    }

    public function createAdmin($request)
    {

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->created_at = Carbon::now();

        if ($request->hasFile('image')) {
            $user_id =Str::random(6);
            $user_img = $request->file('image');
            $imagename = $user_id . '.' . $user_img->getClientOriginalExtension();
            Image::make($user_img)->resize(600, 400)->save(base_path('public/images/user/' . $imagename), 50);
            $admin->image = $imagename;
        }
        $admin->save();

        return $notification=array(
            'messege'=>' Admin Insert Successfully',
            'alert-type'=>'success'
             );
    }

    public function edit ($type,$id)
    {

        if($type == 'user'){
            $user = User::findOrFail($id);
        }elseif($type == 'admin'){
            $user = Admin::findOrFail($id);
        }
        return view('admin.users.edit',compact('user'));
    }

    public function update (Request $request)
    {

        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        if($request->type == 'Admin'){
            $notification = $this->updateAdmin($request->id,$request);
        }elseif($request->type == 'User'){
            $notification = $this->updateUser($request->id,$request);
        }
         return redirect()->route('admin.user.index')->with($notification);

    }

    public function updateUser($id,$request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now();

        if ($request->hasFile('image')) {
            if($user->image != 'user.jpg'){
                unlink(base_path('public/images/user/'.$user->image));
            }

            $user_id =Str::random(6);
            $user_img = $request->file('image');
            $imagename = $user_id . '.' . $user_img->getClientOriginalExtension();
            Image::make($user_img)->resize(600, 400)->save(base_path('public/images/user/' . $imagename), 50);
            $user->image = $imagename;
        }
        $user->save();

        return $notification=array(
            'messege'=>' User Update Successfully',
            'alert-type'=>'success'
             );


    }

    public function updateAdmin($id,$request)
    {

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->created_at = Carbon::now();

        if ($request->hasFile('image')) {

            if($admin->image != 'admin.jpg'){
              //  unlink(base_path('public/images/user/'.$admin->image));
            }

            $user_id =Str::random(6);
            $user_img = $request->file('image');
            $imagename = $user_id . '.' . $user_img->getClientOriginalExtension();
            Image::make($user_img)->resize(600, 400)->save(base_path('public/images/user/' . $imagename), 50);
            $admin->image = $imagename;
        }
        $admin->save();

        return $notification=array(
            'messege'=>' Admin Update Successfully',
            'alert-type'=>'success'
             );
    }

    public function status($type ,$id)
    {
        if($type == 'admin'){
            $admin = Admin::findOrFail($id);
            $status =$admin->status;
            if($status==0){
                $admin->status =1;
                $admin->save();
            }else{
                $admin->status =0;
                $admin->save();
            }

            $notification=array(
                'messege'=>' Admin Status Changed Successfully.',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }elseif($type == 'user'){
            $user = User::findOrFail($id);
            $status =$user->status;
            if($status==0){
                $user->status =1;
                $user->save();
            }else{
                $user->status =0;
                $user->save();
            }

            $notification=array(
                'messege'=>' User Status Changed Successfully.',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }

    }

    public function delete($type,$id)
    {

        if($type == 'user'){
            $user = User::findOrFail($id);
            if($user->image != 'user.jpg'){
                unlink(base_path('public/images/user/'.$user->image));
            }
            $user->delete();
            $notification=array(
                'messege'=>' User Deleted Successfully.',
                'alert-type'=>'success'
                 );
             return redirect()->route('admin.user.index')->with($notification);
        }elseif($type == 'admin'){
            $admin = Admin::findOrFail($id);
            if($admin->image != 'admin.jpg'){
                unlink(base_path('public/images/user/'.$admin->image));
            }
            $admin->delete();
            $notification=array(
                'messege'=>' Admin Deleted Successfully.',
                'alert-type'=>'success'
                 );
             return redirect()->route('admin.user.index')->with($notification);
        }

    }

    public function profile($id){
      $data=Admin::where('id',$id)->first();
      return view('admin.users.userprofile',compact('data'));
    }



}
