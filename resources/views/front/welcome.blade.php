@extends('app')

@section('slidshow')
<div class="overlay">
    <div class="container-fluid px-0 mx-0">
        <div class="row px-0 mx-0">
            <div class="col-md-12 px-0 mx-0">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($slidshows as $index => $slidshow)
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{ $index }}" @if ($index == 0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">

                        @foreach ($slidshows as $index => $slidshow)
                        <div class="carousel-item @if ($index == 0) active @endif ">
                            <img src="{{ asset('storage/'.$slidshow->image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <div class="slide wow zoomIn" data-wow-duration="1s" data-wow-delay="1s">
                                    <h2>{{ $slidshow->title }}</h2>
                                    <pre>{{ $slidshow->desc }}</pre>
                                    <a href="{{ $slidshow->url }}"><button class="btn btn-fc">اعرف المزيد</button></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    

    <!--START SECTION ABOUT-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="CatSlide">
                        <div class="owl-carousel owl-theme" id="about">
                            <div class="item">
                                <a href="/programs">
                                    <div class="about-item">
                                        <img src="assets/img/wedding-suit.png" alt="">
                                        <h6> برامج تدريبية </h6>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="/studies">
                                    <div class="about-item">
                                        <img src="assets/img/salesman.png" alt="">
                                        <h6>دراسات جدوى</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="/bags">
                                    <div class="about-item">
                                        <img src="assets/img/doctor.png" alt="">
                                        <h6>حقائب</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="item"><a href="/products">
                                    <div class="about-item">
                                        <img src="assets/img/deal.png" alt="">
                                        <h6> المنتجات</h6>
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

                <!--<div class="col-md-6">
                    <img src="assets/img/about.PNG" alt="about">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <p> شركة رائدة فى مجال تقديم خدمات الاستشارات والتدريب ودراسات الجدوى والتوظيف والدعم الفنى على
                            مستوى الوطن العريى حيث تقدم الكثير من الانشطة التدريبية والاستشارات فى كافة المجالات وكذلك
                            الخدمات المتميزة فى التوظيف,وذلك بهدف تطوير المورد البشرى والمؤسسى فى القطاعين الحكومة
                            والخاص </p>
                        <button class="btn btn-lg"><a href="#">اقرا المزيد</a>
                        </button>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <section class="videos section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3>اشهر الفيديوهات </h3>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <div class="row">
                    <div class="owl-carousel owl-theme" id="videos">

                        @foreach ($products->sortByDesc('solded') as $product)
                        @if ($product->video != '[]' and $product->solded >= 1 and $index < env('PRODUCTSHOW', 1000))
                        <div class="item">
                            <div class="card-items">
                                <div class="img-top">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="">
                                </div>
                                <div class="round">
                                    <img src="{{ asset('storage/'.$product->teacher->image) }}" alt="">
                                </div>
                                <div class="img-name">
                                    <h5><a href="product/{{ $product->name }}">{{ $product->teacher->name }}</a></h5>
                                </div>
                                <div class="i-body">
                                    <a href="product/{{ $product->name }}"><h5 class="card-title">{{ $product->name }}</h5></a>
                                    <p class="card-text">{{ substr($product->desc, 0, 180) }}</p>
                                </div>
                                <div class="card-bottom bcolor">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <a href="/{{ $product->type }}">
                                                <button class="btn btn-fc btn-lg ">{{ $product->catName() }}</button>
                                            </a>
                                        </div>
                                        <div class="col-md-4" style="padding-left: 0;">
                                            <button class="btn btn-fc" style="float: left;">
                                                {{ $product->priceCurrency() }}
                                            </button>
                                        </div>
                                        <div class="col-md-2" style="padding-right: 8px;">
                                            <button class="btn btn-fc" style="float: right;" onclick="add_to_cart({{ $product->id }});" >
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                    <div class="col-md-12 text-center">
                        <a href="/videos"><button class="btn btn-more"> المزيد </button></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
  
    <!--START SERVUCE SECTION-->
    <section class="service  section" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3> اشترك معنا </h3>
                    </div>
                </div>
            </div>
            <div class="all-item">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow slideInUp"  data-wow-duration="1s" data-wow-delay="1s">
                        <div class="card">
                            <img src="assets/img/lecture.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3>مدرب</h3>
                                <p class="card-text">تسعى شركة ميك للاستشارات والتدريب الى مساعدة المستثمرين لاتخاذ
                                    قرارات</p>
                                <button class="btn btn-info mt-3" data-toggle="modal" data-target="#tran">انضــــم
                                    الينا</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12 wow slideInUp"  data-wow-duration="2s" data-wow-delay="2s">
                        <div class="card">
                            <img src="assets/img/library.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3>مستشار</h3>
                                <p class="card-text">تسعى شركة ميك للاستشارات والتدريب الى مساعدة المستثمرين لاتخاذ
                                    قرارات</p>
                                <button class="btn btn-info mt-3" data-toggle="modal" data-target="#tran">انضــــم
                                    الينا</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow slideInUp"  data-wow-duration="2s" data-wow-delay="3s">
                        <div class="card">
                            <img src="assets/img/graduates.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3>شريك نجاح</h3>
                                <p class="card-text">تسعى شركة ميك للاستشارات والتدريب الى مساعدة المستثمرين لاتخاذ
                                    قرارات</p>
                                <button class="btn btn-info mt-3" data-toggle="modal" data-target="#tran">انضــــم
                                    الينا</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow slideInUp"  data-wow-duration="2s" data-wow-delay="4s">
                        <div class="card">
                            <img src="assets/img/desktop.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3>موظف</h3>
                                <p class="card-text">تسعى شركة ميك للاستشارات والتدريب الى مساعدة المستثمرين لاتخاذ
                                    قرارات</p>
                                <button class="btn btn-info mt-3" data-toggle="modal" data-target="#tran">انضــــم
                                    الينا</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>
    <!-- END SERVICES SECTON-->
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3> اشهر المنتجات </h3>
                    </div>
                    <div class="owl-carousel owl-theme Program">
                        

                        @foreach ($products->sortByDesc('solded') as $index => $product)
                        @if ($product->type == "products" and $index <= env('PRODUCTSHOW', 1000))
                        @include('layouts.welcomeProduct')
                        @endif
                        @endforeach


                    </div>
                    <div class="col-md-12 text-center">
                        <a class="btn btn-more" href= "/products"> المزيد </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- START CHOICE US-->
    <div class="choise" >
        <div class="overlay section">
            <div class="container">
                <div class="row">
                    <div class="events">
                        <div class="row">
                            <div class="col-md-2 col-sm-6  wow zoomIn"  data-wow-duration="1s" data-wow-delay="1s">
                                <div class="event">
                                    <i class="far fa-user"></i>
                                    <h6>الاعضاء</h6>
                                    <h2 class="count">{{ $number->num1 }}</h2>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 wow zoomIn"  data-wow-duration="1s" data-wow-delay="2s">
                                <div class="event">
                                    <i class="fas fa-suitcase"></i>
                                    <h6>الحقائب</h6>
                                    <h2 class="count">{{ $number->num2 }}</h2>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 wow zoomIn"  data-wow-duration="1s" data-wow-delay="3s">
                                <div class="event">
                                    <i class="fas fa-book"></i>
                                    <h6>الكتب</h6>
                                    <h2 class="count">{{ $number->num3 }}</h2>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 wow zoomIn"  data-wow-duration="1s" data-wow-delay="4s">
                                <div class="event">
                                    <i class="fas fa-graduation-cap"></i>
                                    <h6>الناجحون</h6>
                                    <h2 class="count">{{ $number->num4 }}</h2>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 wow zoomIn"  data-wow-duration="1s" data-wow-delay="5s">
                                <div class="event">
                                    <i class="fas fa-laptop-code"></i>
                                    <h6>المستشارين</h6>
                                    {{-- <h2 class="count">{{ App\Advisor::all()->count() }}</h2> --}}
                                    <h2 class="count">{{ $number->num5 }}</h2>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 wow zoomIn"  data-wow-duration="1s" data-wow-delay="6s">
                                <div class="event">
                                    <i class="far fa-thumbs-up"></i>
                                    <h6>شركاء النجاح</h6>
                                    {{-- <h2 class="count">{{ App\Partner::all()->count() }}</h2> --}}
                                    <h2 class="count">{{ $number->num6 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end CHOICE US-->
    <div class="container section">
        <div class="row my-4">
            <div class="col-md-12">
                <div class="title-section">
                    <h3> اشهر الحقائب </h3>
                </div>
                <div class="owl-carousel owl-theme Program">
                    
                    @foreach ($products->sortByDesc('solded') as $index => $product)
                    @if ($product->type == "bags" and $index <= env('PRODUCTSHOW', 1000))
                    @include('layouts.welcomeProduct')
                    @endif
                    @endforeach

                </div>
                <div class="col-md-12 text-center">
                    <a class="btn btn-more" href= "/bags"> المزيد </a>
                 </div>
            </div>
        </div>
    </div>

    <!-- START CHOICE US-->
    <section class="choise ">
        <div class="overlay section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3 style="color: #fff;"> ﺷﺮﻛﺎﺀ ﻧﺠﺎﺡ </h3>
                        </div>
                        <div class="row">


                            @foreach ($news->sortByDesc('id') as $new)
                            <div class="col-md-6">
                                <div class="media">
                                    {!! $new->icon !!}
                                    <div class="media-body">
                                        <h3 class="mt-0">{{ $new->name }}</h3>
                                        <p>{{ $new->body }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            



                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="container section">
        <div class="row my-4">
            <div class="col-md-12">
                <div class="title-section">
                    <h3> اشهر الدراسات </h3>
                </div>
                <div class="owl-carousel owl-theme Program">
                    
                    @foreach ($products->sortByDesc('solded') as $index => $product)
                    @if ($product->type == "studies" and $index <= env('PRODUCTSHOW', 1000))
                    @include('layouts.welcomeProduct')
                    @endif
                    @endforeach

                </div>
                <div class="col-md-12 text-center">
                    <a class="btn btn-more" href= "/studies"> المزيد </a>
                 </div>
            </div>
        </div>
    </div>
    <!-- START SECTION WHY SAY-->
    <section class="say" >
        <div class="overlay section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3 style="color: #fff;"> ماذا يقولوا عنا</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="testmonials">
                            
                            @foreach ($opinions as $opinion)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('storage/'.$opinion->image) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h3>{{ $opinion->name }}</h3>
                                        <p>{{ $opinion->desc }}</p>
                                        <p class="card-text">{{ $opinion->body }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- END SECTION WHY SAY-->
    <!-- START SECTION TEAM-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h3> احدث المنضمين الينا </h3>
                    </div>
                </div>
            </div>
            <div class="row team">

                
                @php
                    $affiliates = App\Affiliate::orderBy('id', "DESC")->paginate(4);
                @endphp
                @foreach ($affiliates as $affiliate)
                <div class="col-md-3">
                    <div class="team-num">
                        <img src="{{ asset('storage/'.$affiliate->img) }}" alt="">
                        <div class="team-title">
                            <h4>{{ $affiliate->name }}</h4>
                            <h6>{{ $affiliate->desc }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach


                



            </div>
        </div>
        </div>
    </section>
    <!-- END SECTION TEAM-->
@endsection

@section('style')
    <style>
        header{
            height: 100vh;
        }
    </style>
@endsection