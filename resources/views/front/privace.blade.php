@extends('app')
@section('title'){{ $page->title }}@endsection
@section('content')
<!--START HEADER   SECTION-->
<section class="privacy section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                {!! $page->body !!}
            </div>
        </div>
    </div>
</section>

@endsection