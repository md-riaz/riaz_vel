@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Address</h4>
                    <span>Update address here</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            {{-- Navigation Breadcrumb  --}}
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">

                    <li class="breadcrumb-item">
                        <a href="{{url('home')}}"> <i class="feather icon-home"></i>
                        </a>
                    </li>

                    <li class="breadcrumb-item"><a href="#!">Address</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection
@section('body')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Address</h5>
                    <span>input address correctly</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('update/address')}}">
                        @csrf
                        <div class="form-group">
                            <label for="phone_number">Contact Number</label>
                            <input required id="phone_number" class="form-control" type="text" name="phone_number"
                                   value="{{$address->phone_number}}">
                            @error('phone_number')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required id="email" class="form-control" type="email" name="email"
                                   value="{{$address->email}}">
                            @error('email')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input required id="address" class="form-control" type="text" name="address"
                                   value="{{$address->address}}">
                            @error('address')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="facebook_url">Facebool Link</label>
                            <input required id="facebook_url" class="form-control" type="url" name="facebook_url"
                                   value="{{$address->facebook_url}}">
                            @error('facebook_url')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="twitter_url">Twitter Link</label>
                            <input required id="twitter_url" class="form-control" type="url" name="twitter_url"
                                   value="{{$address->twitter_url}}">
                            @error('twitter_url')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="linkedin_url">Linkedin Link</label>
                            <input required id="linkedin_url" class="form-control" type="url" name="linkedin_url"
                                   value="{{$address->linkedin_url}}">
                            @error('linkedin_url')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gplus_url">G Plus Link</label>
                            <input required id="gplus_url" class="form-control" type="url" name="gplus_url"
                                   value="{{$address->gplus_url}}">
                            @error('gplus_url')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
