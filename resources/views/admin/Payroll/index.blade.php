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
                                    <span>Select Criteria For Payroll Generate</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">


                        <form class="search_form" action="{{route('admin.staff.attendance.payroll.search')}}" method="get">

                            <div class="row">

                                <div class="col-md-3">
                                    <label class="m-0"><b>Role :</b> </label>

                                    <select class="w-100 niceSelect bb form-control" name="role">
                                        <option data-display="Select Month *" value="">Select Role *</option>
                                        @foreach($roles as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach


                                    </select>
                                    @error('role')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="m-0"><b>Department :</b> </label>

                                    <select class="w-100 niceSelect bb form-control" name="department">
                                        <option data-display="Select Month *" value="">Select Role *</option>
                                        @foreach($department as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('department')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="m-0"><b>Months :</b> </label>

                                    <select class="w-100 niceSelect bb form-control" name="month">
                                        <option data-display="Select Month *" value="">Select Month *</option>
                                        <option @if(date('F')=='January' ) selected @endif value="January">January</option>
                                        <option @if(date('F')=='February' ) selected @endif value="February">February</option>
                                        <option @if(date('F')=='March' ) selected @endif value="March">March</option>
                                        <option @if(date('F')=='April' ) selected @endif value="April">April</option>
                                        <option @if(date('F')=='May' ) selected @endif value="May">May</option>
                                        <option @if(date('F')=='June' ) selected @endif value="June">June</option>
                                        <option @if(date('F')=='July' ) selected @endif value="July">July</option>
                                        <option @if(date('F')=='August' ) selected @endif value="August">August</option>
                                        <option @if(date('F')=='September' ) selected @endif value="September">September</option>
                                        <option @if(date('F')=='October' ) selected @endif value="October">October</option>
                                        <option @if(date('F')=='November' ) selected @endif value="November">November</option>
                                        <option @if(date('F')=='December' ) selected @endif value="December">December</option>
                                    </select>
                                    @error('month')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3">
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
                                    @error('year')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>



                    </div>



                    

                    <div class="panel_body table_body mt-3">

                        @if(count($atts) > 0)
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>
                                            SL
                                        </th>
                                        <th>Name</th>

                                        <th>Role</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($atts as $row)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>

                                        <td> {{$row->staff->name}} </td>
                                        <td> {{$row->staff->staffrole->name}} </td>
                                        <td> {{$row->staff->department->name}} </td>
                                        <td> {{$row->staff->designation->name}} </td>
                                        <td> {{$row->staff->mobile}} </td>





                                        @if($row->status == 1)
                                        <td class="center"><span class="btn btn-success">Active</span></td>
                                        @else
                                        <td class="center"><span class="btn btn-danger">InActive</span></td>
                                        @endif


                                        <td class="center"><a href="{{route('admin.payroll.genaretor',[$row->staff_id,$row->month])}}"><span class="btn btn-success">Generate PayRoll</span></a></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <td>No Data Found!</td>
                        @endif



                        <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
                        <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
                    </div>



                </div>
            </div>
        </div>
    </section>
</div>

@endsection