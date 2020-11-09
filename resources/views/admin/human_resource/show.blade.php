@extends('admin.master')
@section('contents')

<style>
    .head_edit {
        padding: 10px;
        /* font-size: 18px; */
    }

    .breadcrumb li a {
        text-transform: capitalize;
        color: #26abe2;
    }

    .user_image img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 2px solid #e6e6e6;
        margin-bottom: 10px;
    }

    .user_profile {
        margin-bottom: 10px;
    }

    .user_profile h4 {
        font-size: 18px;
        text-transform: capitalize;
    }

    .user_profile span {
        font-size: 14px;
    }

    .user_profile_box {
        background-color: #fff;
        border-radius: 7px;
        padding: 20px 10px;
    }

    td.tl {
        font-weight: 600;
        text-transform: capitalize;
    }

    .profile_update .card-header {
        font-weight: 600;
        font-size: 18px;
        text-transform: capitalize;
    }

    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: 0.25rem;
        color: #000;
        font-size: 16px;
        font-weight: 600;
        border-top-right-radius: 0.25rem;
    }

    .nav-tabs .nav-link.active {
        color: #26abe2;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .button_submit button {
        background: #26abe2;
        color: #ffff;
        border-style: none;
        /* display: block; */
        width: 100%;
        padding: 7px;
        border-radius: 5px;
        text-transform: capitalize;
        font-size: 16px;
        font-weight: 600;
    }

    .up_image img {
        width: 120px;
        height: 120px;
        border: 1px solid #e2dbdb;
        margin-top: 10px;
    }

    .tab_box {
        background-color: #fff;
        padding: 20px;
    }

    .doc_box iframe {
        width: 100%;
        height: 400px;
        border-style: none;
        border-radius: 5px;

    }

    .doc_box h4 {
        color: #fff;
        background-color: #26abe2;
        padding: 7px;
        border-radius: 3px;
    }

    .doc_box h4 {
        color: #fff;
        background-color: #26abe2;
        padding: 10px;
        border-radius: 3px;
        font-size: 16px;
        text-transform: capitalize;
    }

    .doc_main {
        position: relative;
    }

    .doc_link a {
        position: absolute;
        /* left: 10px; */
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-color: #26abe2;
        color: #fff;
        padding: 8px 24px;
        border-radius: 5px;
        text-transform: capitalize;
        opacity: 0;
        visibility: hidden;
        transition: 0.6s linear;

    }

    .doc_main:hover .doc_link a {
        opacity: 1;
        visibility: visible;
    }

    .head_edit {
        padding: 10px;
        /* font-size: 18px; */
    }

    .breadcrumb li a {
        text-transform: capitalize;
        color: #26abe2;
    }

    .user_image img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 2px solid #e6e6e6;
        margin-bottom: 10px;
    }

    .user_profile {
        margin-bottom: 10px;
    }

    .user_profile h4 {
        font-size: 18px;
        text-transform: capitalize;
    }

    .user_profile span {
        font-size: 14px;
    }

    .user_profile_box {
        background-color: #fff;
        border-radius: 7px;
        padding: 20px 10px;
    }

    td.tl {
        font-weight: 600;
        text-transform: capitalize;
    }

    .profile_update .card-header {
        font-weight: 600;
        font-size: 18px;
        text-transform: capitalize;
    }

    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: 0.25rem;
        color: #000;
        font-size: 16px;
        font-weight: 600;
        border-top-right-radius: 0.25rem;
    }

    .nav-tabs .nav-link.active {
        color: #26abe2;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .button_submit button {
        background: #26abe2;
        color: #ffff;
        border-style: none;
        /* display: block; */
        width: 100%;
        padding: 7px;
        border-radius: 5px;
        text-transform: capitalize;
        font-size: 16px;
        font-weight: 600;
    }

    .up_image img {
        width: 120px;
        height: 120px;
        border: 1px solid #e2dbdb;
        margin-top: 10px;
    }

    .tab_box {
        background-color: #fff;
        padding: 20px;
    }

    .pdf_btn {
        cursor: pointer;
        color: #fff;
    }
</style>

