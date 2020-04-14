@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Banner</h4>
                    <span>all the details about banner is here</span>
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

                    <li class="breadcrumb-item"><a href="#!">Banner</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('body')
    {{-- Add new Banner --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5> Add Banner</h5>
                    <span>add new banner here</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('store/banner')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="banner_title">Banner Title</label>
                            <input id="banner_title" class="form-control" type="text" name="banner_title">
                            @error('banner_title')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="banner_info">Banner Info</label>
                            <input id="banner_info" class="form-control" type="text" name="banner_info">
                            @error('banner_info')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="banner_image">Banner Image</label>
                            <input type="file" class="form-control-file" id="banner_image" name="banner_image">
                            @error('banner_image')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Add Banner</button>
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
                    <h5> All Banner List </h5>
                    <span>all banners are here</span>

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
                    @if (session('restore_message'))
                        <div class="alert alert-success icons-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled"></i>
                            </button>
                            <p><strong>Success!</strong> {{session('restore_message')}}</p>
                        </div>
                    @endif

                    <div class="table-responsive p-15">
                        <table class="table">
                            <thead>
                            <tr class="border-bottom-danger">
                                <th>#</th>
                                <th>Banner Title</th>
                                <th>Banner Info</th>
                                <th>Banner Image</th>
                                <th>User Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($banners as $banner)

                                <tr class="border-bottom-primary">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$banner->banner_title}}</td>
                                    <td>{{substr($banner->banner_info, 0, 25)}}...</td>
                                    <td><img src="{{asset('uploads/banner_photos/'.$banner->banner_photo)}}"
                                             alt="Not found" width="100" style="object-fit:cover;">
                                    </td>
                                    <td>{{App\User::find($banner->user_id)->name}}</td>
                                    <td>
                                        @if ($banner->created_at)
                                            {{$banner->created_at->diffForHumans()}}
                                        @else
                                            <span class="text-danger">No time availabe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <a href="{{url('update/banner/'.$banner->id)}}" type="button"
                                               class="btn btn-info"><i class="icofont icofont-edit"></i></a>
                                            <a href="{{url('delete/banner/'.$banner->id)}}" type="button"
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
    {{-- Deleted banner list --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Deleted Banner List </h5>
                    <span>all deleted banners are here</span>

                </div>
                <div class="card-block table-border-style">

                    {{-- Print success notification from sesson --}}
                    @if (session('banne_photo'))
                        <div class="alert alert-success icons-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled"></i>
                            </button>
                            <p><strong>Success!</strong> {{session('banner_photo')}}</p>
                        </div>
                    @endif


                    <div class="table-responsive p-15">
                        <table class="table">
                            <thead>
                            <tr class="border-bottom-danger">
                                <th>#</th>
                                <th>Banner Title</th>
                                <th>Banner Image</th>
                                <th>User Name</th>
                                <th>Deleted at</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($banner_trash as $banner)

                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$banner->banner_title}}</td>
                                    <td><img src="{{asset('uploads/banner_photos/'.$banner->banner_photo)}}"
                                             alt="Not found" width="100" style="object-fit:cover;">
                                    </td>
                                    <td>{{App\User::find($banner->user_id)->name}}</td>
                                    <td>
                                        @if ($banner->created_at)
                                            {{$banner->created_at->diffForHumans()}}
                                        @else
                                            <span class="text-danger">No time availabe</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <a href="{{url('restore/banner/'.$banner->id)}}" type="button"
                                               class="btn btn-info"><i class="icofont icofont-bubble-up"></i></a>
                                            <a href="{{url('hard-delete/banner/'.$banner->id)}}" type="button"
                                               class="btn btn-danger"><i class="icofont icofont-trash"></i></a>
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
