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
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" value="{{$user->email ? $user->email:' '}}" placeholder="Email" required>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$user->phone ?? ''}}" placeholder="Email" required>
                                    </div>
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                                
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="company" placeholder="Company Name">
                                @error('company')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="form-group">

                                <select class="form-control" name="country" id="exampleFormControlSelect1">

                                    <option selected disabled>Country</option>
                                    @foreach($countries as $row)
                                        <option value="{{$row->id}}" @if($user->country == $row->id) selected @endif>{{$row->name}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" class="form-control" id="exampleFormControlTextarea1" name="address" placeholder="Address" rows="3">{{$user->address?? ''}}</textarea>
                                    </div>
                                </div>
                                @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            
                            </div>

                            
                            <div class="payment">
                                <h3>Payment Method</h3>
                                @error('payment_method')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
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
                                        Paypal
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
                                                <td class="dlr">{{$row->qty}}<small>×</small>{{$row->product->reqular_price}}</td>
                                            @elseif($row->package_id == 2)
                                                <td class="dlr">{{$row->qty}}<small>×</small>{{$row->product->premium_price}}</td>
                                            @else
                                                <td class="dlr">{{$row->qty}}<small>×</small>{{$row->product->reqular_price}}</td>
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