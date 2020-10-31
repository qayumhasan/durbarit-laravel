<header id="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text-right">
                    <div class="header_top_info wow animate__animated animate__fadeIn animate__delay-0.7s">
                        <ul>
                            <li><a href="#"><i class="fas fa-envelope"></i> {{$contactinfo->email}}</a></li>
                            <li><a href="#"><i class="fas fa-phone-volume"></i> {{$contactinfo->phone}} </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 text-right">
                    <div class="auth_button wow animate__animated animate__fadeIn animate__delay-0.7s">
                        @php
                            $user = Auth::user();
                        @endphp
                        @if($user)
                        <ul>

                              <li><a href="{{route('customar.dashboard')}}"><i class="fas fa-sign-in-alt"></i> <span>Account</span></a></li>
                            <!--<li><a href="auth_page.html">Login </a></li>-->
                        </ul>
                        @else
                        <ul>

                              <li><a href="{{url('/customer/login')}}"><i class="fas fa-sign-in-alt"></i> <span>Login</span></a></li>
                               <li><a href="{{url('/customer/login')}}"><i class="fas fa-user-plus"></i> <span>Register</span></a></li>
                            <!--<li><a href="auth_page.html">Login </a></li>-->
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header id="header_top_mob" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header_top_info">
                        
                        <ul>
                            <li><a href="#"><i class="fas fa-envelope"></i>{{$contactinfo->email}}</a></li>
                            <li><a href="#"><i class="fas fa-phone-volume"></i> {{$contactinfo->phone}} </a></li>
                        </ul>
                    </div>
                </div>
                <!--<div class="col-sm-5 text-right">-->
                <!--    <div class="auth_button">-->
                <!--        <ul>-->
                <!--            <li><a href="auth_page.html">Login</a></li>-->
                <!--            <li><a href="auth_page.html">Register </a></li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </header>