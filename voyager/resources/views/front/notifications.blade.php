@extends('app')
@php
    $title = "إشعارات";
@endphp
@section('title'){{ $title }}@endsection
@section('content')
    <!--END NAVBAR SECTION-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach (auth()->user()->notifications as $index => $notification)
                @php
                    $zoom = App\Zoom::find($notification->data['zoom']);
                @endphp
                    <a class="links01" href="/notification/{{ $notification->id }}">
                        <span>{{ $index+1 }} - </span> {{ $zoom->name }}
                    </a>
                @endforeach
                <br><br><br>
            </div>
        </div>
    </div>
    

    <style>
        .links01{
            display: block;
            padding: 10px;
            background: #f9f9f9;
            margin-top: 5px;
        }
        .links01 span{
            color: #000;
        }
    </style>
@endsection