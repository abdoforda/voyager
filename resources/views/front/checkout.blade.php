@extends('app')
@section('title')إتمام الشراء@endsection
@section('content')
<section class="contact section" style="background-color: #f5f5f5;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="card">
            

            <form action="/buy_now" method="POST" class="ajax" >
                @csrf
                <div class="card-body">
                    <div class="form-header blue accent-1">
                      <h4 class="mb-3"> تفاصيل الفاتورة:</h4>
                    </div>
                    <div class="form-group">
                      <label for="form-name">الاسم بالكامل</label>
                      <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" placeholder="الاسم بالكامل">
                    </div>
                    <div class="form-group">
                      <label for="form-name">البريد الالكترونى</label>
                      <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control" placeholder="البريد الالكترونى">
                    </div>
                    <div class="form-group">
                      <label for="form-name">الدولة</label>
                      <input type="text" name="state" class="form-control" placeholder="الدولة">
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="form-name">المنطقة</label>
                        <input type="text" name="zone" class="form-control" placeholder="المنطقة">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="form-name">كود</label>
                        <input type="text" name="zip" class="form-control" placeholder="كود">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="form-name">عنوان الشحن</label>
                        <textarea type="text" name="address" class="form-control" placeholder="عنوان الشحن"></textarea>
                      </div>
                    <div class="form-group payment">
                      <label for="form-name">payment methods</label>
                      <div class="custom-control custom-radio">
                        <input checked type="radio" id="customRadio1" name="payment_methods" value="Visa" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Credit card</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="payment_methods" value="Paypal" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">paypal</label>
                      </div>
      
                    </div>
                    <div class="form-group">
                      <label for="form-name">رقم الكارت</label>
                      <input type="number" name="card_number" class="form-control" placeholder="رقم الكارت">
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="form-name">تاريخ الانتهاء</label>
                        <input type="number" name="exp_month" class="form-control" placeholder="شهر ">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="form-name">تاريخ الانتهاء</label>
                        <input type="number" name="exp_year" class="form-control" placeholder=" سنة">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="form-name"> رقم سرى </label>
                        <input type="number" name="security" class="form-control" placeholder=" رقم سرى">
                      </div>
                    </div>
      
                    <div>
                      <div class="text-center">
                        <button class="btn btn-light-blue btn-main">ارسال</button>
                      </div>
                    </div>
                  </div>
            </form>

          </div>
        </div>
        <div class="col-md-6">
          <div class="shopping-cart">

            <h3> سلة المشتريات </h3>

            @php
                $all = 0;
            @endphp
            @foreach ($carts as $index => $cart)
            @php
                $all += $cart->priceTotalNoCurrency();
            @endphp
            <div class="item">
                <div>
                    <img src="{{ asset('storage/'.$cart->product->image) }}" class="product_img_checkout" />
                    <span class="span_checkout">
                        <h5>{{ $cart->product->name }} </h5>
                        <p> {{ substr($cart->product->desc, 0, 74) }} . . .  </p>
                    </span>
                </div>
                <div>
                  <h4>{{ $cart->priceTotal() }}</h4>
                </div>
              </div>
            @endforeach
            


            <div class="total">
              @php
                  
              if(state() == "price_eg"){
                  $namePrice = "جنية";
              }elseif(state() == "price_sar"){
                  $namePrice = "ريال";
              }else{
                  $namePrice = "دولار";
              }
              @endphp
              الاجمالى : {{ $all." ".$namePrice }} 
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  
@endsection