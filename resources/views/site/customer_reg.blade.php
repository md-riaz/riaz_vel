@extends('layouts.site_master')
@section('site_title')
    Account Registration
@endsection
@section('content')
    <x-breadcump title="Account" info="Register"/>
    <!-- Register-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    @if($errors->all())
                        @foreach( $errors->all() as $err)
                            <div class="alert alert-danger">{{$err}}</div>
                        @endforeach
                    @endif

                    <div class="account-form form-style">
                        <form action="{{url('customer/register')}}" method="post">
                            @csrf
                            <p>Full Name *</p>
                            <input type="text" name="name" value="{{old('name')}}" required>
                            <p>Email Address *</p>
                            <input type="email" name="email" value="{{old('email')}}" required>
                            <p>Password *</p>
                            <input type="Password" name="password" required>
                            <p>Confirm Password *</p>
                            <input type="Password" name="password_confirmation" required>
                            <button type="submit">Register</button>
                        </form>
                        <div class="text-center">
                            <a href="{{url('login')}}">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register-area end -->
@endsection
