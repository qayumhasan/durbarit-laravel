@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Invoice Setting</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">


                    </div>
                </div>
            </div>

        </div>



        <div class="panel_body">
            <form class="form-horizontal" action="{{route('admin.invoice.setting.update')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">TAX/VAT/GST *:</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="tax" value="{{$invoices->tax}}">
                        @error('tax')
                            <small class="text-center">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Invoice Prefix:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="prefix" value="{{$invoices->prefix}}">
                        @error('prefix')
                            <small class="text-center">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-6 text-center">
                        <button type="submit" class="btn btn-blue">Update Invoice Setting</button>
                    </div>
                </div>



            </form>
        </div>

    </div>
</section>
@endsection