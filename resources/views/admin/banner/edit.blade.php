@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Banner</h4>
                    <span>update banner is here</span>
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

                    <li class="breadcrumb-item"><a href="{{url('add/banner')}}">Banners</a></li>
                    <li class="breadcrumb-item">{{$banner->banner_title}} </li>

                </ul>
            </div>
        </div>
    </div>
@endsection


@section('body')
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header  bg-inverse">
                    Update Banner
                </div>
                <div class="card-body">
                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('update/banner')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="banner_title">Banner Title</label>
                            <input id="banner_id" class="form-control" type="hidden" name="banner_id"
                                   value="{{$banner->id}}">
                            <input id="banner_title" class="form-control" type="text" name="banner_title"
                                   value="{{$banner->banner_title}}">
                            @error('banner_title')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="banner_info">Banner Info</label>
                            <input id="banner_info" class="form-control" type="text" name="banner_info"
                                   value="{{$banner->banner_info}}">
                            @error('banner_info')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="banner_photo">Banner Current Photo</label>
                            <img class="form-control"
                                 src="{{asset('uploads/banner_photos/'.$banner->banner_photo)}}"
                                 alt="">
                        </div>
                        <div class="form-group">
                            <label for="banner_photo">New Banner Photo</label>
                            <input id="banner_photo" class="form-control" type="file" name="banner_photo">
                            @error('banner_photo')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
