<style>
.page-break {
    page-break-after: always;
}
</style>
<div class="row">
                    <div class="col-sm-12">
                        <div class="invoice_box">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <div class="in_logo">
                                        <img src="{{asset('public/images/logo/'.$logo->flogo)}}" alt="no-logo">
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