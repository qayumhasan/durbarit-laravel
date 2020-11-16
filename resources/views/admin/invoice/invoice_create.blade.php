<!-- <div> -->
@extends('admin.master')
@section('contents')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="head_edit">
                    <h3>Create Invoice</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create Invoice
                        </li>
                    </ol>
                </nav>
            </div>
        </div>



        <form method="post" action="{{route('admin.invoice.store')}}">
            @csrf
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cr_invoice">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Customer</label>
                                        <select id="inputState" name="customer" class="form-control">
                                            <option disabled selected>Choose Customaar...</option>
                                            @foreach($users as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('customer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Payment Method</label>
                                        <select id="inputState" name="payment_method" class="form-control">
                                            <option disabled selected>Choose...</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Cheque</option>
                                            <option value="3">Bank</option>
                                            <option value="4">Paypal</option>
                                            <option value="5">Stripe</option>
                                            <option value="6">Paystack</option>

                                        </select>
                                        @error('payment_method')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Project</label>
                                        <select id="inputState" name="project" class="form-control">
                                            <option selected disabled>Choose...</option>
                                            @foreach($projects as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('project')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">TAX/VAT</label>
                                        <input type="number" name="tax" class="form-control" id="exampleInputPassword1" placeholder="Tax">
                                        @error('tax')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Currency</label>
                                        <select id="inputState" name="currency" class="form-control">
                                            <option disabled selected>Choose...</option>
                                            <option value="1">USD ($)</option>
                                            <option value="2">AFN (؋)</option>
                                            <option value="3">ARS ($)</option>
                                            <option value="4">AWG (ƒ)</option>
                                            <option value="5">AUD ($)</option>
                                            <option value="6">AZN (ман)</option>
                                            <option value="7">BSD ($)</option>
                                            <option value="8">BBD ($)</option>
                                            <option value="9">BYR (p.)</option>
                                            <option value="10">EUR (€)</option>
                                            <option value="11">BZD (BZ$)</option>
                                            <option value="12">BMD ($)</option>
                                            <option value="13">BOB ($b)</option>
                                            <option value="14">BAM (KM)</option>
                                            <option value="15">BWP (P)</option>
                                            <option value="16">BGN (лв)</option>
                                            <option value="17">BDT (৳)</option>
                                        </select>
                                        @error('currency')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Invoice Date</label>
                                            <input type="date" name="invoicedate" class="form-control" placeholder="Text" />
                                            @error('invoicedate')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Due Date</label>
                                            <input type="date" name="duedate" class="form-control" placeholder="Text" />
                                            @error('duedate')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Invoice No</label>
                                            @php
                                            $id =rand(1111,9999);
                                            @endphp
                                            <input type="text" disabled class="form-control" value="{{$id}}" placeholder="Invoice No" />
                                            <input type="hidden" name="invoice_no" class="form-control" value="{{$id}}" placeholder="Invoice No" />
                                            @error('invoice_no')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Requrring Cycle</label>
                                        <select id="inputState" name="requrring_cycle" class="form-control">
                                            <option disabled selected>Choose...</option>
                                            <option value="Monthly">Monthly</option>

                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Semi Annually">Semi Annually</option>
                                            <option value="Annually">Annually</option>
                                            <option value="Once Time">Once Time</option>
                                        </select>
                                        @error('requrring_cycle')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Purchase Order</label>
                                        <input type="text" class="form-control" name="purchase_order" id="exampleInputPassword1" placeholder="Purchase Order">
                                        @error('purchase_order')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>


                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Paid Option</label>
                                            <select id="inputState" name="unpaid" class="form-control">
                                                <option disabled selected>Choose...</option>
                                                <option value="UnPaid">UnPaid</option>
                                                <option value="Paid">Paid</option>
                                                <option value="PARTIALLY Paid">PARTIALLY Paid</option>

                                            </select>
                                            @error('unpaid')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Discount</label>
                                            <input type="number" name="discount" class="form-control" placeholder="Discount" />
                                            @error('discount')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="discount_type" type="radio" id="inlineCheckbox1" value="1" />
                                            <label class="form-check-label" for="inlineCheckbox1"> % </label>
                                            @error('discount_type')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="discount_type" id="inlineCheckbox2" value="2" />
                                            <label class="form-check-label" for="inlineCheckbox2">Fixed</label>
                                            @error('discount_type')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="ad_p text-right">
                            <button onclick="getProduct()" type="button" class="ap_bt">
                                Add Product
                            </button>
                        </div>



                        <div class="ad_p_tab mt-3" id="product">
                            <table class="table">
                                <thead class="thead-light">

                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="add_product" class="add_product">
                                    <tr>
                                        <td>
                                            <select class="form-control" onchange="getProductPrice(this)" name="product[]" id="exampleFormControlSelect1">
                                            <option selected disabled>Choose A Product...</option>
                                                @foreach($products as $row)
                                                
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('option')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </td>


                                        <td>
                                            <input type="text" name="note[]" class="form-control" id="exampleFormControlInput1" placeholder="Note">
                                        </td>

                                        <td>
                                            <input type="number" onkeyup="quentitycount()" name="quantity[]" class="form-control" id="quantity" placeholder="Quantity">
                                        </td>

                                        <td>
                                            <input type="number" name="price[]" class="form-control" id="price" placeholder="Price">
                                        </td>

                                        <td>
                                            <input type="number" name="totalprice[]" class="form-control" id="totalprice" placeholder="Total Price">
                                        </td>



                                    </tr>



                                </tbody>
                            </table>
                        </div>







                        <div id="customer_choice_options"></div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="invo_tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Note</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Signature</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <textarea rows="5" class="form-control" name="customar_note"></textarea>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Persone Name</label>
                                    <input type="text" class="form-control-file" name="persone_name" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Company Name</label>
                                    <input type="text" class="form-control-file" name="company_name" id="exampleFormControlFile1">
                                </div>
                                </div>

                            </div>
                        </div>
                    

                    </div>
                    <div class="col-lg-12">
                    <button  type="submit" style="float: right;" class="btn btn-success mt-3 pull-right">
                           Submit
                        </button>
                    </div>

                </div>
            </div>
        </form>
        <style>
            .cr_invoice {
                background-color: #ececec;
                padding: 20px;
                margin-bottom: 20px;
                border: 1px solid #e0e0e0;
            }

            .form-check.form-check-inline {
                position: relative;
                top: 38px;
            }

            .ad_p_tab.mt-3 {
                background-color: #fff;
            }

            .ad_p.text-right button {
                background-color: #26abe2;
                color: #fff;
                border-style: none;
                padding: 5px 25px;
                font-weight: 600;
                border-radius: 25px;
            }

            .invo_tab {
                /* border: 1px solid #ababab; */
                background-color: #fff;
            }

            .tab-pane {
                padding: 20px;
            }

            .nav-link {
                display: block;
                padding: 0.5rem 1rem;
                color: #26abe2;
                font-weight: 600;
            }

            td.ic span.material-icons {
                background-color: #26abe2 !important;
                color: #fff !important;
            }
        </style>

    </div>
</section>

<!--                
<script>
    var i = 0;
    function getProduct() {
        var photo_div = '<tr class="product_row">';
        photo_div += '<td>';
        photo_div += '<select class="form-control" onclick="getProduct(this)" v-model="option'+i+'" id="product_list'+i+'">';
        photo_div += '</select>';
        photo_div += '</td>';
        photo_div += '<td>';
        photo_div += '<input type="text"  class="form-control" name="details['+i+']" id="note'+i+'" placeholder="Note">';
        photo_div += '</td>';
        
        photo_div += '<td>';
        photo_div += '<input type="text" class="form-control"  onkeyup="countTotal(this,i)" name="quantity['+i+']" id="quantity'+i+'" placeholder="Quantity">';
        photo_div += '</td>';
        
        photo_div += '<td>';
        photo_div += '<input type="text" class="form-control" name="price['+i+']" id="price'+i+'" placeholder="Price">';
        photo_div += '</td>';
        
        photo_div += '<td>';
        photo_div += '<input type="text" class="form-control" name="totalprice['+i+']" id="totalprice'+i+'" value="" placeholder="Total Price">';
        photo_div += '</td>';

        photo_div += '<td class="ic">';
        photo_div += '<button type="submit" onclick="delete_row(this)" class="material-icons"> Delete';
        photo_div += '</button>';
        
        photo_div += '</td>';
        photo_div += '</tr>';

        
        $('#add_product').append(photo_div);
        i++;
    }


    function delete_row(row) {
        $(row).closest('.product_row').remove();
    }
</script>  -->

<script>
    function getProduct() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: "{{ url('/admin/invoice/get/product') }}/",
            //  dataType:"json",
            success: function(data) {

                $('#add_product').append(data);
            }
        });

    }
</script>

<script>
     function delete_row(row) {
        
        $(row).closest('.product_row').remove();
    }

    function countTotal(){
        
    }


    function quentitycount(){
        var price = document.getElementById('price');
        var totalPrice = document.getElementById('totalprice');
        var qty = document.getElementById('quantity');
        var total =qty.value * price.value;
        totalPrice.value = total;
        
    }

    function getProductPrice(el){
        
        var id = el.value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: "{{ url('/admin/invoice/product/value') }}/"+id,
             dataType:"json",
            success: function(data) {
                var price = document.getElementById('price');
                price.value = data;
            }
        });
    }
</script>





@endsection
</div>