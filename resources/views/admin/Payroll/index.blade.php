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

                                    @php
                                    $payroll = App\Payroll::with('staff')->where('month',$row->month )->where('year',$row->year)->where('staff_id',$row->staff_id)->first();
                                    @endphp

                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>

                                        <td> {{$row->staff->name}} </td>
                                        <td> {{$row->staff->staffrole->name}} </td>
                                        <td> {{$row->staff->department->name}} </td>
                                        <td> {{$row->staff->designation->name}} </td>
                                        <td> {{$row->staff->mobile}} </td>







                                        @if($payroll['ispaid'] == 1)
                                        <td class="center"><span class="btn btn-success">Paid</span></td>
                                        @elseif($payroll)

                                        <td class="center"><span class="btn btn-success">Generated</span></td>
                                        @else
                                        <td class="center"><span class="btn btn-danger">Not Generate</span></td>
                                        @endif


                                        @if($payroll['ispaid'] == 1)

                                        <td><button type="button" class="btn btn-primary viewmodal" data-toggle="modal" data-target="#exampleModalCenter1" data-whatever="{{$row->staff_id}}">View PaySlip</span></button></td>

                                        @elseif($payroll)
                                        <td><button type="button" class="btn btn-primary editmodal" data-toggle="modal" data-target="#exampleModalCenter" data-whatever="{{$payroll}}">Proceed To Pay</span></button></td>
                                        @else
                                        <td class="center"><a href="{{route('admin.payroll.genaretor',[$row->staff_id,$row->month,$row->year])}}"><span class="btn btn-info">Generate A Payroll</span></a></td>
                                        @endif

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







<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.payroll.payment.method')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Staff Name:</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="text" disabled class="form-control" id="staff">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Month Year:</label>
                        <input type="text" disabled class="form-control" name="month" id="month">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Payroll Generated Date:</label>
                        <input type="text" disabled class="form-control" name="month" id="payrollgenerate">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Payment Amount *:</label>
                        <input type="text" class="form-control" name="" id="paymentamount">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Payment Method*:</label>
                        <select class="form-control" name="payment_method" id="exampleFormControlSelect1">
                            <option value="cash">Cash</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="note" id="message"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Payslip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="viewpayroll">
                    
                    
                </table>
            </div>
           
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {
            var modal = $(this)
            var data = modal.data('whatever');

            document.getElementById('staff').value = data.staff.first_name + ' ' + data.staff.last_name;
            document.getElementById('id').value = data.id;
            document.getElementById('month').value = data.month + '-' + data.year;
            document.getElementById('payrollgenerate').value = data.genared_date;
            document.getElementById('paymentamount').value = data.net_salary;


        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".viewmodal").click(function() {
            var modal = $(this)
            
            var data = modal.data('whatever');
            console.log(data)
            $.ajax({
                type: "GET",
                url: '{{ route('admin.view.payroll')}}',

                data: {data},
                success: function(data) {
                    $('#viewpayroll').html(data);
                    
                }
            });
            
            


        });
    });
</script>

@endsection