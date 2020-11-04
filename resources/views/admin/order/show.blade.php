@extends('admin.master')
@section('contents')


                <div class="row">
                    <div class="col-sm-12">
                        <div class="invoice_box">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <div class="in_logo">
                                        <img src="assets/images/logo.png" alt="no-logo">
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class="in_head">
                                        <h4>Invoice</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="inbot">
                                <div class="row mt-4">
                                    <div class="col-sm-6 text-left">
                                        <div class="in_date">
                                            @php
                                            $date=date_create($order->created_at);
                                            
                                            @endphp
                                            <h4><b>Date:</b> {{date_format($date,"d-M-Y")}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="in_no">
                                            <h4><b>Invoice No:</b>#{{$order->order_id}}</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="in_pay">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <div class="in_left">
                                            <h5>Invoice to:</h5>
                                            <span>{{$order->company}}</span><br>
                                            <span>{{$order->address}}</span><br>
                                            <span>{{$order->country}}</span><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="in_right">
                                            <h5>Pay to:</h5>
                                            <span>{{auth()->user()->name}}</span><br>
                                            <span>{{auth()->user()->address}}</span><br>
                                            <span>{{auth()->user()->country}}</span><br>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="in_tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table">
                                            <thead class="thead-light">
                                                
                                                <tr>
                                                    <th class="t_h">SL</th>
                                                    <th class="t_h_2">Product</th>
                                                    <th class="t_h_3">Price</th>
                                                    <th class="t_h_4">Qty</th>
                                                    <th class="t_h_5" >Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total =0;
                                                @endphp
                                                @foreach(json_decode($order->product) as $row)
                                                
                                                <tr>

                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$row->name}}</td>
                                                    <td>$ {{$row->price}}</td>
                                                    <td>{{$row->qty}}</td>
                                                    <td>$ {{$row->price + $row->extra_price}}</td>
                                                    @php
                                                        $total = $total +$row->price;
                                                    @endphp
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        <table class="table">

                                            <tbody>
                                                <tr class="in_bottom">

                                                    <td>
                                                        <h5><span>Subtotal:</span> $ {{$total}}</h5>
                                                    </td>
                                                </tr>
                                                
                                                <tr class="in_bottom">

                                                    <td>
                                                        <h5><span>Total:</span> $ {{$order->total}}</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="nb">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="nb_m">
                                <span><b>NOTE:</b> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Veritatis, aspernatur.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nb_button">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="nb_m">
                                <a href="#">Print</a>
                                <a href="#">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .invoice_box {
                        width: 100%;
                        margin: 0px auto;
                        background-color: #fff;
                        padding: 60px;
                    }

                    .in_logo img {
                        width: 150px !important;
                        height: auto;
                    }

                    .in_head h4 {
                        font-weight: 600;
                        font-size: 24px;
                    }

                    .in_date h4 {
                        font-size: 14px;
                        position: relative;
                        bottom: 6px;
                    }

                    .in_no h4 {
                        font-size: 14px;
                        position: relative;
                        bottom: 6px;
                    }

                    .inbot {
                        border-top: 1px solid #e8e8e8;
                        border-bottom: 1px solid #e8e8e8;
                        margin-top: 24px;
                    }

                    .in_pay {
                        margin-top: 10px;
                    }

                    .in_left h5 {
                        font-weight: 600;
                        text-transform: capitalize;
                    }

                    .in_right h5 {
                        font-weight: 600;
                        text-transform: capitalize;
                    }

                    .in_tab {
                        margin-top: 20px;
                        border: 1px solid #efefef;
                        border-radius: 5px;
                    }

                    th.t_h {
                        text-transform: capitalize;
                        font-size: 16px !important;
                        font-weight: 600;
                        width: 35%;
                    }

                    th.t_h_2 {
                        text-transform: capitalize;
                        font-size: 16px !important;
                        font-weight: 600;
                        width: 25%;
                    }

                    th.t_h_3 {
                        text-transform: capitalize;
                        font-size: 16px !important;
                        font-weight: 600;
                        width: 15%;
                    }

                    th.t_h_4 {
                        text-transform: capitalize;
                        font-size: 16px !important;
                        font-weight: 600;
                        width: 15%;

                    }

                    th.t_h_5 {
                        text-transform: capitalize;
                        font-size: 16px !important;
                        font-weight: 600;
                        width: 10%;
                    }

                    tr.in_bottom {
                        background-color: #efefef;
                        text-align: right;
                    }

                    tr.in_bottom span {
                        font-size: 16px;
                        font-weight: 600;
                    }

                    tr.in_bottom h5 {
                        display: inline-block;
                        position: relative;
                        right: 43px;
                        font-size: 14px;
                    }

                    .nb_m {
                        /* margin-top: 20px; */
                        
                    }


                    .nb_m a {
                        background-color: #dadada;
                        color: #000;
                        padding: 7px 20px;
                        border-radius: 4px;
                        font-weight: 600;
                    }
                </style>
            </div>
        </div>

        @endsection