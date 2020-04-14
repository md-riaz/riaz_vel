@extends('layouts.master')
@section('header')
<div class="row align-items-end">
    <div class="col-lg-8">
        <div class="page-header-title">
            <div class="d-inline">
                <h4>Category</h4>
                <span>update category is here</span>
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

                <li class="breadcrumb-item"><a href="{{url('/add/category')}}">Categories</a> </li>
                <li class="breadcrumb-item">{{$category->category_name}} </li>

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
                Update Category
            </div>
            <div class="card-body">
                {{-- Print success notification from sesson --}}
                @if (session('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{session('success_message')}}
                    </div>
                @endif
                <form method="post" action="{{ url('update/category')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input id="category_id" class="form-control" type="hidden" name="category_id"
                               value="{{$category->id}}">
                        <input id="category_name" class="form-control" type="text" name="category_name"
                               value="{{$category->category_name}}">
                        @error('category_name')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_photo">Category Current Photo</label>
                        <img class="form-control" src="{{asset('uploads/category_photos/'.$category->category_img)}}"
                             alt="">
                    </div>
                    <div class="form-group">
                        <label for="category_photo">New Category Photo</label>
                        <input id="category_photo" class="form-control" type="file" name="category_photo">
                        @error('category_photo')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark" type="submit">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
