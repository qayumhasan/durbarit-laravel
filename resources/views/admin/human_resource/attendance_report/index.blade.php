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
                                        <option @if(date('F') == 'January' ) selected @endif value="January">January</option>
                                        <option @if(date('F') == 'February' ) selected @endif value="February">February</option>
                                        <option @if(date('F') == 'March' ) selected @endif value="March">March</option>
                                        <option @if(date('F') == 'April' ) selected @endif value="April">April</option>
                                        <option @if(date('F') == 'May' ) selected @endif value="May">May</option>
                                        <option @if(date('F') == 'June' ) selected @endif value="June">June</option>
                                        <option @if(date('F') == 'July' ) selected @endif value="July">July</option>
                                        <option @if(date('F') == 'August' ) selected @endif value="August">August</option>
                                        <option @if(date('F') == 'September' ) selected @endif value="September">September</option>
                                        <option @if(date('F') == 'October' ) selected @endif value="October">October</option>
                                        <option @if(date('F') == 'November' ) selected @endif value="November">November</option>
                                        <option @if(date('F') == 'December' ) selected @endif value="December">December</option>
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




                    @if(count($staffs) >0)
                    <div class="panel_body table_body mt-3">

                        <!-- <h5>Today : 09-November-2020</h5> -->
                        <h5>Today : {{date("d-M-Y")}}</h5>
                        <hr style="border-bottom:1px solid black;">

                        <style>
                            th {
                                line-height: 14px;
                            }

                            td {
                                line-height: 11px;
                            }
                        </style>
                        @if (count($staffs) > 0)
                        <div class="text-left">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="attendance_status_marking_area">
                                        <div class="row">
                                            <h6 class="badge badge-success ml-3 mr-1"><b> P </b> </h6>
                                            <h6 class="ml-1"> - Present </h6>
                                            <h6 class="badge badge-danger ml-2"><b>A</b></h6>
                                            <h6 class="ml-1"> - Absent </h6>
                                            <h6 class="badge badge-primary ml-2"><b>L</b></h6>
                                            <h6 class="ml-1"> - Late </h6>
                                            <h6 class="badge badge-info ml-2"><b>H</b></h6>
                                            <h6 class="ml-1"> - Holiday </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="overflow-x: scroll;">

                                <table id="dataTableExample1" class="table table-sm student_attendance_report_table table-bordered mb-2">

                                    <thead>
                                        <tr class="text-center">
                                            <th>Staff Name</th>

                                            @foreach ($monthDates as $monthDate)
                                            @php
                                            $splitDateDay = explode('-', $monthDate);
                                            $day = $splitDateDay[1];
                                            $date = $splitDateDay[0];
                                            @endphp
                                            <th>{{ $day }} <br> {{ $date }}</th>
                                            @endforeach

                                            <th class="text-success"> Total <br> Present </th>
                                            <th class="text-danger"> Total <br> Absent </th>
                                            <th class="text-primary"> Total <br> Late </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($staffs as $student)
                                        <tr class="text-center">
                                            <td>
                                                {{ $student->first_name.' '. $student->last_name }}
                                            </td>
                                            @php
                                            $attendances = App\Attendance::where('staff_id',$student->id)->where('month',$month)->where('year',$year)->get();

                                            $totalPresent = 0;
                                            $totalAbsent = 0;
                                            $totalLate = 0;
                                            $totalHalfDay = 0;

                                            @endphp
                                            @foreach ($monthDates as $monthDate)
                                            @php
                                            $splitDateDay = explode('-', $monthDate);
                                            $day = $splitDateDay[1];
                                            $date = $splitDateDay[0];

                                            @endphp
                                            <td>
                                                @php
                                                $checkEmpty = 0;
                                                @endphp
                                                @foreach ($attendances as $attendance)
                                                @php
                                                $spliteAttendanceDate = explode('-',$attendance->date);
                                                @endphp
                                                @if ($date == $spliteAttendanceDate[0])
                                                @if ($attendance->attendance === "present")
                                                <h5 class="badge badge-success"><b> P </b> </h5>
                                                @php
                                                $totalPresent +=1;
                                                @endphp
                                                @elseif($attendance->attendance === "absent")
                                                <h6 class="badge badge-danger"><b> A </b> </h6>
                                                @php
                                                $totalAbsent +=1;
                                                @endphp
                                                @elseif($attendance->attendance === "late")
                                                <h5 class="badge badge-info"><b> L </b> </h5>
                                                @php
                                                $totalHalfDay +=1;
                                                @endphp
                                                @endif
                                                @php
                                                $checkEmpty = 1;
                                                @endphp
                                                @endif
                                                @endforeach
                                                @if ($checkEmpty == 0)
                                                <h5 class="badge badge-info "><b>H</b></h5>
                                                @endif
                                            </td>

                                            @endforeach

                                            <td>
                                                @if ($attendances->count() > 0)
                                                <b> {{ round($totalPresent / $attendances->count() * 100, 2) }}% </b>
                                                @else
                                                <b> 0% </b>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($attendances->count() > 0)
                                                <b> {{ round($totalAbsent / $attendances->count() * 100, 2) }}%</b>
                                                @else
                                                <b> 0% </b>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($attendances->count() > 0)
                                                <b> {{ round($totalHalfDay / $attendances->count() * 100, 2) }}% </b>
                                                @else
                                                <b> 0% </b>
                                                @endif
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        @else
                        <span class="alert alert-danger mt-3 d-block">There is no Staff</span>
                        @endif

                        <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
                        <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
                    </div>
                    @else
                    <span class="alert alert-danger mt-3 d-block">No Data Found!</span>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@endsection