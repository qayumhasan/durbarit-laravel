@extends('layouts.website')
@section('content')
<section id="career">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="career_header">
                        <h3>Career</h3>
                        <span class="triangle_career"></span>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <div id="career_post">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="para_career wow animate__animated animate__fadeIn animate__delay-0.7s text-center ">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply
                            random text. It has roots in a piece of
                            classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply
                            random text. It has roots in a piece of
                            classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply
                            random text. It has roots in a piece of
                            classical Latin literature from 45 BC</p>
                    </div>
                    <div class="job_list wow animate__animated animate__fadeIn animate__delay-0.7s">
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
    </div>
    <!--- career part end -->
@endsection