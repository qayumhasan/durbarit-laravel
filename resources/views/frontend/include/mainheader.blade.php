
    <section id="main_menu_section" class="navbar_header">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 ">
                    <div class="main_nav">
                        <style>
                            .main_logo img{
                                width: 200px !important;
                                height: 60px !important;
                            }
                        </style>
                        <div class="main_logo  wow animate__animated animate__fadeIn">
                            <a href="{{url('/')}}">
                                <img src="{{asset('public/images/logo/'.$logo->lazyloader )}}" data-src="{{asset('public/images/logo/'.$logo->flogo)}}" class="lazy" alt="logo-image">
                            </a>
                        </div>
                        <div class="main_menu">
                            <nav class="main_menu_list">
                                <ul>
                                    <li class="active">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="#service">Services</a>
                                        <div class="drop_menu">
                                            <ul>
                                            @foreach($service as $serv)
                                                <li><a href="{{url('service/'.$serv->id)}}"><i class="fas fa-circle"></i>{{$serv->name}}</a></li>
                                            @endforeach

                                            </ul>
                                        </div>

                                    </li>
                                    <li>
                                        <a href="#work">Portfolio</a>
                                    </li>

                                    <!-- <li class="active"><a href="#">Mega Menu</a>
                                        <div class="mega_menu">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mega_list">
                                                        <ul>

                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mega_list">
                                                        <ul>

                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col2</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mega_list">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col3 </a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col3 </a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col3 </a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col3 </a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-circle"></i> mega col3 </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </li> -->
                                    <li>
                                        <a href="{{url('/team')}}">Our Team</a>
                                    </li>
                                     <li>
                                        <a href="{{url('/product')}}">Products</a>
                                    </li>
                                      <li>
                                        <a href="{{url('/carrer')}}">Career</a>
                                    </li>

                                    <li>
                                        <a href="{{url('/contact')}}">Contact Us</a>
                                    </li>
                                  
                                    <li>
                                        <a href="{{route('product.cart.page')}}"><i class="fas fa-cart-arrow-down"></i><span id="cartdatacount" data-totalitems="0">@if($cart >0){{$cart}}@endif</span></a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--- mobile menu part -->
    <section id="main_mobile" class="mob_navbar_header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="mobile_menu_logo">
                        <a href="{{url('/')}}">
                             <img class="lazy img-fluid" src="{{asset('public/images/logo/'.$logo->lazyloader )}}" data-src="{{asset('public/images/logo/'.$logo->flogo)}}"  alt="logo-image">

                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mobile_menu_button text-right">
                        <button class="openbtn"><i class="fas fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn">&times;</a>
        <div class="mobile_menu_content">
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>

                <!-- <li><a href="#">Price</a></li>
                <li>
                    <a data-toggle="collapse" href="#collapseExample2" role="button">About Company</a>
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body mobile_sub_menu">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Pricelist</a></li>
                                <li><a href="#">Why Choose Us</a></li>
                                <li><a href="#">Work Sample</a></li>

                            </ul>
                        </div>
                    </div>
                </li> -->
                <!-- <li><a href="#">Blog</a></li> -->
                <li> <a href="{{url('/team')}}">Our Team</a> </li>
                <li><a href="{{url('/product')}}">Products</a></li>
                 <li> <a href="{{url('/carrer')}}">Career</a> </li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
                <!-- <li><a href="trial.html" class="submenu_btn_link">Free Trial</a></li> -->
                @php
                    $user = Auth::user();
                @endphp
                @if($user)
                <li><a href="{{route('customar.dashboard')}}"><i class="fas fa-user"></i> Account</a></li>
                @else
                <li><a href="{{url('/customer/login')}}"><i class="fas fa-user"></i> Login</a></li>
                <li><a href="{{url('/customer/login')}}"><i class="fas fa-sign-in-alt"></i> Sign Up</a></li>
                @endif
            </ul>
        </div>
    </section>
