@extends('admin.master')
@section('contents')
<style>
    h4 {
        padding-to: 5%;
    }
</style>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<section class="page_area">
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Update Staff</span></div>
                </div>
                <div class="col-md-6 text-right">

                    <button type="button" style="margin: 5px;" class="btn btn-success"><i class="fas fa-award"></i> <a href="{{route('admin.staff.index')}}" style="color: #fff;">All Staff</a></button>
                </div>
            </div>
        </div>


        <div class="panel_body">


            <form method="POST" action="{{route('admin.staff.update')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input name="_token" type="hidden">
            @csrf

            <input type="hidden" name="id" value="{{$staff->id}}"/>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">



                            <div class="staff">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="main-title">
                                            <h4>Basic Information</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>


                                <div class="row mb-30">
                                    <div class="col-lg-3">
                                        <div class="input-effect">

                                            <label>Staff No. <span>*</span> </label>
                                            <input class="primary-input form-control" name="staff_no" type="text" disabled value="{{$staff->staff_no}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label>Staff Role. <span>*</span> </label>
                                        <div class="input-effect">

                                            <select class="niceSelect w-100 bb form-control" name="role_id" id="role_id" required>

                                                <option data-display="Role *" value="">Select</option>
                                                @foreach($roles as $row)
                                                    <option value="{{$row->id}}" @if($staff->role == $row->id) selected @endif>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label>Staff Department. <span>*</span> </label>
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control" name="department_id" id="department_id" required>
                                                <option data-display="Department *" value="">Select </option>
                                                @foreach($depatments as $row)
                                                    <option value="{{$row->id}}" @if($staff->department_id == $row->id) selected @endif>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <label>Staff Designations. <span>*</span> </label>
                                        <div class="input-effect">
                                            <select class="niceSelect w-100 bb form-control" name="designation_id" id="designation_id" required>
                                                <option data-display="Designations *" value="">Select </option>
                                                @foreach($desiignations as $row)
                                                    <option value="{{$row->id}}" @if($staff->designation_id == $row->id) selected @endif>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                </div>





                                <div class="row mb-30">
                                    <div class="col-lg-3">
                                        <label>First Name <span>*</span> </label>
                                        <div class="input-effect">
                                            <input class="primary-input form-control  " type="text" name="first_name" value="{{$staff->first_name}}" required>


                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label> Last Name <span>*</span> </label>
                                        <div class="input-effect">
                                            <input class="primary-input form-control" type="text" name="last_name" value="{{$staff->last_name}}" required>

                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <label>Father Name</label>
                                        <div class="input-effect">
                                            <input class="primary-input form-control" type="text" name="fathers_name" value="{{$staff->fathers_name}}" required>
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <label>Mother Name</label>
                                        <div class="input-effect">
                                            <input class="primary-input form-control" type="text" name="mothers_name" value="{{$staff->fathers_name}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-30">
                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Email <span>*</span> </label>
                                            <input class="primary-input form-control" type="email" name="email" value="{{$staff->email}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Gender <span>*</span> </label>
                                            <select class="niceSelect w-100 bb form-control" name="gender_id" required>
                                                <option data-display="Gender *" value="">Gender *</option>
                                                <option value="1" @if($staff->gender_id == 1) selected @endif>Male</option>
                                                <option value="2"  @if($staff->genter_id == 2) selected @endif>Female</option>
                                                <option value="3"  @if($staff->genter_id == 3) selected @endif>Others</option>
                                            </select>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">

                                                <div class="input-effect">
                                                    <label>Date Of Birth</label>
                                                    <input class="primary-input date form-control" value="{{$staff->date_of_birth}}" id="startDate" type="date" required name="date_of_birth" autocomplete="off">
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="input-effect">
                                                    <label>Date of Joining<span>*</span> </label>
                                                    <input class="primary-input date form-control"  id="date_of_joining" type="date" name="date_of_joining" required value="{{$staff->date_of_joining}}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-20">
                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Mobile <span>*</span> </label>
                                            <input class="primary-input form-control" type="text" name="mobile" required value="{{$staff->mobile}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Marital Status <span>*</span> </label>
                                            <select class="niceSelect w-100 bb form-control" name="marital_status" required>
                                                <option data-display="Marital Status" value="">Marital Status</option>
                                                <option value="married" @if($staff->marital_status == 'married') selected @endif>Married</option>
                                                <option value="unmarried" @if($staff->marital_status == 'unmarried') selected @endif>Unmarried</option>

                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Emergency Mobile </label>
                                            <input class="primary-input form-control" type="text" name="emergency_mobile" value="{{$staff->emergency_mobile}}">

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Driving License</label>
                                            <input class="primary-input form-control" type="text" name="driving_license" value="{{$staff->driving_license}}">
                                        </div>
                                    </div>


                                </div>


                                <div class="row mb-20">
                                    <div class="col-lg-6">
                                        <div class="row no-gutters input-right-icon">


                                            <div class="col-lg-6">
                                                <div class="input-effect">
                                                    <label for="staff_photo">Staff Photo</label>
                                                    <input type="file" name="image">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-effect card m-2 p-2">
                                                    <img height="140" width="140" src="{{ asset('public/images/staff/'.$staff->image) }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            

                                <!--upload-->











                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>


                                <div class="row mb-30">
                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <label>Current Address <span>*</span> </label>
                                            <textarea class="primary-input form-control " cols="0" rows="4" name="current_address" required id="current_address">{{$staff->current_address}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <label>Permanent Address <span></span> </label>
                                            <textarea class="primary-input form-control " cols="0" rows="4" required name="permanent_address" id="permanent_address">{{$staff->permanent_address}}</textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="row md-20">
                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <label>Qualifications </label>
                                            <textarea class="primary-input form-control" required cols="0" rows="4" name="qualification" id="qualification">{{$staff->qualification}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <label>Experience </label>
                                            <textarea class="primary-input form-control" cols="0" rows="4" name="experience" id="experience" value="">{{$staff->experience}}</textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="main-title">
                                            <h4>Payroll Details</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-30">
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>


                                <div class="row mb-20">


                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>EPF NO</label>
                                            <input class="primary-input form-control" type="text" name="epf_no" value="{{$staff->epf_no}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Basic Salary</label>
                                            <input class="primary-input form-control" type="number" name="basic_salary" value="{{$staff->basic_salary}}" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Contract Type</label>
                                            <select class="niceSelect w-100 bb form-control" name="contract_type">
                                                <option data-display="Select" value=""> Select</option>
                                                <option value="permanent">Permanent </option>
                                                <option value="contract"> Contract</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="input-effect">
                                            <label>Location</label>
                                            <input class="primary-input form-control" type="text" value="{{$staff->location}}" name="location">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <h4>Bank Info Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                            </div>


                            <div class="row mb-20">
                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Bank Account Name</label>
                                        <input class="primary-input form-control" type="text" name="bank_account_name" value="{{$staff->bank_account_name}}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Account No.</label>
                                        <input class="primary-input form-control" type="text" name="bank_account_no" value="{{$staff->bank_account_no}}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Bank Name</label>
                                        <input class="primary-input form-control" type="text" name="bank_name" value="{{$staff->bank_name}}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Branch Name</label>
                                        <input class="primary-input form-control" type="text" name="bank_brach" value="{{$staff->bank_brach}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <h4>Social Links Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                            </div>


                            <div class="row mb-20">
                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Facebook Url</label>
                                        <input class="primary-input form-control" type="text" name="facebook_url" value="{{$staff->facebook_url}}"/>

                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Twitter Url</label>
                                        <input class="primary-input form-control" type="text" name="twiteer_url" value="{{$staff->twiteer_url}}">

                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Linkedin Url</label>
                                        <input class="primary-input form-control" type="text" name="linkedin_url" value="{{$staff->linkedin_url}}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-effect">
                                        <label>Instragram Url</label>
                                        <input class="primary-input form-control" type="text" name="instragram_url" value="{{$staff->instragram_url}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <h4>Document Info</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                            </div>



                            <div class="row mb-20">


                                <div class="col-lg-4">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col-lg-6">
                                            <div class="input-effect">
                                                <label for="staff_photo">Resume</label>
                                                <input type="file" name="resume" placeholder="PDF file Only!">
                                                <label>PDF file Only!</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-4">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col-lg-6">
                                            <div class="input-effect">
                                                <label for="staff_photo">Joining Letter</label>
                                                <input type="file" name="joining_letter" placeholder="PDF file Only!">
                                                <label>PDF file Only!</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col-lg-6">
                                            <div class="input-effect">
                                                <label for="staff_photo">Other Document</label>
                                                <input type="file" name="other_document" placeholder="PDF file Only!">
                                                <label>PDF file Only!</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                


                            </div>
                            <div class="row" style="margin:40px 0px;">
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-primary">
                                        
                                        Save Staff </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</section>




@endsection