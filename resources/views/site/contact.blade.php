@extends('layouts.site_master')
@section('site_title')
    Contact
@endsection

@section('content')
    <x-breadcump title="Contact us" info="contact"/>
    <!-- contact-area start -->
    <div class="google-map">
        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671"
                allowfullscreen></iframe>
        </div>
    </div>
    <style>
        input.is-invalid,
        textarea.is-invalid {
            border: 1px solid red;
        }
    </style>
    <div class="contact-area ptb-100" id="cmsg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="contact-form form-style">
                        @if(session('msg'))
                            <div class="alert alert-success mb-30">{{session('msg')}}</div>
                        @endif

                        <form action="{{url('contact/post')}}" method="post" id="cf">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" placeholder="Name" id="fname" name="name"
                                           class="{{$errors->has('name') ? 'is-invalid' : ''}} ">
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger mb-30">{{$errors->first('name')}}</div>
                                    @endif
                                </div>
                                <div class="col-12  col-sm-6">
                                    <input type="text" placeholder="Email" id="email" name="email"
                                           class="{{$errors->has('email') ? 'is-invalid' : ''}} ">
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger mb-30">{{$errors->first('email')}}</div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <input type="text" placeholder="Subject" id="subject" name="subject"
                                           class="{{$errors->has('subject') ? 'is-invalid' : ''}} ">
                                    @if($errors->has('subject'))
                                        <div class="alert alert-danger mb-30">{{$errors->first('subject')}}</div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <textarea class="contact-textarea {{$errors->has('msg') ? 'is-invalid' : ''}}"
                                              placeholder="Message" id="msg" name="message"></textarea>
                                    @if($errors->has('message'))
                                        <div class="alert alert-danger mb-30">{{$errors->first('message')}}</div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button id="submit" name="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-wrap">
                        <ul>
                            <li>
                                <i class="fa fa-home"></i> Address:
                                <p>1234, Contrary to popular Sed ut perspiciatis unde 1234</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> Email address:
                                <p>
                                    <span>info@yoursite.com </span>
                                    <span>info@yoursite.com </span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> phone number:
                                <p>
                                    <span>+0123456789</span>
                                    <span>+1234567890</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area end -->
@endsection
