@extends('admin.master')
@section('contents')
<section class="page_area">
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>
                            Video Section</span></div>
                </div>
               
            </div>
        </div>
        <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('admin.video.update')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Video Title:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="Enter Video Title" value="{{$video->title}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Video Link:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="link" placeholder="Enter video link" value="{{$video->link}}" required>
                    </div>
                </div>          
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-blue">Update Video Section</button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection