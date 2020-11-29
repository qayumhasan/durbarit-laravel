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
                <h3>{{$staff->name}} PayRoll Generator</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        PayRoll
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Generator
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
                        <img src="{{asset('public/images/staff/')}}/{{$staff->image}}" alt="no-image" />
                    </div>
                    <h4>Qayum Hasan</h4>


                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="tl">Name</td>
                            <td class="tr">{{$staff->name}}</td>
                        </tr>
                        <tr>
                            <td class="tl">Phone</td>
                            <td class="tr">{{$staff->mobile}}</td>
                        </tr>
                        <tr>
                            <td class="tl">Email</td>
                            <td class="tr">{{$staff->email}}</td>
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
                                    <td>{{$staff->mobile}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td>{{$staff->emergency_mobile}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{$staff->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td>{{$staff->gender}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Date Of Birth</th>
                                    <td>{{$staff->date_of_birth}}</td>
                                </tr>

                            </tbody>
                        </table>


                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <h6>Payroll Summary</h6>
                                <hr>
                            </thead>
                            <tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Month</th>
                                        <th scope="col">Present</th>
                                        <th scope="col">Absent</th>
                                        <th scope="col">Late</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{$month}}</th>
                                    <td>{{$countPresent}}</td>
                                    <td>{{$countAbsent}}</td>
                                    <td>{{$countLate}}</td>

                                </tr>

                            </tbody>


                            </tbody>
                        </table>

                    </div>
                </div>



            </div>


        </div>
    </div>

    <div class="row tab_box ml-1 mr-1 mt-3">
        <div class="col-sm-4">
            <h6 class="text-center">Earnings </h6>
            <hr>

        </div>

        <div class="col-sm-4">
            <h6 class="text-center">Deductions</h6>
            <hr>
            
        </div>

        <div class="col-sm-4">
            <h6 class="text-center">Payroll Summary </h6>
            <hr>
        </div>
    </div>
</div>


@endsection