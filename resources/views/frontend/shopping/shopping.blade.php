@extends('layouts.website')
@section('content')
    <!--- cart part start -->
    <section id="shop_cart">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="shopping_header">
                        <h3 class="text-center">Shopping Cart</h3>
                        <div class="card">
                            <div class="card-header card-header-cart">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <div class="cart_count">
                                            <h5>You have {{count($cartcount)}} item in your cart</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="cart_em">
                                            <a href="#">empty cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="cart_name">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">SL</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Product Type</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Trash</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                @foreach($cartcount as $row)
                                                

                                                    
                                                    <tr id="cartdelete{{$row->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>
                                                            <div class="pro_img">
                                                                <img src="{{asset('public/uploads/product/')}}/{{$row->product->image}}" alt="image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="pro_name">
                                                                <h5>{{$row->product->name}}</h5>
                                                            </div>
                                                        </td>
                                                        <td>{{$row->qty}}</td>
                                                        @if($row->package_id == 1)
                                                        <td>Reguler</td>
                                                        @else
                                                        <td>Premium</td>
                                                        @endif
                                                        @if($row->package_id == 1)
                                                        <td><span class="price_bold"><b>$ {{$row->product->reqular_price}}</b></span></td>
                                                        @else
                                                        <td><span class="price_bold"><b>$ {{$row->product->premium_price}}</b></span></td>
                                                        @endif
                                                        <td><span><button onclick="cartDatadelete(this)" value="{{$row->id}}"><i
                                                                        class="fas fa-trash-alt"></i></button></span></td>
                                                      
                                                    </tr>

                                                @endforeach
                                                   
                                                </tbody>
                                            </table>
                                            {{ $cartcount->links() }}
                                           
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="left_cont">
                                            <p>Lorem ipsum dolor sit amet?
                                                <br>
                                                <a href="#">Click Here to Add It</a>
                                            </p>
                                            <form>
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto">

                                                        <input type="text" class="form-control mb-2"
                                                            id="inlineFormInput" placeholder="Coupon Code">
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit"
                                                            class="btn btn-primary mb-2">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="right-content">
                                            <div class="total without-coupon" style="font-size: 18px;">
                                                <span class="title"><b>Total Amount</b></span>
                                                <span class="total-price"><b>US$59</b></span>
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-info">You have to login before purchase!</p>
                                            </div>
                                            
                                            <a href="{{route('customar.checkout')}}" class="btn btn-dark"
                                                style="margin-right:10px;">Register</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    function cartDatadelete(el) {
        
       
        $.post('{{ route('cart.data.delete') }}', {_token: '{{ csrf_token() }}',cart_id: el.value},
            function(data) {
                $('#cartdata').html(data);
                if (data) {
                    document.getElementById("cartdelete"+el.value).style.display = "none";
                    toastr.success(data.data);
                    document.getElementById('cartdatacount').innerHTML = data.count;
                    
                } 
               
            });
	}
	
	cartDatadelete();
</script>

    @endsection