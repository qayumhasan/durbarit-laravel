@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Customar</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="{{route('admin.customar.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span>
                            <span>Add Customar</span></a>
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
                            <th >Name</th>
                            <th >Email</th>
                            <th >User Name</th>
                            <th >Type</th>
                            <th >Created At</th>
                            <th width="20%">Image</th>
                            <th>Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $row)
                        <tr>
                            <td>
                            {{$loop->iteration}}
                            </td>

                            <td> {{$row->name}} </td>
                            <td> {{$row->email}} </td>
                            <td> {{$row->username}} </td>
                            <td class="center"><span class="btn btn-success">User</span></td>
                            <td> {{$row->created_at->format('d-m-Y')}} </td>
                            <td>
                                <img src="{{asset('public/images/user')}}/{{$row->image}}" alt="" width="25%">
                            </td>
                            @if($row->status == 1)
                                <td class="center"><span class="btn btn-success">Active</span></td>
                            @else
                                <td class="center"><span class="btn btn-danger">InActive</span></td>
                            @endif
                            <td>

                                @if($row->status == 1)
                                <a href="{{route('admin.customar.status',['user',$row->id])}}"
                                    class="btn btn-success btn-sm text-white" data-toggle="tooltip"
                                    data-placement="right" title="active" data-original-title="active"><i
                                        class="far fa-thumbs-up"></i></a>
                                @else
                                <a href="{{route('admin.customar.status',['user',$row->id])}}"
                                    class="btn btn-danger btn-sm text-white" data-toggle="tooltip"
                                    data-placement="right" title="active" data-original-title="active"><i
                                        class="far fa-thumbs-down"></i></a>
                                @endif
                                | <a href="{{route('admin.customar.edit',['user',$row->id])}}"
                                    class="btn btn-info btn-sm text-white" title="edit" data-original-title="edit"><i
                                        class="fas fa-pencil-alt"></i></a> |

                                <a href="{{route('admin.customar.delete',['user',$row->id])}}" id="delete"onclick="form_submit()" href="#"
                                    class="btn btn-danger btn-sm text-white" data-toggle="tooltip"
                                    data-placement="right" title="Delete" data-original-title="Delete"><i
                                        class="far fa-trash-alt"></i></a>


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
