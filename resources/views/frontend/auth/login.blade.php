@extends('layouts.website')
@section('content')

    <!--- team part start -->
    <section id="authpage">
     <div class="container">

         <div class="row">
         @if(Session::has('successMsg'))
            <p class="alert alert-info">{{ Session::get('successMsg') }}</p>
        @endif
             <div class="col-sm-12 wow animate__animated animate__fadeIn animate__delay-1s">
                <div class="login-wrap">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                        <div class="login-form">
                            <form action="{{route('customar.login')}}" method="post">
                                @csrf
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="user" class="label">Email</label>
                                    <input  type="text" name="email" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input type="password" name="password" class="input">
                                </div>
                                <div class="group">
                                    <input id="check" type="checkbox" class="check" checked>
                                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                                </div>
                                <div class="group">
                                    <!-- <input type="submit" class="button" value="Sign In"> -->
                                    <button type="submit" class="button">Sign In</button>
                                </div>
                                <div class="hr"></div>
                                <div class="foot-lnk">
                                    <a href="#forgot">Forgot Password?</a>
                                </div>
                            </div>
                            </form>
                            <div class="sign-up-htm">
                                <div class="group">
                                    <label for="user" class="label">Username</label>
                                    <input  type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input  type="password" class="input" data-type="password">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Repeat Password</label>
                                    <input  type="password" class="input" data-type="password">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Email Address</label>
                                    <input  type="email" class="input">
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign Up">
                                </div>
                                <!--<div class="hr"></div>-->
                                <!--<div class="foot-lnk">-->
                                <!--    <label for="tab-1">Already Member?</a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>
 </section>
@endsection