@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Services</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i>Add Header Text</button>
                        <a href="{{route('admin.service.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span>
                            <span>Add Service</span></a>
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
                            <th >Heading</th>
                            <th >Details</th>
                            <th >Image</th>
                            <th>Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $row)
                        <tr>
                            <td>
                            {{$loop->iteration}}
                            </td>
                            
                            <td> {{$row->name}} </td>
                           
                            <td> {!!Str::limit($row->details,80)!!} </td>

                            <td>
                                <img src="{{asset('public/images/services/')}}/{{$row->image}}" alt="" height="40px">
                            </td>
                            @if($row->status == 1)
                                <td class="center"><span class="btn btn-success">Active</span></td>
                            @else
                                <td class="center"><span class="btn btn-danger">InActive</span></td>
                            @endif
                            <td>

                                @if($row->status == 1)
                                <a href="{{route('admin.service.status',$row->id)}}"
                                    class="btn btn-success btn-sm text-white" data-toggle="tooltip"
                                    data-placement="right" title="active" data-original-title="active"><i
                                        class="far fa-thumbs-up"></i></a>
                                @else
                                <a href="{{route('admin.service.status',$row->id)}}"
                                    class="btn btn-danger btn-sm text-white" data-toggle="tooltip"
                                    data-placement="right" title="active" data-original-title="active"><i
                                        class="far fa-thumbs-down"></i></a>
                                @endif
                                | <a href="{{route('admin.service.edit',$row->id)}}"
                                    class="btn btn-info btn-sm text-white" title="edit" data-original-title="edit"><i
                                        class="fas fa-pencil-alt"></i></a> |

                                <a href="{{route('admin.service.delete',$row->id)}}" id="delete"onclick="form_submit()" href="#"
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



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Our Service Header Text Update</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.servce.header.update')}}" method="post">
					@csrf
					<div class="form-group">
						@php
							$data = App\HeaderText::where('type','service')->first();
						@endphp

						<textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->details}}</textarea>

					</div>
					<div class="form-group float-right">

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection('contents')