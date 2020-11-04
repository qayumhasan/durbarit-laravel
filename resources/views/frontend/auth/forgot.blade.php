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
                <div class="login-wrap" style="min-height: 400px;">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Enter New Password</label>
                        <input  id="tab-" type="radio" name="tab" class="sign-up d-none"><label for="tab-2" class="tab"></label>
                        <div class="login-form">
                            <form action="{{route('customar.forgot.password.submit')}}" method="post">
                                @csrf
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="pass" class="label">New Password</label>
                                    <input  type="hidden" name="code" class="input" value="{{$code}}" required>
                                    <input  type="hidden" name="token" class="input" value="{{$token}}" required>
                                    <input  type="password" name="password" class="input" required>
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label for="pass" class="label">Repeat Password</label>
                                    <input  type="password" class="input" name="password_confirmation" data-type="password">
                                </div>
                                <div class="group">
                                    <!-- <input type="submit" class="button" value="Sign In"> -->
                                    <button type="submit" class="button">Submit</button>
                                </div>
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