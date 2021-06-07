@extends('app')
@section('title'){{ $blog->name }}@endsection
@section('content')
<div class="free-pro">
    <div class="container">
        <div class="col-sm-12">
            <div class="text-center">
                <h2 class="h2asd">
                    <img class="imgTeacher" src="{{ asset('storage/'.$blog->img) }}" alt="">
                    <br>
                    {{ $blog->name }}
                </h2>
                <br><br>
                {!! $blog->body !!}
                <br><br>
            </div>
        </div>
    </div>
</div>

<style>
    .imgTeacher{
        width: 300px;
        border-radius: 8px;
        margin: 20px;
    }
    .h2asd{
        border-bottom: 2px solid #fd9927;
        padding-bottom: 12px;
        margin-bottom: 10px;
    }
    .div-qusation{
        margin-top: 20px;

    }
    .p-qusation{
        font-weight: bold;
        color: #000;
        margin-bottom: 10px;
    }
    .width100{
        width: 100%;
        margin-bottom: 2px;
        color: #a5a5a5;
    }
    .width100.active{
        color: #0d7cff;
        font-weight: bold;
    }
</style>
@endsection