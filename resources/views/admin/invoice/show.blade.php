@extends('admin.master')
@section('contents')







<div class="row">
    <div class="col-sm-12">
        <div class="invoice_box">
            <div class="row">
                
                <div class="col-sm-6">
                    <div class="in_head">
                        <h4>Invoice</h4>
                    </div>
                </div>
            </div>
            <div class="inbot">
                <div class="row mt-4">
                    <div class="col-sm-6 text-left">
                        <div class="in_date">
                            <h4><b>Invoice No:</b>#{{$invoice->invoice_no}}</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="in_no">

                            <h4><b>Date:</b> {{$invoice->invoicedate}}</h4>
                        </div>
                    </div>

                </div>
            </div>
            <div class="in_pay">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <div class="in_left">
                            <h5>Invoice to:</h5>
                            <span> {{$invoice->user->name}}</span><br>
                            <span> {{$invoice->user->phone}}</span><br>
                            <span> {{$invoice->user->country}}</span><br>
                            <span> {{$invoice->user->address}}</span><br>

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
                                    <th class="t_h_5">Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    @php
                                    $data = array();
                                    $total = array();
                                    @endphp
                                    @foreach(json_decode($invoice->quantity) as $key=>$row)
                                    @php
                                    $item['key']=$row;
                                    array_push($data,$item);

                                    @endphp
                                    @endforeach
                                    @foreach(json_decode($invoice->totalprice) as $key=>$row)
                                    @php
                                    $item['key']=$row;
                                    array_push($total,$item);

                                    @endphp
                                    @endforeach

                                    @foreach(json_decode($invoice->product_id) as$key =>$row))
                                    @php
                                    $product = App\Product::findOrFail($row);
                                    @endphp
                                    <td>1</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>$ {{$product->reqular_price}}</td>

                                    <td>
                                        <?php
                                        $qty = 0;
                                        array_map(function ($value) {
                                            print_r($value);
                                        }, $data[$key])

                                        ?>
                                    </td>
                                    <td>
                                        <?php

                                        array_map(function ($value) {
                                            print_r($value);
                                        }, $total[$key])
                                        ?>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <table class="table">
                        @php
                        $countdata = count(json_decode($invoice->totalprice));

                        $total = 0;
                        for($i =0; $i < $countdata; $i ++){
                            $arr1 =(int) json_decode($invoice->totalprice)[$i];
                            
                            $total = $total + $arr1;
                        }

                           
                        @endphp

                            <tbody>
                                <tr class="in_bottom">

                                    <td>
                                        <h5><span>Subtotal:</span> $ {{$total}}</h5>
                                    </td>
                                </tr>

                                <tr class="in_bottom">

                                
                      
                                    <td>
                                        <h5><span>Total:</span> $ {{$total}}</h5>
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
        margin-top: 20px;

    }


    .nb_m a {
        background-color: #dadada;
        color: #000;
        padding: 7px 20px;
        border-radius: 4px;
        font-weight: 600;
    }
</style>


@endsection