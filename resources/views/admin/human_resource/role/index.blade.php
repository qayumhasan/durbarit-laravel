@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Staff Role</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i> <span>Add Staff Role</span></button>
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
                            <th>Role Name</th>
                            <th>Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $row)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td> {{$row->name}} </td>
                            @if($row->status == 1)
                            <td class="center"><span class="btn btn-success">Active</span></td>
                            @else
                            <td class="center"><span class="btn btn-danger">InActive</span></td>
                            @endif
                            <td>

                                @if($row->status == 1)
                                <a href="{{route('slider.show',$row->id)}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-up"></i></a>
                                @else
                                <a href="{{route('slider.show',$row->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="active" data-original-title="active"><i class="far fa-thumbs-down"></i></a>
                                @endif
                                | <a href="{{route('slider.edit',$row->id)}}" class="btn btn-info btn-sm text-white" title="edit" data-original-title="edit"><i class="fas fa-pencil-alt"></i></a> |

                                <button type="submit" id="delete" onclick="form_submit()" href="#" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></button>

                                <form id="slider_form" method="post" action="{{route('slider.destroy',$row->id)}}">
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Staff Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.staff.role.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Add Staff Role:</label>
                        <input type="text" class="form-control" id="recipient-name" name="role">
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


@endsection('contents')