@extends('admin.master')
@section('contents')
<style>
    .p_border{
        text-align: center;
    }
</style>


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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> <span>Apply For Leave</span></button>
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
                            <td> {{$row->applyType->type}} </td>
                            <td> {{$row->apply_date}} </td>
                            <td> {{$row->leave_form}} </td>
                            <td> {{$row->leave_to}} </td>
                            @if($row->status == 0)
                            <td><a href="{{route('admin.leave.status',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-down"></i></a>  </td>
                            @elseif($row->status == 1)
                            <td><a href="{{route('admin.leave.status',$row->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>  </td>
                            @endif





                            <td>


                                <button type="button" class="btn btn-info btn-sm text-white editmodal" data-toggle="modal" data-target="#exampleModal1" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></button> |

                                <a id="delete" href="{{route('admin.leave.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

                                | <button class="btn btn-info btn-sm text-white showmodal"   data-toggle="modal" data-target="#exampleModalCenterarea" data-whatever="{{$row}}" title="view"><i class="fas fa-eye"></i></button> 

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>






</section>



<!--Insert Modal -->
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
                        <label for="apply_date" class="col-form-label">Apply Date:</label>
                        <input type="date" class="form-control" required id="apply_date" name="apply_date">
                    </div>

                    <div class="form-group">
                        <label for="apply_date" class="col-form-label">Apply Types:</label>
                        <select class="form-control" name="leave_type" id="exampleFormControlSelect1" required>
                            <option selected disabled>Select Your Leave Type</option>
                            @foreach($type as $row)
                                <option value="{{$row->id}}">{{$row->type}}</option>
                            @endforeach
                            
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Leave Form:</label>
                        <input type="date" required class="form-control" id="leave_form" name="leave_form">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Leave To:</label>
                        <input type="date" required class="form-control" id="leave_to" name="leave_to">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Reason:</label>

                        <textarea rows="3" required class="form-control" id="reason" name="reason"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Apply For Leave</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- update modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply For Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.leave.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="update_apply_date" class="col-form-label">Apply Date:</label>
                        <input type="hidden" required class="form-control" id="update_id" name="id">
                        <input type="date" required class="form-control" id="update_apply_date" name="apply_date">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Apply Types:</label>
                        <select class="form-control" name="leave_type" id="update_apply_type" required>
                            <option selected disabled>Select Your Leave Type</option>
                            @foreach($type as $row)
                                <option value="{{$row->id}}">{{$row->type}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Leave Form:</label>
                        <input type="date" required class="form-control" id="update_leave_form" name="leave_form">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Leave To:</label>
                        <input type="date" required class="form-control" id="update_leave_to" name="leave_to">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Reason:</label>

                        <textarea rows="3" required class="form-control" id="update_reason" name="reason"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update Apply For Leave</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


  
  <!-- View Modal -->
  <div class="modal fade" id="exampleModalCenterarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Show Leave Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-4">
          <div class="row p_border">
              <div class="col-md-4 border p-3">
                Leave type
              </div>
              <div class="col-md-8 border p-3">
                  <p id="view_leave_type"></p>
              </div>
          </div>
          <div class="row p_border">
              <div class="col-md-4 border p-3">
                Leave From
              </div>
              <div class="col-md-8 border p-3">
                <p id="view_leave_from"></p>
              </div>
          </div>
          <div class="row p_border">
              <div class="col-md-4 border p-3">
                Apply To
              </div>
              <div class="col-md-8 border p-3">
                <p id="view_leave_to"></p>
              </div>
          </div>
          <div class="row p_border">
              <div class="col-md-4 border p-3">
                Apply date
              </div>
              <div class="col-md-8 border p-3">
                <p id="view_leave_date"></p>
              </div>
          </div>
          <div class="row p_border">
              <div class="col-md-4 border p-3">
                Duration
              </div>
              <div class="col-md-8 border p-3">
                <p id="view_leave_duration"></p>
              </div>
          </div>
          <div class="row p_border">
              <div class="col-md-4 border p-3">
                Reason
              </div>
              <div class="col-md-8 border p-3">
                <p id="view_leave_reason"></p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {
            var modal = $(this)
            var data = modal.data('whatever');
            document.getElementById('update_id').value = data.id;
            document.getElementById('update_apply_date').value = data.apply_date;
            document.getElementById('update_leave_form').value = data.leave_form;
            document.getElementById('update_leave_to').value = data.leave_to;
            document.getElementById('update_reason').value = data.reason;
            $('#update_apply_type').val(data.leave_type).selected;
            
        });
        $(".showmodal").click(function() {
            
            var modal = $(this)
            var data = modal.data('whatever');
            
            document.getElementById('view_leave_type').innerHTML = data.apply_type.type;
            document.getElementById('view_leave_date').innerHTML = data.apply_date;
            document.getElementById('view_leave_from').innerHTML = data.leave_form;
            document.getElementById('view_leave_to').innerHTML = data.leave_to;
            document.getElementById('view_leave_reason').innerHTML = data.reason;
            document.getElementById('view_leave_duration').innerHTML = Number(data.leave_form) - Number(data.leave_to);
        });
    });
</script>
@endsection