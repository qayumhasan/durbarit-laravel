@extends('layouts.website')
@section('content')
    <!--- team part start -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="service_header">
                        <h4>Our Team</h4>
                        <div class="title_border">
                            <span></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="team_member_sec">
        <div class="container wow animate__animated animate__fadeIn animate__delay-0.9s">
            <div class="row">
            @foreach($team as $allteam)
                <div class="col-sm-4">
                    <div class="staff-member my-lg-3 my-md-3 my-sm-0">
                        <div class="card gray-light-bg text-center border-0 ">
                            <img src="{{asset('public/images/team/'.$allteam->image)}}" alt="team image" class="card-img-top w-100" style="height:320px;">
                            <div class="card-body">
                                <h5 class="teacher mb-0">{{$allteam->name}}</h5>
                                <span>{{$allteam->designation}}</span>
                                <ul class="list-inline pt-2 social">
                                    <li class="list-inline-item"><a href="{{$allteam->facebook}}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$allteam->twitter}}" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$allteam->linkedin}}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"{{$allteam->details}}" </p><a href="#" class="teacher-name">
                                    <h5 class="mb-0 teacher text-white">{{$allteam->name}}</h5>
                                </a>
                                <span class="teacher-field text-white">{{$allteam->designation}}</span>
                                <ul class="list-inline py-4 social">
                                    <li class="list-inline-item"><a href="{{$allteam->facebook}}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$allteam->twitter}}" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$allteam->linkedin}}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




              <style>
                  .staff-member .overlay ul.social a {
                    margin: 0 5px;
                    width: 35px;
                    height: 35px;
                    line-height: 35px;
                    background: #000000;
                    text-align: center;
                    border-radius: 5px;
                    display: block;
                    transition: 0.6s linear;
                }
                a:hover {
                    color: #26abe2;
                    text-decoration: underline;
                }
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
             </style>

            </div>
        </div>

    </section>
    <!--- team part end -->


@endsection
