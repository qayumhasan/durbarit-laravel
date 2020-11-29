@extends('admin.master')
@section('contents')






<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne" style="background: black;">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="panel_title" style="color: #ffffff; "><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>
                            Stripe Configuration Setting</span></div>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('admin.stripe.setting.update')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">STRIPE_KEY: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="STRIPE_KEY">
                        <input type="text" class="form-control" name="STRIPE_KEY"  value="{{ env('STRIPE_KEY') }}" placeholder="Stripe Key" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">STRIPE_SECRET: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="STRIPE_SECRET">
                        <input type="text" class="form-control" required name="STRIPE_SECRET" value="{{ env('STRIPE_SECRET') }}" placeholder="Stripe Secret" required>
                    </div>
                </div>          
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-blue">Update  Stripe Configuration Setting</button>
                </div>

            </form>

        </div>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" style="background: black;" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link d-block" data-toggle="collapse"  data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
        <div class="panel_title" style="color: #ffffff;text-decoration:none "><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>
                            Paypal Configuration Setting</span></div>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('admin.paypal.setting.update')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">PAYPAL_SANDBOX_API_USERNAME: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_USERNAME">
                        <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_USERNAME"  value="{{ env('PAYPAL_SANDBOX_API_USERNAME') }}" placeholder="PAYPAL_SANDBOX_API_USERNAME" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">PAYPAL_SANDBOX_API_PASSWORD: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_PASSWORD">
                        <input type="text" class="form-control" required name="PAYPAL_SANDBOX_API_PASSWORD" value="{{ env('PAYPAL_SANDBOX_API_PASSWORD') }}" placeholder="PAYPAL_SANDBOX_API_USERNAME" required>
                    </div>
                </div>          

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">PAYPAL_SANDBOX_API_SECRET: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="PAYPAL_SANDBOX_API_SECRET">
                        <input type="text" class="form-control" required name="PAYPAL_SANDBOX_API_SECRET" value="{{ env('PAYPAL_SANDBOX_API_SECRET') }}" placeholder="PAYPAL_SANDBOX_API_USERNAME" required>
                    </div>
                </div>          
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-blue">Update  PayPal Configuration Setting</button>
                </div>

            </form>

        </div>
      </div>
      </div>
      </div>
    </div>
  


  <div class="card">
    <div class="card-header" style="background: black;" id="headingThree">
    <h5 class="mb-0">
        <button class="btn btn-link d-block" data-toggle="collapse"  data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
        <div class="panel_title" style="color: #ffffff;text-decoration:none "><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>
        SSL Commerce Configuration Setting</span></div>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      <div class="panel_body">
            <form class="form-horizontal my-5" action="{{route('admin.ssl.commerz.setting.update')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">SSLCOMMERZ_STORE_ID: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_ID">
                        <input type="text" class="form-control" name="SSLCOMMERZ_STORE_ID"  value="{{ env('SSLCOMMERZ_STORE_ID') }}" placeholder="SSLCOMMERZ_STORE_ID" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">SSLCOMMERZ_STORE_PASSWORD: *</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_PASSWORD">
                        <input type="text" class="form-control" required name="SSLCOMMERZ_STORE_PASSWORD" value="{{ env('SSLCOMMERZ_STORE_PASSWORD') }}" placeholder="SSLCOMMERZ_STORE_PASSWORD" required>
                    </div>
                </div>          
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-blue">Update  SSL Commerz Configuration Setting</button>
                </div>

            </form>

        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection