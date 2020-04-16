@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Blog Update</h4>
                    <span>all the details about blog post is here</span>
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

                    <li class="breadcrumb-item"><a href="{{url('add/blogs')}}">Blog's</a></li>
                    <li class="breadcrumb-item"><a href="#!">{{$blog->blog_title}}</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('body')
    {{-- update Product --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5> Update Blog</h5>
                    <span>update an existing blog here</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('blog/update/')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="blog_title">Title</label>
                            <input required id="blog_title" class="form-control" type="text" name="blog_title"
                                   value="{{$blog->blog_title}}">
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            @error('blog_title')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select a category</label>
                            <select name="category_id" class="form-control form-control-primary">
                                <option value="#" disabled>Select One Value Only</option>
                                @forelse($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{$blog->category_id === $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                @empty
                                    <p class="text-danger">No categories available</p>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Current Preview Image</label>
                            <img src="{{asset('uploads/blog_photos/'.$blog->blog_thumbnail_photo)}}" alt=""
                                 class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="blog_thumbnail_photo">New Preview Image</label>
                            <input type="file" class="form-control-file" id="blog_thumbnail_photo"
                                   name="blog_thumbnail_photo">
                            @error('blog_thumbnail_photo')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="blog_description">Description</label>
                            <textarea type="file" class="form-control" id="blog_description"
                                      name="blog_description"
                                      rows="4">{{$blog->blog_description}}</textarea>
                            @error('blog_description')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Update Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
