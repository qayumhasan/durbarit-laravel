@extends('admin.master')
@section('contents')



<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Leave Applications</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i> <span>Apply For Leave</span></button>
                    </div>
                </div>

            </div>

        </div>

        <div class="panel_body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>Type</th>
                            <th>Form</th>
                            <th>To</th>
                            <th>Apply Date</th>
                            <th>Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applies as $row)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td> {{$row->leave_type}} </td>
                            <td> {{$row->apply_date}} </td>
                            <td> {{$row->leave_form}} </td>
                            <td> {{$row->leave_to}} </td>
                            <td> {{$row->status}} </td>




                            <td>

                                @if($row->status == 1)
                                <a href="{{route('admin.invoice.project.category.status',$row->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
                                @else
                                <a href="{{route('admin.invoice.project.category.status',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-down"></i></a>
                                @endif
                                | <button href="{{route('admin.staff.edit',$row->id)}}" id="modalarea" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#updatemodal" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></button> |

                                <a id="delete" href="{{route('admin.invoice.project.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

                                | <a href="{{route('admin.invoice.project.view',$row->id)}}" class="btn btn-info btn-sm text-white updatemodal" title="view"><i class="fas fa-eye"></i></a> |

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


<!-- Update modal -->


<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply For Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.leave.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apply Date:</label>
                        <input type="date" class="form-control" id="update_apply_date" value="123" name="apply_date">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Leave Type:</label>
                        <div class="form-group">

                            <select class="form-control" name="leave_type" id="exampleFormControlSelect1">
                                <option selected disabled>Select Your Leave Type</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Leave Form:</label>
                            <input type="date" class="form-control" id="leave_form" name="leave_form">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Leave To:</label>
                            <input type="date" class="form-control" value="" id="update_leave_to" name="leave_to">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Reason:</label>

                            <textarea rows="3" class="form-control" id="reason" name="reason"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Create Staff Role</button>
                        </div>
                </form>
            </div>


        </div>
    </div>
</div>





<!-- insert modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply For Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.leave.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apply Date:</label>
                        <input type="date" class="form-control" id="apply_date" name="apply_date">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Leave Type:</label>
                        <div class="form-group">

                            <select class="form-control" name="leave_type" id="exampleFormControlSelect1">
                                <option selected disabled>Select Your Leave Type</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Leave Form:</label>
                            <input type="date" class="form-control" id="leave_form" name="leave_form">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Leave To:</label>
                            <input type="date" class="form-control" id="leave_to" name="leave_to">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Reason:</label>

                            <textarea rows="3" class="form-control" id="reason" name="reason"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Create Staff Role</button>
                        </div>
                </form>
            </div>


        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#modalarea').click('show.bs.modal', function(event) {
        
        var modal = $(this)
        var data =modal.data('whatever');
        
        console.log(data.apply_date);
        document.querySelector('name');
        var applydate = document.getElementById('update_apply_date').value=data.apply_date;
        console.log(applydate);
    })
</script>

@endsection