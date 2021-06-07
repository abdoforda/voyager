@extends('app')
@section('title')محرك بحث@endsection
@section('content')
    <!--START HEADER   SECTION-->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3> 
                            <form action="/search" method="GET">
                                <input class="search01" type="search" name="search" placeholder="إبحث هنا" />
                            </form>    
                        </h3>
                    </div>
                </div>

                <div class="col-md-12">

                    <center>
                        <h4>نتائج البحث</h4>
                        <br />
                    </center>
                    
                        @if (count($products) == 0)
                            <center>لا يوجد نتائج تطابق بحثك</center>
                        @else

                        @foreach ($products as $product)
                        <div class="row bgsearch">
                            <div class="col">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="" style="height: 40px; width: auto;">
                            </div>
                            <div class="col"><a href="product/{{ $product->name }}">{{ $product->name }}</a></div>
                            <div class="col">{{ $product->priceCurrency() }}</div>
                            <div class="col"><button class="btn btn-fc" style="float: right;" onclick="add_to_cart({{ $product->id }});" >
                                <i class="fas fa-shopping-cart"></i>
                            </button></div>
                        </div>
                        @endforeach

                        @endif
                </div>
            </div>
        </div>
    </section>
    <section class="team section">
        <div class="container">
            
        </div>
    </section>
    <style>
        .bgsearch{
            line-height: 40px;
            border-bottom: 1px solid #ddd;
        }
        .search01{
            width: 200px;
    border-radius: 5px;
    outline: 0;
    border: 1px solid #b9b9b9;
    height: 40px;
    position: relative;
    top: 8px;
    font-size: 14px;
    padding: 0px 8px;
        }
    </style>
@endsection