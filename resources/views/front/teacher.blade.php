@extends('app')
@section('title'){{ $teacher->name }}@endsection
@section('content')
<div class="free-pro">
    <div class="container">
        <div class="col-sm-12">
            <div class="text-center">
                <h2 class="">
                    <img class="imgTeacher" src="{{ asset('storage/'.$teacher->image) }}" alt="">
                    <br>
                    {{ $teacher->name }}
                </h2>

                <br><br>

                {!! $teacher->body !!}

                <br><br>
            </div>
        </div>
    </div>
</div>

<style>
    .imgTeacher{
        width: 130px;
    border-radius: 300px;
    height: 130px;
    object-fit: cover;
    border: 2px solid #fd992978;
    padding: 5px;
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