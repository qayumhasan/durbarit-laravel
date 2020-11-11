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


                        <form class="search_form" action="{{route('admin.staff.attendance.report.search')}}" method="get">
                            
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="m-0"><b>Months :</b> </label>

                                    <select class="w-100 niceSelect bb form-control" name="month">
                                        <option data-display="Select Month *" value="">Select Month *</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="m-0"><b>Years :</b> </label>
                                    <select class="niceSelect w-100 bb form-control " name="year" id="year">
                                        <option data-display="Select Year *" value="">Select Year *</option>
                                        <option value="2020" selected>2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
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
                                    <table class="table table-bordered table-striped table-sm table-hover mb-2">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Staff No</th>
                                                <th>Staff Name</th>
                                                <th>Role</th>

                                                <th>Photo</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Late</th>
                                                <th>%</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($attents as $row)
                                            <tr class="text-center">
                                                <td>{{$row->staff->staff_no}}</td>
                                                <td>{{$row->staff->name}}</td>
                                                <td>{{$row->staff->staffrole->name}}</td>

                                                <td>
                                                    <img height="40" width="40" src="{{ asset('public/images/staff/'.$row->staff->image) }}">
                                                </td>
                                                <td>
                                                    {{$row->attendencecountvalue->present ?? 'NULL'}}
                                                </td>
                                                <td>
                                                    {{$row->attendencecountvalue->absent ?? 'NULL'}}
                                                </td>
                                                <td>
                                                {{$row->attendencecountvalue->late ?? 'NULL'}}
                                                </td>
                                                <td>
                                                    10
                                                </td>

                                                <td>

                                                    
                                                    <a href="{{route('admin.staff.attendance.show',[$row->staff_id,$row->year])}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-eye"></i></a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    
                                
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