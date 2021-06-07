@extends('app')
@section('title')سلة المشتريات@endsection
@section('content')
<!--START login  SECTION-->
<section class="login00 section gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h3> سلة مشترياتك </h3>
                </div>
            </div>
            
            <div class="col-md-12">
                @if (count($carts) != 0)
                
                <div class="cart">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">المنتج</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">السعر الاجمالى</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">حذف</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($carts as $index => $cart)
                          <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ $cart->product->priceCurrency() }}</td>
                            <td><input type="number" value="{{ $cart->count }}" min="1" onchange="update_cart({{ $cart->id }},this);"></td>
                            <td class="total_price">{{ $cart->priceTotal() }}</td>
                            <td>
                                <img class="product_image_cart" src="{{ asset('storage/'.$cart->product->image) }}" alt="">
                            </td>
                        
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_cart({{ $cart->id }},this);">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="applay">
                    <a href="/checkout"><button class="btn btn-main">اتمام الشراء</button></a>
                    <button class="btn btn-danger" onclick="delete_all_cart();">حذف كل المشتريات</button>
                </div>
                <style>
                    .product_image_cart{
                        height: 38px;
                        width: auto;
                    }
                </style>
                @else
                <div class="text-center">
                    سلة مشترياتك فارغة
                </div>
                @endif
                
            </div>
        </div>
    </div>
</section>
@endsection