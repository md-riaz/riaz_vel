@extends('layouts.master')

@section('body')
<!-- Container-fluid starts -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <!-- Authentication card start -->
            <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center">
                    <img src="{{asset('dashboard_assets\assets\images\logo-blue.png')}}" alt="logo.png">
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center txt-primary">Sign In</h3>
                            </div>
                        </div>
                        <div class="row m-b-20">
                            <div class="col-md-6">
                                <button class="btn btn-facebook m-b-20 btn-block"><i
                                        class="icofont icofont-social-facebook"></i>facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-twitter m-b-20 btn-block"><i
                                        class="icofont icofont-social-twitter"></i>twitter</button>
                            </div>
                        </div>
                        <p class="text-muted text-center p-b-5">Sign in with your regular account</p>
                        <div class="form-group form-primary">
                            <label for="email" >E-Mail Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group form-primary">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                            <span class="form-bar"></span>
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-12">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                        <span class="cr"><i
                                                class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Remember me</span>
                                    </label>
                                </div>
                                <div class="forgot-phone text-right f-right">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-right f-w-600"> Forgot Password?</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                              
                            </div>
                        </div>
                        <p class="text-inverse text-left">Don't have an account?<a href="{{url('')}}"> <b
                                    class="f-w-600">Register here </b></a>for free!</p>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
        <!-- Authentication card end -->
    </div>
    <!-- end of col-sm-12 -->
</div>
<!-- end of row -->

<!-- end of container-fluid -->





@endsection