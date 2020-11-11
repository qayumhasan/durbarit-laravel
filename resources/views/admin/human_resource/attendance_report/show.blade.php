@extends('admin.master')
@section('contents')
@php
date_default_timezone_set('Asia/Dhaka');
@endphp
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">

            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel_header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                    <span>Select Criteria For Current day Attendance By Date</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="att_box">
                                    <div class="att_box_left">
                                        <img src="{{ asset('public/images/staff/'.$staff->image) }}" alt="">
                                    </div>
                                    <div class="att_box_right mt-2">

                                        <span><b>Name:</b> {{$staff->name}}</span>
                                        <br>
                                        <span><b>Email:</b> {{$staff->email}}</span>
                                        <br>

                                        @if(isset($staff->phone))
                                            <span><b>Phone:</b> {{$staff->phone}}</span>
                                        @endif
                                        <br>

                                    </div>
                                    <div class="clear"></div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="search_date">
                                    <form>
                                        <div class="form-group">

                                            <input type="date" class="form-control">
                                            <Span> <button>Search</button></Span>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="dt_head">
                                    <h4>date:</h4>
                                </div>
                                <div class="dt_table">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Month</th>
                                                <th scope="col">01</th>
                                                <th scope="col">02</th>
                                                <th scope="col">03</th>
                                                <th scope="col">04</th>
                                                <th scope="col">05</th>
                                                <th scope="col">06</th>
                                                <th scope="col">07</th>
                                                <th scope="col">08</th>
                                                <th scope="col">09</th>
                                                <th scope="col">10</th>
                                                <th scope="col">11</th>
                                                <th scope="col">12</th>
                                                <th scope="col">13</th>
                                                <th scope="col">14</th>
                                                <th scope="col">15</th>
                                                <th scope="col">16</th>
                                                <th scope="col">17</th>
                                                <th scope="col">18</th>
                                                <th scope="col">19</th>
                                                <th scope="col">20</th>
                                                <th scope="col">21</th>
                                                <th scope="col">22</th>
                                                <th scope="col">23</th>
                                                <th scope="col">24</th>
                                                <th scope="col">25</th>
                                                <th scope="col">26</th>
                                                <th scope="col">27</th>
                                                <th scope="col">28</th>
                                                <th scope="col">29</th>
                                                <th scope="col">30</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @php
                                                $nov =App\Attendance::where('staff_id',$id)->where('year',$year)->where('month','November')->get();
                                                @endphp
                                                <th scope="row">November</th>
                                                @foreach($nov as $row)
                                          
                                                @if($row->day ==10)
                                                <td>{{ucfirst($row->attendance)}}</td>
                                                @else
                                                <td>Null</td>
                                                @endif

                                                @endforeach

                                            </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <style>
                            .att_box_left {
                                float: left;
                            }

                            .att_box_right {
                                float: left;
                            }

                            .att_box_right {
                                margin-left: 10px;
                            }

                            .att_box_left img {
                                width: 100px;
                                height: 100px;
                                border-radius: 5px;
                            }

                            .clear {
                                clear: both;
                            }

                            .search_date input.form-control {
                                width: 80%;
                                position: relative;
                            }

                            .search_date span {
                                position: absolute;
                                right: 10%;
                                top: 1%;
                            }

                            .search_date button {
                                border-style: none;
                                background-color: #26abe2;
                                color: #fff;
                                line-height: 35px;
                                padding: 0px 10px;
                            }

                            .dt_head h4 {
                                font-size: 22px;
                                text-transform: capitalize;
                                font-weight: 600;
                            }

                            .table>thead>tr>th,
                            .table>tbody>tr>th,
                            .table>tfoot>tr>th,
                            .table>thead>tr>td,
                            .table>tbody>tr>td,
                            .table>tfoot>tr>td {
                                padding: 6px !important;
                                border-top: 1px solid #e4e5e7;
                                vertical-align: middle;
                                font-size: 11px !important;
                            }
                            .content_wrapper .middle_content_wrapper{
                                padding: 0px;
                            }
                        </style>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection