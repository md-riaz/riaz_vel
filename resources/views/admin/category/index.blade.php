@extends('layouts.master')
@section('header')
<div class="row align-items-end">
    <div class="col-lg-8">
        <div class="page-header-title">
            <div class="d-inline">
                <h4>Category</h4>
                <span>all the details about category is here</span>
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

                <li class="breadcrumb-item"><a href="#!">Category</a> </li>

            </ul>
        </div>
    </div>
</div>
@endsection

@section('body')
{{-- Add new category --}}
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5> Add Category</h5>
                <span>add new category here</span>

            </div>
            <div class="card-block">

                {{-- Print success notification from sesson --}}
                @if (session('success_message'))
                <div class="alert alert-success" role="alert">
                    {{session('success_message')}}
                </div>
                @endif
                <form method="post" action="{{ url('store/category')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input id="category_name" class="form-control" type="text" name="category_name">
                        @error('category_name')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <input type="file" class="form-control-file" id="category_image" name="category_image">
                        @error('category_image')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Add Category</button>
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
                <h5> Category List </h5>
                <span>all categories are here</span>

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
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>User Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)

                            <tr class="border-bottom-primary">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td><img src="{{asset('uploads/category_photos/'.$category->category_img)}}"
                                        alt="Not found" width="50" style="object-fit:cover;border-radius: 50%;"></td>
                                <td>{{App\User::find($category->user_id)->name}}</td>
                                <td>
                                    @if ($category->created_at)
                                    {{$category->created_at->diffForHumans()}}
                                    @else
                                    <span class="text-danger">No time availabe</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <a href="{{url('update/category/'.$category->id)}}" type="button"
                                            class="btn btn-info">Update</a>
                                        <a href="{{url('delete/category/'.$category->id)}}" type="button"
                                            class="btn btn-danger">Delete</a>
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
{{-- Deleted category list --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Deleted Category List </h5>
                <span>all deleted categories are here</span>

            </div>
            <div class="card-block table-border-style">

                {{-- Print success notification from sesson --}}
                @if (session('Fdelete_message'))
                <div class="alert alert-success icons-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                    </button>
                    <p><strong>Success!</strong> {{session('Fdelete_message')}}</p>
                </div>
                @endif


                <div class="table-responsive p-15">
                    <table class="table">
                        <thead>
                            <tr class="border-bottom-danger">
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>User Name</th>
                                <th>Deleted at</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories_trash as $category)

                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td><img src="{{asset('uploads/category_photos/'.$category->category_img)}}"
                                        alt="Not found" width="80" style="object-fit:cover"></td>
                                <td>{{App\User::find($category->user_id)->name}}</td>
                                <td>
                                    @if ($category->deleted_at)
                                    {{$category->deleted_at->diffForHumans()}}
                                    @else
                                    <span class="text-danger">No time availabe</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <a href="{{url('restore/category/'.$category->id)}}" type="button"
                                            class="btn btn-secondary">Restore</a>
                                        <a href="{{url('hard-delete/category/'.$category->id)}}" type="button"
                                            class="btn btn-danger">Hard Delete</a>
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