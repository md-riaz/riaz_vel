@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Blog's</h4>
                    <span>all the blog posts are here</span>
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

                    <li class="breadcrumb-item"><a href="#!">Blogs</a></li>

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
                    <h5> Write an article</h5>
                    <span>add new post here</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('store/blog')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="blog_title">Title</label>
                            <input id="blog_title" class="form-control" type="text" name="blog_title" required>
                            @error('blog_title')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="blog_thumbnail_photo">Preview Image</label>
                            <input type="file" class="form-control-file" id="blog_thumbnail_photo"
                                   name="blog_thumbnail_photo" required>
                            @error('blog_thumbnail_photo')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="blog_description">Description</label>
                            <textarea id="blog_description" class="form-control" rows="4"
                                      name="blog_description" required> </textarea>
                            @error('blog_description')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--         All Blog List --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5> Articles List </h5>
                    <span>all articles are here</span>

                </div>
                <div class="card-block table-border-style">

                    {{--                         Print success notification from sesson --}}
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
                                <th>Title</th>
                                <th>Thumbnail Image</th>
                                <th>Posted by</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($blogs as $blog)

                                <tr class="border-bottom-primary">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$blog->blog_title}}</td>
                                    <td><img src="{{asset('uploads/blog_photos/'.$blog->blog_thumbnail_photo)}}"
                                             alt="Not found" width="100" style="object-fit:cover">
                                    </td>

                                    <td>{{$blog->user->name}}</td>
                                    <td>
                                        @if ($blog->created_at)
                                            {{$blog->created_at->diffForHumans()}}
                                        @else
                                            <span class="text-danger">No time availabe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <a href="{{url('update/blog/'.$blog->id)}}" type="button"
                                               class="btn btn-info">Update</a>
                                            <a href="{{url('delete/blog/'.$blog->id)}}" type="button"
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
    {{--             Deleted articles list --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Deleted Article List </h5>
                    <span>all deleted articles are here</span>

                </div>
                <div class="card-block table-border-style">

                    {{--                             Print success notification from sesson --}}
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
                                <th>Title</th>
                                <th>Thumbnail Image</th>

                                <th>Posted by</th>
                                <th>Deleted at</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($blog_trash as $blog)

                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$blog->blog_title}}</td>
                                    <td><img src="{{asset('uploads/blog_photos/'.$blog->blog_thumbnail_photo)}}"
                                             alt="Not found" width="100" style="object-fit:cover">
                                    </td>
                                    <td>{{$blog->user->name}}</td>
                                    <td>
                                        @if ($blog->deleted_at)
                                            {{$blog->deleted_at->diffForHumans()}}
                                        @else
                                            <span class="text-danger">No time availabe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <a href="{{url('restore/blog/'.$blog->id)}}">
                                                <button type="button" data-toggle="tooltip" title=""
                                                        class="btn waves-effect waves-light"
                                                        data-original-title="Restore">
                                                    <i class="icofont icofont-bubble-up"></i>
                                                </button>
                                            </a>
                                            <a href="{{url('hard-delete/blog/'.$blog->id)}}">
                                                <button type="button" data-toggle="tooltip" title=""
                                                        class="btn waves-effect waves-light bg-danger"
                                                        data-original-title="Delete Permanently">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </a>
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
