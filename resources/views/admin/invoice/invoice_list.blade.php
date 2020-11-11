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
                            <th>Invoice No</th>
                            <th>Customar Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            
                            <th>Payment Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $row)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td> {{$row->invoice_no}} </td>
                            <td> {{$row->user->name}} </td>
                            <td> {{$row->invoicedate}} </td>
                            <td> 500 </td>
                            <td> {{$row->duedate}} </td>
                            <td> {{$row->unpaid}} </td>
                            
                           
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
@endsection