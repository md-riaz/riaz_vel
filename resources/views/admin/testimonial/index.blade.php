@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Testimonial</h4>
                    <span>all the details about client testimonial is here</span>
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

                    <li class="breadcrumb-item"><a href="#!">Testimonial</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('body')
    {{-- Add new Testimonial --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5> Add Testimonial</h5>
                    <span>add new testimonial here</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('store/testimonial')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input required id="name" class="form-control" type="text" name="name">
                            @error('name')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input required id="designation" class="form-control" type="text" name="designation">
                            @error('designation')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="speech">Speech</label>
                            <input required id="speech" class="form-control" type="text" name="speech">
                            @error('speech')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="client_photo">Client Image</label>
                            <input required type="file" class="form-control-file" id="client_photo" name="client_photo">
                            @error('client_photo')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Add Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- All Category List --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5> All Testimonial List </h5>
                    <span>all testimonial are here</span>

                </div>
                <div class="card-block table-border-style">

                    {{-- Print success notification from sesson --}}
                    @if (session('update_status'))
                        <div class="alert alert-success icons-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled"></i>
                            </button>
                            <p><strong>Success!</strong> {{session('update_status')}}</p>
                        </div>
                    @endif
                    @if (session('delete_status'))
                        <div class="alert alert-success icons-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled"></i>
                            </button>
                            <p><strong>Success!</strong> {{session('delete_status')}}</p>
                        </div>
                    @endif

                    <div class="table-responsive p-15">
                        <table class="table">
                            <thead>
                            <tr class="border-bottom-danger">
                                <th>#</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Client Photo</th>
                                <th>Speech</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($testimonials as $testimonial)

                                <tr class="border-bottom-primary">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$testimonial->name}}</td>
                                    <td>{{$testimonial->designation}}</td>
                                    <td><img src="{{asset('uploads/testimonial_photos/'.$testimonial->client_photo)}}"
                                             alt="Not found" width="100" style="object-fit:cover;">
                                    </td>
                                    <td>{{substr($testimonial->speech, 0, 50)}}...</td>
                                    <td>
                                        @if ($testimonial->created_at)
                                            {{$testimonial->created_at->diffForHumans()}}
                                        @else
                                            <span class="text-danger">No time availabe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <a href="{{url('update/testimonial/'.$testimonial->id)}}" type="button"
                                               class="btn btn-info"><i class="icofont icofont-edit"></i></a>
                                            <a href="{{url('delete/testimonial/'.$testimonial->id)}}" type="button"
                                               class="btn btn-danger"><i class="icofont icofont-ui-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="10" class="text-danger">Nothing to show</td>
                            @endforelse
                            </tbody>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>




@endsection
