@extends('app')
@section('title'){{ $product->name }}@endsection
@section('content')
<div class="free-pro">
    <div class="container">
        @if ($exam->checkExam())
        <div class="col-sm-12">
            <div class="text-center">
                <h2 class="">
                    <br>
                    لقد أختبرت هذا الإختبار 
                    <br />
                    
                    <br />
                    نتيجيتك هي {{ $exam->checkExam()->result }} من {{ $exam->checkExam()->result_all }}
                </h2>
            </div>
        </div>
        @else
        <form action="/subExam" class="ajax" method="POST">
            @csrf
            <input type="hidden" name="id_exam" value="{{ $exam->id }}">
            <div class="row">

                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="h2asd">
                            <br>
                            {{ $exam->name }}
                        </h2>
                    </div>
                </div>

                @foreach ($questions as $index => $items)
                @php
                    $ex = explode('[', $items);
                    $qo = explode(']', $ex[1]);
                    $question = $qo[0];
    
                    $ans = explode(']', $ex[2]);
                    $answers = explode('-', $ans[0]);
                    
                @endphp
                    <div class="col-sm-12 div-qusation">
                        <p class="p-qusation">
                            {{ $question }}
                        </p>
                        @foreach ($answers as $answer)
                            <label class="width100">
                                <input type="radio" name="question{{ $index }}" value="{{ $answer }}" />
                                {{ $answer }}
                            </label>
                        @endforeach
                    </div>
                @endforeach
                
                <div class="col-sm-12">
                    <br>
                    <button type="submit" class="btn btn-warning">إنهاء الإختبار</button>
                </div>
            </div>
        </form>
        @endif
        <br /><br />
    </div>
</div>

<style>
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