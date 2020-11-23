@extends('layouts.website')

@section('content')

<section id="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="banner_slider owl-carousel owl-theme">
                        @foreach($slider as $ban)
                        <div class="item3">
                            <div class="carousel_img">
                                <img src="{{asset('public/images/slider/'.$ban->image)}}" class="lazy" alt="banner-image">
                            </div>
                            <div class="carousel_content">
                                <div class="carousel_cont_head">
                                    <h3>{{$ban->heading}}</h3>
                                </div>
                                <div class="carousel_content_para">
                                    <p>{!! $ban->paragraph !!}</p>
                                </div>
                                <div class="banner_link">
                                    <a href="{{$ban->link}}">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!--- banner part end -->
 <!--- about part start -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="ab_head wow animate__animated animate__fadeIn">
                        <h3>Welcome to <span>Durbar It Limited</span>:<br>Always Ready To Help</h3>
                        <p>{!! $aboutus->details !!}
                        </p>
                        <div class="ab_link">
                            <a href="{{url('/about-us')}}">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="ab_image">
                        <img src="{{asset('public/frontend')}}/images/about.png" class="w-100" alt="no-image" style="width: 430px !important;">
                    </div>

                </div>
            </div>

        </div>

    </section>
<!--- about part end -->

    <!--- service part start -->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="service_header wow animate__animated animate__zoomIn animate__delay-0.6s">
                            <h4>Our Services</h4>
                            <div class="title_border">
                                <span></span>
                            </div>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC</p>
                    </div>
                </div>
            </div>


            <div class="row wow animate__animated animate__fadeIn animate__delay-1s">
                <div class="col-sm-12 m-0">
                    <div class="tab_list_part">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach($services as $key => $serv)
                            <li class="nav-item" style="margin-bottom: 20px;">
                                <a @if($key==0) class="nav-link active" @else class="nav-link" @endif id="pills-home-tab" data-toggle="pill" href="#pills-content{{++$key}}"
                                    role="tab" aria-selected="true">
                                    <img src="{{asset('public/images/services/'.$serv->image)}}" alt="image" style="width: 100px;height: auto;">
                                    <div class="log_name">
                                    {{$serv->name}}
                                    </div>
                                </a>
                            </li>
                        @endforeach



                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="tab-content" id="pills-tabContent">

                    @foreach($services as $key => $serv)
                        <div @if($key==0)  class="tab-pane fade show active" @else class="tab-pane fade show" @endif id="pills-content{{++$key}}" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel_content text-center">
                                        <img src="{{asset('public/images/services/'.$serv->image)}}" style="width: 200px;height: auto;"
                                            alt="image">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="panel_descrip">
                                        <h4>{{$serv->name}}</h4>
                                        <ul>
                                        @foreach(explode(',', $serv->details) as $letter)
                                            <li class="sub_panel"><i class="fas fa-check"></i>{{$letter}}</li>
                                        @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="tab-pane fade" id="pills-content9" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel_content text-center">
                                        <img src="{{asset('public/frontend')}}/images/Software-Development-.png" style="width: 200px;height: auto;"
                                            alt="image">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="panel_descrip">
                                        <h4>Software Development</h4>
                                        <ul>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                            <li class="sub_panel"><i class="fas fa-check"></i>Lorem, ipsum dolor.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--- service part end -->
    <!--- Strength part start -->
    <section id="strength">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="strength_main wow animate__animated animate__zoomIn animate__delay-0.6s">
                        <h3>our strength</h3>
                        <p>We have a profoundly talented group of specialists who are experts in visual image altering
                            sector. This enables us to give a wide range of image handling administrations everywhere
                            throughout the world.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <div class="content_strength">
                                <span><i class="fas fa-user"></i></span>
                                <h6>150 skilled</h6>
                                <p>Graphic Designers</p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="content_strength">
                                <span><i class="fas fa-clock"></i></span>
                                <h6>24/7-365</h6>
                                <p>Client Support</p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="content_strength">
                                <span><i class="fas fa-images"></i></span>
                                <h6>3000+ </h6>
                                <p>Processing Per Day</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-4 text-center">
                            <div class="content_strength">
                                <span><i class="fas fa-wifi"></i></span>
                                <h6>High Speed</h6>
                                <p>Internet Connection</p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="content_strength">
                                <span><i class="fas fa-users"></i></span>
                                <h6>Three Shifts</h6>
                                <p>Duty Plan</p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="content_strength">
                                <span><i class="fas fa-dollar-sign"></i></span>
                                <h6>Guarantee</h6>
                                <p>Your Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="choose_us wow animate__animated animate__zoomIn animate__delay-0.6s">
                        <h3>why choose us?</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta ratione rerum recusandae
                            amet a unde reiciendis ipsa porro, dolorum qui aperiam odio illum aspernatur. Deserunt culpa
                            quidem fugiat sit? dolorum qui aperiam odio illum aspernatur. Deserunt culpa
                            quidem fugiat sit?</p>
                    </div>
                    <div id="accordion">
                        @foreach($whyschochus as $key => $choics)
                        <div class="card">
                            <div class="card-header str_card" id="headingOne{{$key}}">
                                <a href="#" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true"
                                    aria-controls="collapseOne" class=""> {{$choics->title}}
                                </a>
                            </div>
                            <div id="collapseOne{{$key}}" @if($key==0) class="collapse show" @else class="collapse"@endif aria-labelledby="headingOne{{$key}}"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <p>{{$choics->details}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- <div class="card">
                            <div class="card-header str_card" id="headingTwo">
                                <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo" class="collapsed">VIP Client Service</a>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"
                                style="">
                                <div class="card-body">
                                    <p>Every one of the customers are supreme to us. We consider everybody customer as a
                                        VIP members. In this way, be prepared to be modest by our additional normal
                                        customer administration.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header str_card" id="headingThree">
                                <a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree" class="collapsed">Satisfaction ensuring
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <p>We guaranteed that we will make your desire level high and make you feel to
                                        return again to us for getting best.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header str_card" id="headingfour">
                                <a href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false"
                                    aria-controls="collapsefour" class="collapsed"> Best Price Rate
                                </a>
                            </div>
                            <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <p>Investigate the market and become more acquainted with the best evaluating. We
                                        are certain that we are giving you the focused cost. Have an arrangement and get
                                        the best. </p>
                                </div>
                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--- Strength part end -->
     <!-- start video part -->
    <section id="video_section">
        <div class="continer">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video_section_content text-center">
                        <h3 class="wow animate__animated animate__zoomIn animate__delay-0.6s">Our Work Process Video</h3>
                        <p>{{$video->title}} </p>
                        <a class="js-modal-btn" data-video-id="{{$video->link}}"> <i class="fas fa-play"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--- project part start -->
    <section id="work">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="service_header wow animate__animated animate__zoomIn animate__delay-0.6s">
                        <h4>Our Project</h4>
                        <div class="title_border">
                            <span></span>
                        </div>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC</p>
                    </div>
                </div>
            </div>
      <div class="row">
                <div class="col-sm-12 text-center">
                    <!-- Main area start -->
                    <div class="portfolio-area">

                        <div class="controls">

                            <button type="button" data-filter="all">All</button>
                            @foreach($categores as $row)
                                <button type="button" data-filter=".category{{$row->id}}">{{$row->name}}</button>
                            @endforeach
                        </div>



                        <div class="portfolio-item">


                            @foreach($projects as $row)

                            <div class="single-item mix category{{$row->cat_id}}">
                                <div class="img-thumbnail">
                                    <img src="{{asset('public/uploads/product/'.$row->product->image)}}" alt="image" class="w-100" width="100%">
                                </div>
                                <div class="img-content">
                                    <h2>{{$row->title}}</h2>
                                   <a href="{{url('/product/details/'.$row->product_id)}}">Live Now</a>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>



            </div>

    </section>
    <!--- project part end -->

       <!--- client part start -->
    <section id="client">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="service_header wow animate__animated animate__zoomIn animate__delay-0.6s">
                        <h4>What our client are saying</h4>
                        <div class="title_border">
                            <span></span>
                        </div>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC</p>
                    </div>
                </div>
            </div>

            <div class="testimonial_container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="testimonial_slider owl-carousel owl-theme">
                            @foreach($teatimonial as $test)
                            <div class="testimonial_slider_item">
                                <div class="testimonial_slider_content_text">
                                    <p>{!!$test->review!!} </p>
                                    <div class="qoute_btn">
                                        <span>
                                            <i class="fas fa-quote-left"></i>
                                        </span>
                                    </div>

                                </div>
                                <div class="testmonial_slide_content_clint">
                                    <div class="testimonial_img">
                                        <img class="img-fluid" src="{{asset('public/images/client/'.$test->image)}}" alt="{{$test->name}}"
                                            style="width:90px;height: auto;border-radius: 50%;">
                                    </div>
                                    <div class="testimonial_cont">
                                        <h4>{{$test->name}}</h4>
                                        <p>{{$test->designation}}</p>
                                        <h5>{{$test->company}}</h5>
                                    </div>
                                </div>

                            </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="testimonial_image">
                            <img src="{{asset('public/frontend')}}/images/testmonial.png" class="w-100" alt="">
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
    color: #000;
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
</style>
    </section>
@endsection

