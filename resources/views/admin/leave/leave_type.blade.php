@extends('admin.master')
@section('contents')



<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Leave Type</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> <span>Add Leave Type</span></button>
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
                         
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leavetype as $row)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td> {{$row->type}} </td>
                           





                            <td>


                                <button type="button" class="btn btn-info btn-sm text-white editmodal" data-toggle="modal" data-target="#exampleModal1" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></button> |

                                <a id="delete" href="{{route('admin.leave.type.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

                                

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
                <h5 class="modal-title" id="exampleModalLabel">Add Leave Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.leave.type.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="apply_date" class="col-form-label"> Type :</label>
                        <input type="text" class="form-control" required id="type" name="leave_type">
                    </div>

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Leave Type</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Leave Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.leave.type.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="update_apply_date" class="col-form-label">Leave Type:</label>
                        <input type="hidden" required class="form-control" id="update_id" name="id">
                        <input type="text" required class="form-control" id="update_type" name="type">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update Leave Type</button>
                    </div>
                </form>
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
            document.getElementById('update_type').value = data.type;
           
            
        });
 
    });
</script>
@endsection