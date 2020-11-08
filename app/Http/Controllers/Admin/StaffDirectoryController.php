<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\StaffDirectory;
use App\StaffRole;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class StaffDirectoryController extends Controller
{
    public function index ()
    {
        $staffs = StaffDirectory::all();
        return view('admin.human_resource.index',compact('staffs'));
    }

    public function create()
    {
        $roles = StaffRole::all();
        $depatments = Department::all();
        $desiignations = Designation::all();
        return view('admin.human_resource.create',compact('roles','depatments','desiignations'));
    }

    public function store(Request $request)
    {
        $dir = new StaffDirectory;
        $dir->staff_no = rand(111,999).'-'.rand(1111,9999);
        $dir->role = $request->role_id;
        $dir->department_id = $request->department_id;
        $dir->designation_id = $request->designation_id;
        $dir->first_name = $request->first_name;
        $dir->last_name = $request->last_name;
        $dir->fathers_name = $request->fathers_name;
        $dir->mothers_name = $request->mothers_name;
        $dir->email = $request->email;
        $dir->gender_id = $request->gender_id;
        $dir->date_of_birth = $request->date_of_birth;
        $dir->date_of_joining = $request->date_of_joining;
        $dir->mobile = $request->mobile;
        $dir->marital_status = $request->marital_status;
        $dir->emergency_mobile = $request->emergency_mobile;
        $dir->driving_license = $request->driving_license;

        
        
        if ($request->hasFile('image')) {
            $slider_id =Str::random(6);
            $slider_img = $request->file('image');
            $imagename = $slider_id . '.' . $slider_img->getClientOriginalExtension();
            Image::make($slider_img)->resize(2560, 1705)->save(base_path('public/images/staff/' . $imagename), 50);
            $dir->image = $imagename;
        }

        $dir->current_address = $request->current_address;
        $dir->permanent_address = $request->permanent_address;
        $dir->qualification = $request->qualification;
        $dir->experience = $request->experience ;
        $dir->epf_no = $request->epf_no;
        $dir->basic_salary = $request->basic_salary;
        $dir->contract_type = $request->contract_type;
        $dir->location = $request->location;
        $dir->bank_account_name = $request->bank_account_name;
        $dir->bank_account_no = $request->bank_account_no;
        $dir->bank_name = $request->bank_name;
        $dir->bank_brach = $request->bank_brach;
        $dir->facebook_url = $request->facebook_url;
        $dir->twiteer_url = $request->twiteer_url;
        $dir->linkedin_url = $request->linkedin_url;
        $dir->instragram_url = $request->instragram_url;

        if ($request->hasFile('resume')) {

            $dir->resume = $request->file('resume')->store('public/uploads/');
        }

        if ($request->hasFile('joining_letter')) {

            $dir->joining_letter = $request->file('joining_letter')->store('public/uploads/');
        }

        if ($request->hasFile('other_document')) {

            $dir->other_document = $request->file('other_document')->store('public/uploads/');
        }
        
        $dir->save();
        $notification=array(
            'messege'=>' Staff Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function status ($id)
    {
        $staffrole = StaffDirectory::findOrFail($id);
        $status = $staffrole->status;
        if($status==0){
            $staffrole->status =1;
            $staffrole->save();
        }else{
            $staffrole->status =0;
            $staffrole->save();   
        }

        $notification=array(
            'messege'=>' Staff Status Changed Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function delete ($id)
    {
        StaffDirectory::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Staff Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $staff = StaffDirectory::findOrFail($id);
        $roles = StaffRole::all();
        $depatments = Department::all();
        $desiignations = Designation::all();
        return view('admin.human_resource.edit',compact('roles','depatments','desiignations','staff'));

    }

    public function update(Request $request)
    {
        $dir = StaffDirectory::findOrFail($request->id);
        $dir->staff_no = rand(111,999).'-'.rand(1111,9999);
        $dir->role = $request->role_id;
        $dir->department_id = $request->department_id;
        $dir->designation_id = $request->designation_id;
        $dir->first_name = $request->first_name;
        $dir->last_name = $request->last_name;
        $dir->fathers_name = $request->fathers_name;
        $dir->mothers_name = $request->mothers_name;
        $dir->email = $request->email;
        $dir->gender_id = $request->gender_id;
        $dir->date_of_birth = $request->date_of_birth;
        $dir->date_of_joining = $request->date_of_joining;
        $dir->mobile = $request->mobile;
        $dir->marital_status = $request->marital_status;
        $dir->emergency_mobile = $request->emergency_mobile;
        $dir->driving_license = $request->driving_license;

        
        
        if ($request->hasFile('image')) {
            $slider_id =Str::random(6);
            $slider_img = $request->file('image');
            $imagename = $slider_id . '.' . $slider_img->getClientOriginalExtension();
            Image::make($slider_img)->resize(2560, 1705)->save(base_path('public/images/staff/' . $imagename), 50);
            $dir->image = $imagename;
        }

        $dir->current_address = $request->current_address;
        $dir->permanent_address = $request->permanent_address;
        $dir->qualification = $request->qualification;
        $dir->experience = $request->experience ;
        $dir->epf_no = $request->epf_no;
        $dir->basic_salary = $request->basic_salary;
        $dir->contract_type = $request->contract_type;
        $dir->location = $request->location;
        $dir->bank_account_name = $request->bank_account_name;
        $dir->bank_account_no = $request->bank_account_no;
        $dir->bank_name = $request->bank_name;
        $dir->bank_brach = $request->bank_brach;
        $dir->facebook_url = $request->facebook_url;
        $dir->twiteer_url = $request->twiteer_url;
        $dir->linkedin_url = $request->linkedin_url;
        $dir->instragram_url = $request->instragram_url;

        if ($request->hasFile('resume')) {

            $dir->resume = $request->file('resume')->store('public/uploads/');
        }

        if ($request->hasFile('joining_letter')) {

            $dir->joining_letter = $request->file('joining_letter')->store('public/uploads/');
        }

        if ($request->hasFile('other_document')) {

            $dir->other_document = $request->file('other_document')->store('public/uploads/');
        }
        
        $dir->save();
        $notification=array(
            'messege'=>' Staff Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function show($id)
    {
        $dir = StaffDirectory::findOrFail($id);
        return view('admin.human_resource.show',compact('dir'));
    }
    
}
