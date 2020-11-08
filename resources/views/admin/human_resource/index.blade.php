@extends('admin.master')
@section('contents')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background: #26ABE2;
    }

    input:focus+.slider {
        box-shadow: #26ABE2;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Human Resource</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="{{route('admin.staff.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span>
                            <span>Add Staff</span></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel_body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">

                    <thead>
                        <tr>
                            <th>Staff No.</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($staffs as $row)
                        <tr id="1">
                            
                            <td>{{$row->staff_no}}</td>
                            <td>{{$row->name}}</td>
                            
                            <td>{{$row->staffrole->name}}</td>
                            <td>{{$row->department->name}}</td>
                            <td>{{$row->designation->name}}</td>
                            <td>{{$row->mobile}}</td>
                            <td>{{$row->email}}</td>
                            
                            
                           

                            <td>
                                <label class="switch">
                                    <input type="checkbox" @if($row->status ==1) checked @endif class="switch-input">
                                    <span class="slider round"></span>
                                </label>
                            </td>

                            <td>

                                @if($row->status == 1)
                                <a href="{{route('admin.staff.status',$row->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
                                @else
                                <a href="{{route('admin.staff.status',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-down"></i></a>
                                @endif
                                | <a href="{{route('admin.staff.edit',$row->id)}}" class="btn btn-info btn-sm text-white updatemodal"><i class="fas fa-pencil-alt"></i></a> |

                                <a id="delete" href="{{route('admin.staff.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
                                <a href="{{route('admin.staff.show',$row->id)}}" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-eye"></i></a>

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