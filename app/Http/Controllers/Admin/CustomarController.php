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

class CustomarController extends Controller
{
    public function index()
    {
        $users = User::all();
        $admins = Admin::all();
        return view('admin.customar.index', compact('users', 'admins'));
    }

    public function create()
    {

        return view('admin.customar.create');
    }

    public function store(Request $request)
    {


        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|',
            'password' => 'required|confirmed|min:6',
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now();

        if ($request->hasFile('image')) {
            $user_id = Str::random(6);
            $user_img = $request->file('image');
            $imagename = $user_id . '.' . $user_img->getClientOriginalExtension();
            Image::make($user_img)->resize(600, 400)->save(base_path('public/images/user/' . $imagename), 50);
            $user->image = $imagename;
        }
        $user->save();

        $notification = array(
            'messege' => ' User Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.customar.index')->with($notification);
    }




    public function edit($type, $id)
    {

        $user = User::findOrFail($id);

        return view('admin.customar.edit', compact('user'));
    }

    public function update(Request $request)
    {

        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now();

        if ($request->hasFile('image')) {
            if ($user->image != 'user.jpg') {
                unlink(base_path('public/images/user/' . $user->image));
            }

            $user_id = Str::random(6);
            $user_img = $request->file('image');
            $imagename = $user_id . '.' . $user_img->getClientOriginalExtension();
            Image::make($user_img)->resize(600, 400)->save(base_path('public/images/user/' . $imagename), 50);
            $user->image = $imagename;
        }
        $user->save();

        $notification = array(
            'messege' => ' User Update Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.customar.index')->with($notification);
    }



    public function status($type, $id)
    {

        $user = User::findOrFail($id);
        $status = $user->status;
        if ($status == 0) {
            $user->status = 1;
            $user->save();
        } else {
            $user->status = 0;
            $user->save();
        }

        $notification = array(
            'messege' => ' User Status Changed Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete($type, $id)
    {


        $admin = Admin::findOrFail($id);
        if ($admin->image != 'admin.jpg') {
            unlink(base_path('public/images/user/' . $admin->image));
        }
        $admin->delete();
        $notification = array(
            'messege' => ' Admin Deleted Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.customar.index')->with($notification);
    }

    public function profile($id)
    {
        $data = Admin::where('id', $id)->first();
        return view('admin.customar.userprofile', compact('data'));
    }
}
