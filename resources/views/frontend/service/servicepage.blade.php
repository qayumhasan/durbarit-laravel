@extends('layouts.website')
@section('content')
<style>
    .main_box_logo img {
        width: 50px;

    }

    .main_box_logo {
        border: 1px solid #cacaca;
        width: 80px;
        line-height: 80px;
        height: 80px;
        text-align: center;
        border-radius: 50%;
    }

    .cal {
        color: #000;
    }

    .pri span {
        background-color: #26abe2;
        display: inline-block;
        /* text-align: right; */
        color: #fff;
        padding: 10px;
        font-weight: 600;
    }

    .main_box {
        background-color: #fff;
        padding: 30px;

        box-shadow: -2px 12px 14px -7px rgba(149, 149, 149, 0.75);
        -webkit-box-shadow: -2px 12px 14px -7px rgba(148, 148, 148, 0.75);
        -moz-box-shadow: -2px 12px 14px -7px rgba(148, 148, 148, 0.75);
    }

    .main_cont h4 {
        font-size: 18px;
        margin-top: 25px;
        color: #000;
    }

    .main_cont {
        margin-bottom: 30px;
    }

    .main_cont p {
        font-size: 14px;
        color: #000;
    }

    .main_time h5 {
        font-size: 14px;
        text-transform: capitalize;
        color: #fff;
        font-weight: 600;
        background-color: #26abe2;
        display: inline-block;
        padding: 8px 22px;
        border-radius: 4px;
    }

    .pri span {
        background-color: #26abe2;
        display: inline-block;
        /* text-align: right; */
        color: #fff;
        padding: 15px;
        font-weight: 600;
        border-radius: 5px;
        position: relative;
        top: 8px;
        left: 35px;
    }

    .edit_b {
        background-color: #26abe2;
        padding: 7px 10px;
        color: #fff;
    }

    .edit_b a {
        text-decoration: none;
        color: #fff;
        display: block;
        cursor: pointer;
    }

    .delete_b {
        background-color: #dc3545;
        padding: 7px 10px;
        color: #fff;
        
    }

    .delete_b a {
        text-decoration: none;
        color: #fff;
        display: block;
        cursor: pointer;
    }
    .service_img{
        position: relative;
    }
    .service_img::after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(120deg, #eaee44, #33d0ff);
        opacity: .5;
    }
    .price_area{
        position: absolute;
        background-color: #26abe2;
        display: inline-block;
        /* text-align: right; */
        color: #fff;
        padding: 7px;
        font-weight: 600;
        border-radius: 5px;
        bottom: 10%;
        right: 10%;
        
        
    }

    @media (max-width: 575.98px) {

        .pl-0,
        .px-0 {
            padding-left: 15px !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 15px !important;
        }

        .pri span {

            position: relative;
            top: 8px;
            left: -131px !important;
        }
    }


    @media (min-width: 576px) and (max-width: 767.98px) {}

    @media (min-width: 768px) and (max-width: 991.98px) {}

    @media (min-width: 992px) and (max-width: 1199.98px) {}
</style>
<section id="career">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="service_header">

                    <h4>grhgfds</h4>
                    <div class="title_border">
                        <span></span>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<div id="career_post">
    <div class="container">

    @if(count($services) > 0)
        <div class="row">
            
        @foreach($services as $row)
            <div class="col-sm-4 mb-4">
                <div class="main_box">
                    <div class="row p-0">
                      
                        <div class="col-sm-12 p-0">
                            <div class="service_img">
                                <img src="{{asset('public/images/invoice_image/')}}/{{$row->image}}" alt="" class="w-100"/>
                            </div>
                            <div class="price_area">
                                <span>$ {{$row->price}}</span>
                            </div>
                        </div>

                    </div>
                    <div class="main_cont">
                        <h4>{{$row->name}}</h4>
                        <p>{{Str::limit($row->details,35,'...')}} </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="main_time">
                                <h5>In time </h5>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="cal">
                                <i class="far fa-calendar-alt"></i> <span>{{$row->end_date}}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="button_ed">
                    <div class="row">
                        <div class="col-sm-6 pr-0 text-center">
                            <div class="edit_b">
                            <form id="option-choice-form">
                                    <input type="hidden" name="product_id" value="{{$row->id}}"/>
                                    <input type="hidden" name="product_type" value="3"/>
                                    <input type="hidden" id="package_id" name="package_id" value="3"/>

                                <a id="addtocart">Add To Cart</a>
                            </form>
                            </div>
                        </div>
                        <div class="col-sm-6 pl-0 text-center">
                            <div class="delete_b">
                                <a>Add To Collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            
        </div>
        @else
        <div class="row">
            <p>No Service Available!</p>
        </div>
        @endif


        <style>
            .service_header h4 {
                font-size: 28px;
                position: relative;
                font-weight: 600;
                color: #fff;
                text-transform: uppercase;
                padding-bottom: 2px;
            }

            .title_border {
                position: absolute;
                width: 154px;
                margin: 0 auto;
                height: 15px;
                left: 50%;
                -webkit-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                transform: translateX(-50%);
            }

            .title_border::before {
                content: "";
                position: absolute;
                bottom: 0;
                width: 62px;
                left: 0;
                height: 1px;
                background-color: #26abe2;
            }

            .title_border::after {
                content: "";
                position: absolute;
                top: 0;
                width: 63px;
                right: 0;
                height: 1px;
                background-color: #26abe2;
            }

            .title_border span::before {
                content: '';
                position: absolute;
                /* right: 0px; */
                left: 61px;
                top: 0px;
                width: 0;
                height: 0;
                border-left: 8px solid transparent;
                border-right: 8px solid transparent;
                border-bottom: 15px solid #26abe2;
            }

            .title_border span::after {
                position: absolute;
                content: "";
                top: 0;
                right: 62px;
                width: 0;
                height: 0;
                border-left: 8px solid transparent;
                border-right: 8px solid transparent;
                border-top: 16px solid #26abe2;
            }

            .serv_content h3 {
                text-align: left;
                font-size: 26px;
                text-transform: capitalize;
                margin-bottom: 30px;
                font-weight: 600;

            }

            .serv_content ul li {
                list-style: none;
                margin-bottom: 10px;
                font-size: 14px;
                text-align: left;
            }

            li.sub_panel_cont i {
                margin-right: 10px;
                color: #f1f1f1;
                background-color: #26abe2;
                padding: 2px;
            }
        </style>
    </div>
</div>
<!--- career part end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

        $(document).ready(function() {

            $('#addtocart').on('click', function() {
                
                
                
                

                $.ajax({
                    type: 'GET',
                    url: "{{ route('service.product.add.cart') }}",
                    data: $('#option-choice-form').serializeArray(),

                    success: function(data) {

                        toastr.success(data.data);
                        const cart = document.querySelector('#cart');
                        cart.dataset.totalitems=data.count;
                        document.getElementById('cartdatacount').innerHTML = data.count;
                    }
                });
            });
        });
</script>
@endsection