@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Product</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i> <span>Add Invoice Product</span></button>
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
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>created at</th>
                            <th>Status</th>
                            <th>manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $row)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td> {{$row->name}} </td>
                            <td> {{$row->details}} </td>
                            <td> {{$row->image}} </td>
                            <td> {{$row->start_date}} </td>

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
    <div class="modal-dialog modal-lg modal-dialog-centered" designation="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Invoice Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.invoice.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="name" required name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Category:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="categores_id">
                                    <option selected disabled>Select Category</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Start Date:</label>
                            <input type="date" class="form-control" id="name" required name="start_date">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">End Date:</label>
                            <input type="date" class="form-control" id="name" required name="end_date">
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Per Item Price:</label>
                        <input type="number" class="form-control" id="name" required name="price">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Description:</label>
                        <textarea class="form-control" name="details" id="details" required rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" id="name" required name="image">
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create Product</button>
                </div>
                </form>
            </div>


        </div>

    </div>
</div>


<!-- update modal -->

<div class="modal fade" id="updatemodal" tabindex="-1" designation="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" designation="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Project Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.invoice.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="productname" required name="name">
                            <input type="text" class="form-control" id="id" required name="id">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Category:</label>
                            <select class="form-control" id="category" name="categores_id">
                                    <option selected disabled>Select Category</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Start Date:</label>
                            <input type="date" class="form-control" id="product_start_date" required name="start_date">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">End Date:</label>
                            <input type="date" class="form-control" id="product_end_date" required name="end_date">
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Per Item Price:</label>
                        <input type="number" class="form-control" id="product_price" required name="price">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Description:</label>
                        <textarea class="form-control" name="details" id="product_details" required rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" id="image" required name="image">
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Product</button>
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
                    url: "{{ url('/admin/product/invoice/edit') }}/" + com_id,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        document.querySelector('#id').value = data.id;
                        document.querySelector('#productname').value = data.name;
                        document.querySelector('#product_start_date').value = data.start_date;
                        document.querySelector('#product_end_date').value = data.end_date;
                        document.querySelector('#product_price').value = data.price;
                        document.querySelector('#product_details').value = data.details;
                        
                      
                    }
                });
            });
        });
    </script>