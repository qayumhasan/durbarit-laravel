@extends('admin.master')
@section('contents')

<section class="page_content">
    <!-- panel -->
    <form action="{{route('admin.staff.attendance.store')}}" method="post">
        @csrf
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Staff</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">

                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i> <span>Save Attendance</span></button>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel_body">
            <div class="table-responsive">
                <table id="table_id_table" class="display school-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="15%">Staff No.</th>
                            <th width="15%">Staff Name</th>
                            <th width="12%">Role</th>
                            <th width="35%">Attendance</th>
                            <th width="20%">Note</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach($attents as $row)
                        <tr>
                            <td>{{$row->staff_no}}></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->staffrole->name}}</td>
                            <td>
                                <div class="d-flex radio-btn-flex">
                                    
                                    <div class="mr-20">
                                        <input type="radio" name="attendance[{{$row->id}}]" id="attendanceP3" value="P" class="common-radio attendanceP" checked>
                                        <label for="attendanceP3">Present</label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="attendance[{{$row->id}}]" id="attendanceL3" value="L" class="common-radio">
                                        <label for="attendanceL3">Late</label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="attendance[{{$row->id}}]" id="attendanceA3" value="A" class="common-radio">
                                        <label for="attendanceA3">Absent</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="attendance[{{$row->id}}]" id="attendanceH3" value="F" class="common-radio">
                                        <label for="attendanceH3">Half Day</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-effect">
                                    <textarea class="primary-input form-control" cols="0" rows="2" name="note[{{$row->id}}]" placeholder="Enter note here.." id=""></textarea>
                                    <span class="invalid-feedback">
                                        <strong>Error</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                       
 
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </div>
</section>



@endsection('contents')