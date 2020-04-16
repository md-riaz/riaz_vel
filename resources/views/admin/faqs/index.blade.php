@extends('layouts.master')
@section('header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>FAQ</h4>
                    <span>all the details about faq's are here</span>
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

                    <li class="breadcrumb-item"><a href="#!">FAQ</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('body')
    {{-- Add new faq --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5> Add New FAQ</h5>
                    <span>add new question and answer here</span>

                </div>
                <div class="card-block">

                    {{-- Print success notification from sesson --}}
                    @if (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form method="post" action="{{ url('store/faq')}}">
                        @csrf
                        <div class="form-group">
                            <label for="faq_question">FAQ Question</label>
                            <input required id="faq_question" class="form-control" type="text" name="faq_question">
                            @error('faq_question')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="faq_answer">FAQ Answer</label>
                            <input required type="text" class="form-control" id="faq_answer" name="faq_answer">
                            @error('faq_answer')
                            <div class="alert alert-warning" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Add FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- All FAQ List --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5> FAQ List </h5>
                    <span>all faq's are here</span>

                </div>
                <div class="card-block table-border-style">

                    {{-- Print success notification from sesson --}}
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
                                <th>FAQ Question</th>
                                <th>FAQ Answer</th>
                                <th>Added by</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($faqs as $faq)

                                <tr class="border-bottom-primary">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{Str::limit($faq->faq_question, 44)}}</td>
                                    <td>{{Str::limit($faq->faq_answer, 44)}}</td>
                                    <td>{{$faq->relationtouser->name}}</td>

                                    <td>
                                        @if ($faq->created_at)
                                            {{$faq->created_at->diffForHumans()}}
                                        @else
                                            <span class="text-danger">No time availabe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <a href="{{url('delete/faq/'.$faq->id)}}" type="button"
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
