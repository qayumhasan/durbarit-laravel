@extends('layouts.website')
@section('title', 'Carrer | '.$seo->meta_title)
@section('content')
<section id="career">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="service_header">
                        <h4>Build Your Career</h4>
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
                <div class="col-sm-12">
                    <div class="para_career wow animate__animated animate__zoomIn animate__delay-0.6s">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply
                            random text. It has roots in a piece of
                            classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply
                            random text. It has roots in a piece of
                            classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply
                            random text. It has roots in a piece of
                            classical Latin literature from 45 BC</p>
                    </div>
                    <div class="job_list wow animate__animated animate__zoomIn animate__delay-0.7s">
                        <table class="table table-striped">

                            <tbody>


                                @foreach($carrer as $care)
                                <tr>

                                    <td>
                                        <div class="list_left">
                                            <ul>
                                                <li><span class="job_badge">S</span><span
                                                        style="margin-left:10px;">{{$care->subject}}</span></li>
                                                <li><span class="job">{{$care->designation}}
                                                    </span><span><a href="{{$care->link}}" class="badge badge-primary">Open</a></span>
                                                </li>
                                                <li><span class="type">Job Type: {{$care->jobtype}}</span></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="apply_btn">
                                            <a href="{{url('/carrer/apply/'.$care->id)}}">apply now</a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .para_career{
                text-align: center;
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
    <!--- career part end -->
@endsection
