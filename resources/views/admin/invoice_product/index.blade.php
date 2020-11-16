@extends('admin.master')
@section('contents')
<style>
    .main_box_logo img {
        width: 50px;

    }

    .main_box_logo {
        border: 1px solid #cacaca;
        width: 80px;
        line-height: 80px;
        height: 80px;
        text-align: center;
        border-radius: 50%;
    }

    .cal {
        color: #000;
    }

    .pri span {
        background-color: #26abe2;
        display: inline-block;
        /* text-align: right; */
        color: #fff;
        padding: 10px;
        font-weight: 600;
    }

    .main_box {
        background-color: #fff;
        padding: 30px;

        box-shadow: -2px 12px 14px -7px rgba(149, 149, 149, 0.75);
        -webkit-box-shadow: -2px 12px 14px -7px rgba(148, 148, 148, 0.75);
        -moz-box-shadow: -2px 12px 14px -7px rgba(148, 148, 148, 0.75);
    }

    .main_cont h4 {
        font-size: 18px;
        margin-top: 25px;
        color: #000;
    }

    .main_cont {
        margin-bottom: 30px;
    }

    .main_cont p {
        font-size: 14px;
        color: #000;
    }

    .main_time h5 {
        font-size: 14px;
        text-transform: capitalize;
        color: #fff;
        font-weight: 600;
        background-color: #26abe2;
        display: inline-block;
        padding: 8px 22px;
        border-radius: 4px;
    }

    .pri span {
        background-color: #26abe2;
        display: inline-block;
        /* text-align: right; */
        color: #fff;
        padding: 15px;
        font-weight: 600;
        border-radius: 5px;
        position: relative;
        top: 8px;
        left: 35px;
    }

    .edit_b {
        background-color: #26abe2;
        padding: 7px 10px;
        color: #fff;
        cursor: pointer;
    }

    .edit_b a {
        text-decoration: none;
        color: #fff;
    }

    .delete_b {
        background-color: #dc3545;
        padding: 7px 10px;
        color: #fff;
    }

    .delete_b a {
        text-decoration: none;
        color: #fff;
    }

    @media (max-width: 575.98px) {

        .pl-0,
        .px-0 {
            padding-left: 15px !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 15px !important;
        }

        .pri span {

            position: relative;
            top: 8px;
            left: -131px !important;
        }
    }


    @media (min-width: 576px) and (max-width: 767.98px) {}

    @media (min-width: 768px) and (max-width: 991.98px) {}

    @media (min-width: 992px) and (max-width: 1199.98px) {}
</style>
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

        <div class="row">

        @foreach($products as $row)
            <div class="col-sm-3 mt-2">
                <div class="main_box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="main_box_logo">

                                <img src="{{asset('public/images/invoice_image/')}}/{{$row->image}}" alt="">

                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="pri">
                                <span>${{$row->price}}</span>

                            </div>
                        </div>

                    </div>
                    <div class="main_cont">
                        <h4>{{$row->name}}</h4>
                        <p>{{Str::limit($row->details,35,'...')}} </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="main_time">
                                <h5>In time </h5>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="cal">
                                <i class="far fa-calendar-alt"></i> <span>{{$row->end_date}}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="button_ed">
                    <div class="row">
                        <div class="col-sm-6 pr-0 text-center">
                            <div class="edit_b">
                                <a  class="updatemodal" data-toggle="modal" data-target="#updatemodal" data-whatever="{{$row->id}}">Edit</a>
                            </div>
                        </div>
                        <div class="col-sm-6 pl-0 text-center">
                            <div class="delete_b">
                                <a href="{{route('admin.invoice.product.delete',$row->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            
           
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
                <form action="{{route('admin.invoice.product.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="productname" required name="name">
                            <input type="hidden" class="form-control" id="id" required name="id">
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
                        <input type="file" class="form-control" id="image" name="image">
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