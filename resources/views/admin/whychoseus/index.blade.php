@extends('admin.master')
@section('contents')

<section class="page_content">
	<!-- panel -->
	<div class="panel mb-0">
		<div class="panel_header">
			<div class="row">
				<div class="col-md-6">
					<div class="panel_title">
						<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Whychoseus</span>
					</div>
				</div>
				<div class="col-md-6 text-right">
					<div class="panel_title">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i>Add Header Text</button>
						<button type="button" style="margin: 5px;" class="btn btn-success"><i class="fas fa-plus"></i> <a href="{{route('admin.whychoseus.create')}}" style="color: #fff;">Add Whychoseus</a></button>
					</div>
				</div>
			</div>

		</div>
		<form action="" method="post">
			@csrf
			<!-- <button type="submit" style="margin: 5px;" class="btn btn-danger" ><i class="fa fa-trash"></i> Delete All</button> -->
			<div class="panel_body">
				<div class="table-responsive">
					<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
						<thead>
							<tr>
								<th>
									<label class="chech_container mb-4">
										<input type="checkbox" id="check_all">
										<span class="checkmark"></span>
									</label>
								</th>
								<th>#</th>
								<th>Title</th>
								<th>Details</th>
								<th>manage</th>
							</tr>
						</thead>
						<tbody>
							@foreach($wchoseus as $key => $data)
							<tr>
								<td>
									<label class="chech_container mb-4">
										<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
										<span class="checkmark"></span>
									</label>
								</td>
								<td>{{++$key}}</td>
								<td>{{$data->title}}</td>
								<td>{{Str::limit($data->details,40)}}</td>
								<td>
									<a href="{{url('admin/whychoseus/edit/'.$data->id)}}" class="btn btn-primary btn-sm text-white" title="Edit"><i class="fas fa-pencil-alt"></i></a>
									<a id="delete" href="{{url('admin/whychoseus/destroy/'.$data->id)}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
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
				<h5 class="modal-title" id="exampleModalLongTitle">Why Choose Us Header Text Update</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.choosus.header.update')}}" method="post">
					@csrf
					<div class="form-group">
						@php
							$data = App\HeaderText::where('type','choose')->first();
						@endphp

						<textarea name="chooseus" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->details}}</textarea>

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


@endsection