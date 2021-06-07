@extends('app')
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
    <div class="free-pro">
        <div class="container">
            <h3 class="pro-title">
                {{ $title }} المجانية
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme Program">

                        @foreach ($products as $product)
                        @if ($product->pricee() == 0)
                        @include('layouts.itemProduct')
                        @endif
                        @endforeach

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="free-pro">
        <div class="container">
            <h3 class="pro-title">
                {{ $title }} الاكثر مبيعاً
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme Program">
                        
                        @foreach ($products->sortByDesc('solded') as $index => $product)
                            @if ($index < 10)
                            @include('layouts.itemProduct')
                            @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="free-pro">
        <div class="container">
            <h3 class="pro-title">
                الجديد على المنصة
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme Program">

                        @foreach ($products as $index => $product)
                        @if ($product->pricee() > 0 and $index < 10)
                        @include('layouts.itemProduct')
                        @endif
                        @endforeach

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @isset ($letters)


    <div class="free-pro">
        <div class="container">
            <h3 class="pro-title">
                الأخبار والتقارير
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme Program">

                        
                        @foreach ($letters as $index => $product)
                        @if ($index < 10)
                        <div class="item">
                            <div class="box">
                                <a href="/blog/{{ $product->name }}">
                                    <img src="{{ asset('storage/'.$product->img) }}" alt="">
                                </a>
                                <div class="box-val">
                                    <a href="/blog/{{ $product->name }}">
                                    <div class="box-name">
                                        <a href="/blog/{{ $product->name }}">{{ $product->name }}</a>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        
                        
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="/order_study" class="btn " style="width: 250px;
                border: 1px solid #fd9923;
                background-color: #fd9923;
                color: #fff;">
                    أطلب دراسة جدوي
                </a>
            </div>
            <br>
        </div>
        
    </div>


    @endisset
  <!-- start footer-->
@endsection