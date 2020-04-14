@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>All Messages</h4>
                    <span>messages from contact form are here</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            {{-- Navigation Breadcrumb  --}}
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">

                    <li class="breadcrumb-item">
                        <a href="{{url('home')}}"> <i class="feather icon-home"></i> </a>
                    </li>

                    <li class="breadcrumb-item"><a href="#!">messages</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <h5>List View</h5>

        </div>
        <div class="row card-block">
            {{-- Print success notification from sesson --}}
            @if (session('success_message'))
                <div class="alert alert-success" role="alert">
                    {{session('success_message')}}
                </div>
            @endif
            <div class="col-md-12">
                <ul class="list-view">
                    @forelse ($msg as $msg)
                        <li>
                            <div class="card list-view-media">
                                <div class="card-block">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img class="media-object card-list-img"
                                                 src="{{asset('frontend_assets/images/user_demo.jpg')}}"
                                                 alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <div class="col-xs-12">
                                                <h6 class="d-inline-block">{{$msg->name}}</h6>
                                                <label class="label label-info">{{$loop->index+1}}</label>
                                            </div>
                                            <div class="f-13 text-muted m-b-15">
                                                {{$msg->email}}
                                            </div>
                                            <p>
                                                <strong> Subject:</strong> {{$msg->subject}} <br> <br>
                                                {{$msg->message}}
                                            </p>
                                            <div class="m-t-15">

                                                <a href="mailto:{{$msg->email}}">
                                                    <button type="button" data-toggle="tooltip" title=""
                                                            class="btn waves-effect waves-light"
                                                            data-original-title="Reply">
                                                        <i class="icofont icofont-reply"></i>
                                                    </button>
                                                </a>
                                                <a href="{{url('messages/delete/'.$msg->id)}}">
                                                    <button type="button" data-toggle="tooltip" title=""
                                                            class="btn waves-effect waves-light bg-danger"
                                                            data-original-title="Send to trash">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <td colspan="10" class="text-danger">Nothing to show</td>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
