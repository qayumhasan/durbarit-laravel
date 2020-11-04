@extends('layouts.website')
@section('content')
<section id="career">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="service_header">

                        <h4>{{$serviclle->name}}</h4>
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

            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="para_career wow animate__animated animate__zoomIn animate__delay-0.7s">
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="serv_content">
                                <h3>Software Development</h3>
                                <ul>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>

                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                    <li class="sub_panel_cont"><i class="fas fa-check"></i>Lorem ipsum dolor sit amet consectetur</li>
                                </ul>
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="serv_img">
                                    <img src="{{asset('public/frontend')}}/images/about.png" class="w-100" alt="no-image" style="width: 430px !important;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
                            top:0px;
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
                    .serv_content h3{
                        text-align: left;
                        font-size: 26px;
                        text-transform: capitalize;
                        margin-bottom:30px;
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
@endsection