<div class="middle_content_wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="head_edit">
                <h3>{{$dir->name}} Profile</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="user_profile_box">
                <div class="user_profile text-center">
                    <div class="user_image">
                        <img src="{{asset('public/images/staff/')}}/{{$dir->image}}" alt="no-image" />
                    </div>
                    <h4>{{$dir->name}}</h4>

                    <span>{{$dir->designation->name}}</span>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="tl">Name</td>
                            <td class="tr">{{$dir->name}}</td>
                        </tr>
                        <tr>
                            <td class="tl">Phone</td>
                            <td class="tr">{{$dir->mobile}}</td>
                        </tr>
                        <tr>
                            <td class="tl">Email</td>
                            <td class="tr">{{$dir->email}}</td>
                        </tr>
                        <tr>
                            <td class="tl">Address</td>
                            <td class="tr">Dhanmondi,Dhaka,Bangladesh</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-8">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-tab-1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                    <!-- <a class="nav-item nav-link" id="nav-tab-2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-profile" aria-selected="false">Payroll</a> -->
                    <!-- <a class="nav-item nav-link" id="nav-tab-3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-contact" aria-selected="false">Leave</a> -->
                    <a class="nav-item nav-link" id="nav-tab-3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-contact" aria-selected="false">Document</a>
                </div>
            </nav>



            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-tab-1">
                    <div class="tab_box">

                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <h6>PERSONAL INFO</h6>
                                <hr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td>{{$dir->mobile}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td>{{$dir->emergency_mobile}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{$dir->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td>{{$dir->gender}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Date Of Birth</th>
                                    <td>{{$dir->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Marital Status</th>
                                    <td>{{$dir->marital}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Father Name</th>
                                    <td>{{$dir->fathers_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mother Name</th>
                                    <td>{{$dir->mothers_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Qualifications</th>
                                    <td>{{$dir->qualification}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Experience</th>
                                    <td>{{$dir->experience}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Experience</th>
                                    <td>{{$dir->experience}}</td>
                                </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <h6>ADDRESSES</h6>
                                <hr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Current Address</th>
                                    <td>{{$dir->current_address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Permanent Address</th>
                                    <td>{{$dir->current_address}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
                    <div class="tab_box">

                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">Pay Id</th>
                                    <th scope="col">Month-Year</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Mode Of Payment</th>
                                    <th scope="col">Net Salary</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">01</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">02</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">03</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-tab-4">
                    <div class="tab_box">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="doc_main">
                                    <div class="doc_box">
                                        <h4>Resume</h4>
                                        <iframe src="{{url('storage/app/'.$dir->resume)}}" height="200" width="300" title="Iframe Example"></iframe>
                                    </div>
                                    <div class="doc_link">
                                        <a style="color: #fff; font-weight:bold" class="pdf_btn" data-toggle="modal" data-target="#resume">See More</a>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="col-sm-4">
                                <div class="doc_main">
                                    <div class="doc_box">
                                        <h4>Joining Letter</h4>
                                        <iframe src="{{url('storage/app/'.$dir->joining_letter)}}" height="200" width="300" title="Iframe Example"></iframe>
                                    </div>
                                    <div class="doc_link">
                                    <a style="color: #fff; font-weight:bold" class="pdf_btn" data-toggle="modal" data-target="#joining_letter">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="doc_main">
                                    <div class="doc_box">
                                        <h4>Other</h4>
                                        <iframe src="{{url('storage/app/'.$dir->other_document)}}" height="200" width="300" title="Iframe Example"></iframe>
                                    </div>
                                    <div class="doc_link">
                                    <a style="color: #fff; font-weight:bold" class="pdf_btn" data-toggle="modal" data-target="#other">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- resume -->

<div class="modal fade mt-5" id="resume" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$dir->name}} Resume</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('storage/app/'.$dir->resume)}}" width="100%" height="700px;"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- joining letter -->
<div class="modal fade mt-5" id="joining_letter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$dir->name}} Joining Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('storage/app/'.$dir->joining_letter)}}" width="100%" height="700px;"></iframe>
            </div>
        </div>
    </div>
</div>


<!-- other document -->
<div class="modal fade mt-5" id="other" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$dir->name}} Other Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('storage/app/'.$dir->other_document)}}" width="100%" height="700px;"></iframe>
            </div>
        </div>
    </div>
</div>


@endsection