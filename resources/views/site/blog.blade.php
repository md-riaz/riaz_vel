@extends('layouts.site_master')
@section('site_title')
    Blog
@endsection
@section('content')
    <x-breadcump title="Blog page" info="blog"/>
    <!-- blog-area start -->
    <div class="blog-area">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Latest News</h2>
                    <img src="{{asset('frontend_assets')}}/images/section-title.png" alt="">
                </div>
            </div>
            <div class="row">

                @forelse($blogs as $blog)

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-wrap">
                            <div class="blog-image">
                                <img src="{{asset('uploads/blog_photos/'.$blog->blog_thumbnail_photo)}}" alt="">
                                <ul>
                                    <li>{{$blog->created_at->format('d')}}</li>
                                    <li>{{$blog->created_at->format('M')}}</li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> {{$blog->user->name}}</a></li>
                                        <li class="pull-right">
                                            <a href="#"><i
                                                    class="fa fa-clock-o"></i> {{$blog->created_at->format('d/m/Y')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <h3><a href="{{url('/blog/'.$blog->id)}}">{{$blog->blog_title}}</a></h3>
                                <p>{{Str::limit($blog->blog_description, 330)}}</p>
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-center text-danger">No Blog to show</p>
                @endforelse

                @if($blogs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="col-12">
                        <div class="pagination-wrapper text-center mb-30">
                            <ul class="page-numbers">
                                <li><a class="prev page-numbers {{$blogs->previousPageUrl()==null ? 'd-none' : ''}}"
                                       href="{{$blogs->previousPageUrl()}}"><i class="fa fa-arrow-left"></i></a></li>
                                {{--                                <li><span class="page-numbers current">1</span></li>--}}

                                @for ($i = 1; $i < $blogs->lastPage()+1; $i++)
                                    <li><a class="page-numbers" href="{{$blogs->url($i)}}">{{$i}}</a></li>
                                @endfor


                                <li><a class="next page-numbers {{$blogs->previousPageUrl()==null ? 'd-none' : ''}}"
                                       href="#"><i class="fa fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- blog-area end -->
@endsection
