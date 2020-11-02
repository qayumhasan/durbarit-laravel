@extends('admin.master')
@section('contents')
<section class="page_area">
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>All Project</span></div>
                </div>
                <div class="col-md-6 text-right">

                    <button type="button" style="margin: 5px;" class="btn btn-success"><i class="fas fa-award"></i> <a href="{{route('admin.project.index')}}" style="color: #fff;">All
                            Project</a></button>
                </div>
            </div>
        </div>
        <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Title:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category Name:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
                            <option selected disabled>Select A Category</option>
                            @foreach($categores as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">

                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Product:</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="product_id" id="exampleFormControlSelect1">
                            <option selected disabled>Select A Product</option>
                            @foreach($products as $row)
                                <option value="{{$row->id}}">{{$row->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
             




                <div class="form-group text-center">

                    <button type="submit" class="btn btn-blue">Add Project</button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection