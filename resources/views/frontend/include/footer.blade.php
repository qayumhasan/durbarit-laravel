<section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="slider_icon">
                        <div class="icon_slider owl-carousel  owl-theme">
                        @foreach($partner as $part)
                            <div class="item">
                                <div class="carousel_img_icon">
                                    <img src="{{asset('public/images/partner/'.$part->image)}}" alt="icon image">
                                </div>
                            </div>
                        @endforeach
                       
                        </div>
                    </div>
                </div>

            </div>
            <div class="row footer_logo_container wow animate__animated animate__fadeInDown animate__delay-1s">
                <div class="col-sm-4">
                    <div class="footer_about">

                        <div class="footer_logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('public/images/logo/'.$logo->lazyloader )}}" data-src="{{asset('public/images/logo/'.$logo->flogo)}}" class="lazy w-100" alt="no-logo"
                                    style="width:250px !important; height: auto;">
                            </a>
                            <p>{{$contactinfo->description}}</p>
                            <div class="social_icon">
                                <ul>
                                    <li><a href="{{$social->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$social->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{$social->linkend}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{$social->google}}"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="{{$social->feed}}"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="support_footer">
                                <h5>Pages</h5>
                                <ul>
                                @foreach($allpage as $page)
                                    <li><a href="{{url('/page/'.$page->id)}}">- {{$page->title}}</a></li>
                                @endforeach
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="support_footer">
                                <h5>Services</h5>
                                <ul>
                                    @foreach($service as $serv)
                                    <li><a href="{{url('service/'.$serv->id)}}">- {{$serv->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="support_footer">
                                <h5>Newsletter</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <div class="email_form">
                                <form action="{{url('subscriber/website')}}" method="post">
                                    @csrf
                                    <!-- <div class="input-group mb-2 mr-sm-2">
                                        <input type="email" name="email" class="form-control" id="inlineFormInputGroupUsername2" placeholder="email" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><button type="submit"><i class="fas fa-envelope"></i></button></div>
                                        </div>
                                    </div> -->
                                    <div class="input-group mb-2 mr-sm-2">
    
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
    <span class="em_bt"><button type="submit"><i class="fas fa-envelope"></i></button></span>
  </div>
                                </form>
                             <style>
                               span.em_bt button {
    background-color: #26abe2;
    color: #000000;
    width: 35px;
    height: 33px;
    border-style: none;
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
}
                           span.em_bt {
    background-color: #26abe2;
    border: 1px solid #26abe2;
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
}
                             </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!--- footer down part-->
    <section id="footer_down">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center p-0">
                    <div class="copyright_content">
                        <p>Copyright © 2020 Durbar IT. All rights reserved.Made by <a href="#"
                                style="color:#26abe2;text-decoration: none;">Durbar It</a></p>
                        <div class="top_Arrow">
                            <a href="#"><i class="fas fa-arrow-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>