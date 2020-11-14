@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Project Category</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i> <span>Add Category</span></button>
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
                            <th>Designation Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categores as $row)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td> {{$row->name}} </td>
                            <td> {{$row->details}} </td>
                            @if($row->status == 1)
                            <td class="center"><span class="btn btn-success">Active</span></td>
                            @else
                            <td class="center"><span class="btn btn-danger">InActive</span></td>
                            @endif
                            <td>

                                @if($row->status == 1)
                                <a href="{{route('admin.invoice.project.category.status',$row->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
                                @else
                                <a href="{{route('admin.invoice.project.category.status',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-down"></i></a>
                                @endif
                                | <a class="btn btn-info btn-sm text-white updatemodal" data-toggle="modal" data-target="#updatemodal" data-whatever="{{$row->id}}" title="edit" data-original-title="edit"><i class="fas fa-pencil-alt"></i></a> |

                                <a type="submit" id="delete" onclick="form_submit()" href="{{route('admin.invoice.project.category.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- insert modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" designation="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" designation="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Project Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.invoice.project.category.create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Add Category Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Add Category Description:</label>
                        <textarea class="form-control" name="details" id="details" rows="3"></textarea>
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create Project Category</button>
                </div>
                </form>
            </div>


        </div>

    </div>
</div>


<!-- update modal -->

<div class="modal fade" id="updatemodal" tabindex="-1" designation="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" designation="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Project Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.invoice.project.category.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category Name:</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <input type="text" class="form-control" id="updatename" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category Description:</label>
                        <textarea class="form-control" name="details" id="updatedetails" rows="3"></textarea>
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Project Category</button>
                </div>
                </form>
            </div>


        </div>

    </div>
</div>


@endsection('contents')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            $('.updatemodal').on('click', function() {
                
                var com_id = $(this).data('whatever');
                
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/admin/invoice/project/category/edit') }}/" + com_id,
                    processData: false,
                    success: function(data) {
                        var name =document.querySelector('#updatename').value = data.name;
                        var name =document.querySelector('#updatedetails').value = data.details;
                        var name =document.querySelector('#id').value = data.id;
                    }
                });
            });
        });
    </script>