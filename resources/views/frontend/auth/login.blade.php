@extends('layouts.website')
@section('title', 'Login & Registation | '.$seo->meta_title)
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
                                    <a href="{{route('customar.forgot.phone')}}">Forgot Password?</a>
                                </div>
                            </div>
                            </form>
                            <form action="{{route('customar.register')}}" method="post">
                                @csrf
                            <div class="sign-up-htm">
                                <div class="group">
                                    <label for="user" class="label">Username</label>
                                    <input  type="text" name="name" value="{{old('name')}}" class="input">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Email Address</label>
                                    <input  type="email" name="email" value="{{old('email')}}" class="input">
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Mobile</label>
                                    <input  type="phone" name="phone" value="{{old('phone')}}" class="input">
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input  type="password" class="input" name="password" data-type="password">
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Repeat Password</label>
                                    <input  type="password" class="input" name="password_confirmation" data-type="password">
                                </div>
                                
                                <div class="group">
                                    <input type="submit" class="button" value="Sign Up">
                                </div>
                                <!--<div class="hr"></div>-->
                                <!--<div class="foot-lnk">-->
                                <!--    <label for="tab-1">Already Member?</a>-->
                                <!--</div>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>
 </section>
@endsection