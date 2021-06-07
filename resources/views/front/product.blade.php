@extends('app')
@section('title'){{ $product->name }}@endsection
@php
    $product_id = $product->id;
@endphp
@section('content')
<div class="free-pro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="pro-title">
                    {{ $product->name }}
                </h3>
                <br>
            </div>

            <div class="col-md-4">
                <div>
                    <img src="{{ asset('storage/'.$product->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <h4>
                        {{ $product->name }} 
                        <br>
                        <div id="rateit10" class="rateit" data-rateit-value="{{ $product->evaluation() }}" data-rateit-ispreset="true" 
                            
                            @guest
                            data-rateit-readonly="true"
                            @else
                            @if ($product->is_evaluation())
                            data-rateit-readonly="true"
                            @endif
                            @endguest
                            ></div>

                    </h4>
                    <br>
                    <br>

                    <pem>
                        {{ $product->desc }}
                    </pem>
                    <br>



                </div>
            </div>


        </div>
        <br>
        <div class="row">
            @if ($product->video != '[]')
            <div class="col-3">
                <div>
                    <button type="button" class="btn btn-info"  onclick="videoWatch({{$product->id}});"> بيانات الفيديو </button>
                    <button id="clickWatchVideo" style="display: none" data-toggle="modal" data-target="#tran2"></button>
                </div>
            </div>    
            @endif
            
            @foreach(json_decode($product->files) as $index=> $file)
                @php
                    $d = explode('.',$file->original_name);
                    $file->original_name = $d[0];
                @endphp
                <div class="col-3">
                    <div>
                        <button type="button" class="btn btn-info" onClick="download({{ $product->id }},{{$index}});">
                            {{ $file->original_name ?: 'تحميل' }} &nbsp; <i
                                class="fas fa-cloud-download-alt"></i> </button>
                    </div>
                </div>
            @endforeach

            
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-sm-9">
                <div>
                    <h5> مدة البرنامج : {{ $product->video_length }} </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div>
                    
                    @if ($product->pricee() != 0 and !$product->purchased())
                    <button type="button" class="btn btn-success btn-block"
                    onclick="add_to_cart({{ $product->id }});"
                    > أضف الى السلة &nbsp; <i
                            class="fas fa-shopping-cart"></i> </button>
                    @endif
                    
                    @if ($product->purchased())
                    <h5 style="text-align: center;
                    color: #fd9929;
                    font-size: 16px;">
                        لقد إشتريت هذا المنتج
                    </h5>
                    @endif
                </div>
            </div>
            @if ($product->exam)
            <br /><br />
            <div class="col-sm-12">
                <a href="/exam/{{ $product->name }}"><button>فتح الإختبار</button></a>
            </div>
            @endif
            
        </div>
        <hr>
        <br>
        <div class="row">
            @if ($product->teacher)
            <div class="col-md-6">
                <div class="media">
                    <img src="{{ asset('storage/'.$product->teacher->image) }}" width="100" style="width: 100px;" class="ml-3" alt="...">
                    <div class="media-body">
                        <a href="/teacher/{{ $product->teacher->id }}"><h5 class="mt-0"> {{ $product->teacher->name }}</h5></a>
                        <p> {{ $product->teacher->desc }} </p>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h3 class="pro-title">
                    البرامج المتشابهه
                </h3>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme Program">
                    @foreach ($products->shuffle() as $product)
                        @include('layouts.welcomeProduct')
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>

@endsection


@section('script')
<link href="{{ asset('assets/scripts/rateit.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('assets/scripts/jquery.rateit.js') }}"></script>
<script>

    $("#rateit10").click(function(e) {
        var value = $('#rateit10').rateit('value');
        var product = {{ $product_id }};
        $.get('/evaluation',{value,product},function(){
            success('تم إرسال تقيمك');
        });
    });
</script>
@endsection