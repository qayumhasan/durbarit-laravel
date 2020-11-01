@extends('layouts.website')
@section('content')
<!-- checkout part start -->
<section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="billing_form">
                        <h3>Billing Form</h3>
                        <form action="{{route('customar.billing')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="{{$user->name ? $user->name:' '}}" placeholder="Name" required>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" value="{{$user->email ? $user->email:' '}}" placeholder="Email" required>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="" placeholder="Email" required>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="company" placeholder="Company Name">
                            </div>
                            <div class="form-group">

                                <select class="form-control" name="country" id="exampleFormControlSelect1">

                                    <option selected disabled>Country</option>
                                    @foreach($countries as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" class="form-control" id="exampleFormControlTextarea1" name="address" placeholder="Address" rows="3"></textarea>
                                    </div>
                                </div>
                            
                            </div>

                            
                            <div class="payment">
                                <h3>Payment Method</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Stripe
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="2">
                                    <label class="form-check-label" for="exampleRadios1">
                                    SslCommerz
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="3">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Bkash
                                    </label>
                                </div>

                            </div>
                            <button type="submit" class="btn-save">Save and Continue</button>
                        </form>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="subtotal">
                        <div class="card">
                            <div class="card-header cardh">
                                Order Summary
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                    @php
                                    $support = 0
                                    @endphp

                                    @foreach($cartcount as $row)
                                        <tr>
                                            <td>{{$row->product->name}}</td>
                                            @if($row->package_id == 1)
                                            <td class="dlr">{{$row->product->reqular_price}}</td>
                                            @else
                                            <td class="dlr">{{$row->product->premium_price}}</td>
                                            @endif
                                        </tr>

                                        @if($row->extra_price !=null)
                                            @php
                                                $support = $support + $row->extra_price;
                                            @endphp
                                        @endif
                                        
                                    @endforeach
                                    <tr>
                                            <td>Support</td>
                                            <td class="dlr">{{$support}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                           
                           
                            </div>
                            <div class="card-footer">
                                <table class="table">

                                    <tbody>

                                        <tr>
                                            <td class="sub">Subtotal:</td>
                                            <td class="dlr">${{$total}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @endsection