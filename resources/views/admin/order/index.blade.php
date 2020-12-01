@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All In House Orders </span>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel_body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2 text-center ">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th >Order Code</th>
                            <th >Quentity</th>
                            
                            <th >Customar</th>
                            <th >Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th style="width: 10%;">manage</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $row)
                        <tr>
                            <td>
                            {{$loop->iteration}}
                            </td>
                            
                            <td> {{$row->order_id}} </td>
                            <td> {{$row->qty}} </td>
                            <td> {{$row->user->name}} </td>
                            <td> {{$row->total}} </td>
                            <td> {{$row->payment}} </td>
                            <td> {{$row->PaymentMethod}} </td>
                            
                            <td>
                            <div class="dropdown text-center">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none;border:none">
                                <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('admin.show.order',$row->id)}}">View</a>
                                    <a class="dropdown-item" href="{{route('admin.order.delete',$row->id)}}">Delete</a>
                                </div>
                                </div>
                                        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
            <tr>
            <th>
                                SL
                            </th>
                            <th >Order Code</th>
                            <th >Quentity</th>
                            
                            <th >Customar</th>
                            <th >Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th style="width: 10%;">manage</th>
            </tr>
        </tfoot>

                </table>
            </div>
        </div>
        </form>
    </div>
</section>

@endsection('contents')