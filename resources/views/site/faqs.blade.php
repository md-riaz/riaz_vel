@extends('layouts.site_master')
@section('site_title')
    All FAQ Answers
@endsection
@section('content')
    <x-breadcump title="Frequently Asked Questions (FAQ)" info="FAQ"/>
    <!-- faq-area start -->
    <div class="faq-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq-wrap text-center">
                        <h3>FAQ</h3>
                    </div>
                    <div class="accordion" id="accordionExample">
                        @forelse($faqs as $faq)
                            <div class="card border-0">
                                <div class="card-header border-0 p-0 my-3">
                                    <button class="btn btn-link text-left py-3 w-100 text-white collapsed" type="button"
                                            data-toggle="collapse" data-target="#faq{{$loop->index+1}}"
                                            aria-expanded="true"
                                            aria-controls="faq{{$loop->index+1}}">
                                        {{$faq->faq_question}}
                                    </button>
                                </div>

                                <div id="faq{{$loop->index+1}}" class="collapse" aria-labelledby="faq{{$loop->index+1}}"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{$faq->faq_answer}}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-danger text-center">No Answers Right Now</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq-area end -->
@endsection
