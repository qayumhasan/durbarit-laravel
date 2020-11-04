@extends('admin.master')
@section('contents')
<section class="page_area">
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>
                            Sms Setting</span></div>
                </div>
               
            </div>
        </div>
        <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('admin.sms.update')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Sms Url:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="url" placeholder="Enter Sms URL" value="{{$sms->sms_url}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">User Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" placeholder="Enter user name" value="{{$sms->sms_username}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Password:</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" placeholder="Enter user name" value="{{$sms->sms_password}}" required>
                    </div>
                </div>

                
                         
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-blue">Update Sms Setting</button>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection