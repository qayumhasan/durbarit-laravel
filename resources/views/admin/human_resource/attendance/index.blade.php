@extends('admin.master')
@section('contents')
@php
date_default_timezone_set('Asia/Dhaka');
@endphp
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">

            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel_header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                    <span>Select Criteria For Current day Attendance By Date</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">


                        <form class="search_form" action="{{route('admin.staff.attendance.search')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="m-0"><b>Role :</b></label>
                                    <select required name="role" class="select_class class_id form-control form-control-sm">
                                        <option value="">--- Select Class ---</option>
                                        @foreach($role as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="m-0"><b>Department :</b> </label>
                                    <select required name="department" id="sections" class="form-control form-control-sm select_section section_id">
                                    <option value="">--- Select Department ---</option>
                                        @foreach($department as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="m-0"><b>Designation :</b> </label>
                                    <select required name="designation" id="sections" class="form-control form-control-sm select_section section_id">
                                    <option value="">--- Select Department ---</option>
                                        @foreach($designation as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>



                    </div>

                    <div class="panel_body table_body mt-3">
                    
                        <!-- <h5>Today : 09-November-2020</h5> -->
                        <h5>Today : {{date("d-M-Y")}}</h5>
                        <hr style="border-bottom:1px solid black;">

                        @if(isset($attents) && count($attents) > 0)
                        <div class="table_area">


                            <div class="table-responsive ">

                                <form class="current_day_attendance_from" method="post" action="{{route('admin.staff.attendance.store')}}">
                                    @csrf
  
                                    <table class="table table-bordered table-striped table-sm table-hover mb-2">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Staff No</th>
                                                <th>Staff Name</th>
                                                <th>Role</th>
                                                
                                                <th>Photo</th>
                                                <th>Attendance</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($attents as $row)
                                            <tr class="text-center">
                                            <td>{{$row->staff_no}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->staffrole->name}}</td>
                                                
                                                <td>
                                                    <img height="40" width="40" src="{{ asset('public/images/staff/'.$row->image) }}">
                                                </td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="form-inline ml-1">
                                                            <input type="radio" class="form-control" name="attendance[{{$row->id}}]" value="present">&nbsp;
                                                            <b>Present |</b>
                                                        </div>
                                                        <div class="form-inline ml-1">
                                                            <input type="radio" class="form-control" name="attendance[{{$row->id}}]" value="absent">&nbsp;
                                                            <b>Absent |</b>
                                                        </div>
                                                        <div class="form-inline ml-1">
                                                            <input style="color:green;" type="radio" class="form-control" name="attendance[{{$row->id}}]" value="late">&nbsp;
                                                            <b>Late </b>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td><input type="text" placeholder="Note" name="note[{{$row->id}}]" class=" form-control form-control-sm">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <input type="submit" class="btn btn-sm btn-blue float-right" value="Submit">
                                    <input style="display:none;" type="submit" class="btn btn-sm btn-blue update_loding float-right" value="Loading...">
                                </form>
                            </div>





                        </div>
                        @else
                            <p>Data not found!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection