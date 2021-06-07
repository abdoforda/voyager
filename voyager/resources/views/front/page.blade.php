@extends('app')
@section('title'){{ $page->title }}@endsection
@section('content')
    <!--START HEADER   SECTION-->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3> {{ $page->title }} </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('storage/'.$page->image) }}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="about-text start">
                        {!! $page->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team section">
        <div class="container">
            
        </div>
    </section>
    
@endsection