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
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Enter Verification Code</label>
                        <input  id="tab-" type="radio" name="tab" class="sign-up d-none"><label for="tab-2" class="tab"></label>
                        <div class="login-form">
                            <form action="{{route('customar.verify')}}" method="post">
                                @csrf
                            <div class="sign-in-htm">
                                <div class="group">
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <input  type="text" name="verify" class="input">
                                    @error('verify')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="group">
                                    <!-- <input type="submit" class="button" value="Sign In"> -->
                                    <button type="submit" class="button">Verify</button>
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