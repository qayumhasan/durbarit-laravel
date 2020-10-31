@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Apply</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <div class="panel_title">
                        <a href="{{route('admin.career.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span>
                            <span>Add Career Post</span></a>
                    </div> -->
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
                            <th>phone</th>
                            <th>email</th>
                            <th>Exp-selary</th>
                            <th>JobId</th>
                            <th>Action</th>
                            <th>Resume</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allapply as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->name}}</td>
                             <td> {{$row->phone}} </td>
                            <td> {{$row->email}} </td>
                            <td> {{$row->ex_selary}} </td>
                            <td> {{$row->jobid}} </td>

                            @if($row->status==0)
                            <td><span class="btn btn-danger">Not Informed</span></td>
                            @else
                            <td><span class="btn btn-success">Informed</span></td>
                            @endif
                            <td><a href="{{url('admin/apply/view/'.$row->id)}}" class="btn btn-success btn-sm text-white" title="deactive"><i class="fas fa-eye"></i></a></td>
                          
                             <td>
                                 @if($row->status==0)
                                |<a href="{{url('admin/apply/active/'.$row->id)}}" class="btn btn-danger btn-sm text-white" title="deactive"><i class="fas fa-thumbs-down"></i></a> |
                                 @else
                                 |<a href="" class="btn btn-success btn-sm text-white" title="deactive"><i class="fas fa-thumbs-up"></i></a> |
                                 @endif

                                <a href="{{url('admin/apply/delete/'.$row->id)}}"class="btn btn-danger btn-sm text-white" data-toggle="tooltip"data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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