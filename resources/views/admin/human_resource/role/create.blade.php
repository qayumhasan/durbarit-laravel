@extends('admin.master')
@section('contents')
<section class="page_area">
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>All
                            Slider</span></div>
                </div>
                <div class="col-md-6 text-right">

                    <button type="button" style="margin: 5px;" class="btn btn-success"><i class="fas fa-award"></i> <a
                            href="{{route('slider.index')}}" style="color: #fff;">All
                            Slider</a></button>
                </div>
            </div>
        </div>
        <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('slider.store')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Heading:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="heading" placeholder="Enter Slider Heading" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Paragraph:</label>
                    <div class="col-sm-6">
                        <textarea name="paragraph" id="editor1" rows="10" cols="80" required>
                           
                        </textarea>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Slider Image:</label>
                    <div class="col-sm-6">
                        <input type="file" name="image" required>
                        <p>(2560px*1700px)</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Button Link:</label>
                    <div class="col-sm-6">
                        <input type="text" name="link" class="form-control" placeholder="Enter Slider Button Link">
                        <!--  <p>(20px*20px)</p> -->
                    </div>
                </div>


                
                <div class="form-group text-center">

                    <button type="submit" class="btn btn-blue">Add Slider</button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection