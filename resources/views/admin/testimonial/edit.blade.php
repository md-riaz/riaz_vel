@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Testimonial</h4>
                    <span>update testimonial is here</span>
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

                    <li class="breadcrumb-item"><a href="{{url('add/testimonials')}}">Testimonials</a></li>
                    <li class="breadcrumb-item">{{$testimonial->name}} </li>

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
                    Update Testimonial
                </div>
                <div class="card-body">
                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('update/testimonial')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input required id="name" class="form-control" type="text" name="name"
                                   value="{{$testimonial->name}}">
                            <input required id="testimonial_id" class="form-control" type="hidden" name="testimonial_id"
                                   value="{{$testimonial->id}}">
                            @error('name')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input required id="designation" class="form-control" type="text" name="designation"
                                   value="{{$testimonial->designation}}">
                            @error('designation')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="speech">Speech</label>
                            <input required id="speech" class="form-control" type="text" name="speech"
                                   value="{{$testimonial->speech}}">
                            @error('speech')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Client Current Photo</label>
                            <img class="form-control"
                                 src="{{asset('uploads/testimonial_photos/'.$testimonial->client_photo)}}"
                                 alt="">
                        </div>
                        <div class="form-group">
                            <label for="client_photo">Client New Image</label>
                            <input type="file" class="form-control-file" id="client_photo" name="client_photo">
                            @error('client_photo')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
