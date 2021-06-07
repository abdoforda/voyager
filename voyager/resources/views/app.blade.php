<!doctype html>
<html lang="ar">
{{ checknotification() }}
<head>
    <title>{{ setting('site.title') }}@if (trim($__env->yieldContent('title'))) - @yield('title')@endif</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('storage/'.setting('site.logo')) }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awsome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    @yield('style')

</head>

<body>
    <!--START TOP NAVBAR  DIV-->
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                    <!-- start model-->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="AuthModal"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AuthModal">
                                        @guest
                                        تسجيل دخول 
                                        @else
                                        ملفك الشخصي
                                        @endguest
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <!--START NEW TAB-->
                                    <!-- Nav tabs -->
                                    @guest
                                    <ul class="nav nav-tabs" id="newTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#log"
                                                role="tab" aria-controls="home" aria-selected="true">دخول</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" aria-controls="profile" data-toggle="tab" href="#reg"
                                                role="tab"  aria-selected="false">انشاء حساب</a>
                                        </li>
                                    </ul>
                                    @endguest

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="log" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <section class="login00">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="log">
                                                                <form @guest
                                                                action="/login"
                                                                @else
                                                                action="/userUpdate"
                                                                @endguest method="POST" class="login">
                                                                    @csrf
                                                                    
                                                                    @guest

                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> كلمة المرور</label>
                                                                        <input name="password" type="password" class="form-control"
                                                                            placeholder=" كلمة المرور">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember2">
                                                                        <label for="form-name" style="margin-right: 20px;" for="remember2">البقاء متصلاََ</label>
                                                                        
                                                                    </div>


                                                                    @else

                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input value="{{ Auth::user()->email }}" readonly disabled name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> كلمة المرور القديمة</label>
                                                                        <input name="old_password" type="password" class="form-control"
                                                                            placeholder=" كلمة المرور القديمة">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> كلمة المرور الجديدة</label>
                                                                        <input name="password" type="password" class="form-control"
                                                                            placeholder=" كلمة المرور الجديدة">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> تأكيد كلمة المرور </label>
                                                                        <input name="password_confirmation" type="password" class="form-control"
                                                                            placeholder=" تأكيد كلمة المرور">
                                                                    </div>
                                                                    @endguest

                                                                    @guest
                                                                    <div class="row mb-4">
                                                                        <div class="col">
                                                                            <a href="/password/reset">نسيت كلمة المرور ؟</a>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Submit button -->
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">دخول</button>

                                                                    <!-- Register buttons -->
                                                                    <div class="text-center ">
                                                                        <p>الست عضو ! <a id="profile-tab" aria-controls="profile" data-toggle="tab" href="#reg">انشاء حساب</a></p>
                                                                        <p class="social">او سجل دخول لك عن طريق:</p>
                                                                        <br>
                                                                        <button type="button"
                                                                            class="btn btn-main btn-floating mx-1">
                                                                            <i class="fab fa-facebook-f"></i>
                                                                        </button>

                                                                        <button type="button"
                                                                            class="btn btn-main btn-floating mx-1">
                                                                            <i class="fab fa-google"></i>
                                                                        </button>

                                                                    </div>
                                                                    @else
                                                                    <!-- Submit button -->
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">تحديث</button>
                                                                    @endguest


                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="tab-pane" id="reg" role="tabpanel" aria-labelledby="profile-tab">
                                            <section class="login00 ">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="log">
                                                                <form action="/register" method="POST" class="login">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="form-name"> الاسم</label>
                                                                        <input name="name" type="text" class="form-control"
                                                                            placeholder=" الاسم ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> كلمة المرور</label>
                                                                        <input name="password" type="password" class="form-control"
                                                                            placeholder=" كلمة المرور">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> كلمة المرور</label>
                                                                        <input name="password_confirmation" type="password" class="form-control"
                                                                            placeholder=" تأكيد كلمة المرور">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name"> الموافقة علي الشروط والأحكام</label>
                                                                        <input name="confirm" type="checkbox" class="form-control" />
                                                                    </div>


                                                                    <!-- Submit button -->
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">دخول</button>

                                                                    <!-- Register buttons -->
                                                                    <div class="text-center ">
                                                                        <p>الست عضو ! <a href="/register">انشاء حساب</a></p>
                                                                        <p class="social">او سجل دخول لك عن طريق:</p>
                                                                        <br>
                                                                        <button type="button"
                                                                            class="btn btn-main btn-floating mx-1">
                                                                            <i class="fab fa-facebook-f"></i>
                                                                        </button>

                                                                        <button type="button"
                                                                            class="btn btn-main btn-floating mx-1">
                                                                            <i class="fab fa-google"></i>
                                                                        </button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                    </div>
                                    <!--END NEW TAB-->

                                </div>
                                <div class="modal-footer" style="display: block;">
                                    <button type="button" class="btn btn-danger close0" data-dismiss="modal" style="float: left;">اغلاق</button>
                                    
                                    @guest
                                    @else
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="float: right;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" >تسجيل الخروج</button>
                                    </form>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODEL-->
                    <!-- start model-->
                    <!-- Modal -->
                    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <section class="login00">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="title-section mb-4 py-3">
                                                        <h3> انشاء حساب جديد </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="log">
                                                        <form saasdasd>
                                                            <div class="form-group">
                                                                <label for="form-name"> الاسم</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder=" الاسم ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="form-name">البريد الالكترونى</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="البريد الالكترونى">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="form-name"> كلمة المرور</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder=" كلمة المرور">
                                                            </div>


                                                            <!-- Submit button -->
                                                            <button type="submit"
                                                                class="btn btn-main btn-block mb-4">دخول</button>

                                                            <!-- Register buttons -->
                                                            <div class="text-center ">
                                                                <p>الست عضو ! <a href="/register">انشاء حساب</a></p>
                                                                <p class="social">او سجل دخول لك عن طريق:</p>
                                                                <br>
                                                                <button type="button"
                                                                    class="btn btn-main btn-floating mx-1">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </button>

                                                                <button type="button"
                                                                    class="btn btn-main btn-floating mx-1">
                                                                    <i class="fab fa-google"></i>
                                                                </button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- start footer-->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END MODEL-->
                    <!-- Modal -->
                    <div class="modal fade" id="tran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> انضم الينا</h5>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    <!--START login  SECTION-->
                                    <section class="login00 joinus">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                                href="#home" role="tab" aria-controls="home"
                                                                aria-selected="true">مدرب</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                                href="#profile" role="tab" aria-controls="profile"
                                                                aria-selected="false">مستشار</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="messages-tab" data-toggle="tab"
                                                                href="#messages" role="tab" aria-controls="messages"
                                                                aria-selected="false">شريك نجاح</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="settings-tab" data-toggle="tab"
                                                                href="#settings" role="tab" aria-controls="settings"
                                                                aria-selected="false">موظف</a>
                                                        </li>
                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="home" role="tabpanel"
                                                            aria-labelledby="home-tab">
                                                            <div class="log">
                                                                <form action="/coache" method="POST" class="ajax" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="form-name"> الاسم</label>
                                                                        <input name="name" type="text" class="form-control"
                                                                            placeholder=" اسم المدرب ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name"> المجال التدريبى </label>
                                                                        <input name="field_of_training" type="text" class="form-control"
                                                                            placeholder=" المجال التدريبى ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>

                                                                    <!--
                                                                        <div class="form-group" >
                                                                        <label for="form-name"> كلمة المرور</label>
                                                                        <input name="password" type="password" class="form-control"
                                                                            placeholder=" كلمة المرور">
                                                                        </div>
                                                                    -->

                                                                    <div class="form-group">
                                                                        <label for="form-name"> السيرة الذاتية</label>
                                                                        <input type="file" name="curriculum_vitae" class="form-control"
                                                                            placeholder=" سيرتك الذتية">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">ارسل</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="profile" role="tabpanel"
                                                            aria-labelledby="profile-tab">
                                                            <div class="log">
                                                                <form action="/advisor" method="POST" class="ajax" enctype="multipart/form-data">
                                                                @csrf
                                                                    <div class="form-group">
                                                                        <label for="form-name"> اسم المستشار</label>
                                                                        <input name="name" type="text" class="form-control"
                                                                            placeholder=" اسم المستشار ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name">المجال الاستشاري </label>
                                                                        <input name="The_consulting_field" type="text" class="form-control"
                                                                            placeholder=" المجال الاستشاري ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name"> السيرة الذاتية</label>
                                                                        <input name="curriculum_vitae" type="file" class="form-control"
                                                                            placeholder=" سيرتك الذتية">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">ارسل</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="messages" role="tabpanel"
                                                            aria-labelledby="messages-tab">
                                                            <div class="log">
                                                                <form action="/partner" method="POST" class="ajax" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="form-name"> الاسم</label>
                                                                        <input name="name" type="text" class="form-control"
                                                                            placeholder=" الاسم ">
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="form-name">اسم الشركة</label>
                                                                        <input name="company_name" type="text" class="form-control"
                                                                            placeholder=" اسم الشركة ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name"> المسمى الوظيفى</label>
                                                                        <input name="job_title" type="text" class="form-control"
                                                                            placeholder=" الوظيفة ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name"> الملف التعريفى للشركة</label>
                                                                        <input name="company_profile" type="file" class="form-control"
                                                                            placeholder=" ملف الشركة ">
                                                                    </div>
                                                                    <!-- Submit button -->
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">حفظ</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="settings" role="tabpanel"
                                                            aria-labelledby="settings-tab">
                                                            <div class="log">
                                                                <form  action="/employee" method="POST" class="ajax" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="form-name"> الاسم</label>
                                                                        <input name="name" type="text" class="form-control"
                                                                            placeholder=" الاسم ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name"> المسمى الوظيفى</label>
                                                                        <input name="job_title" type="text" class="form-control"
                                                                            placeholder=" الاسم ">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name">البريد الالكترونى</label>
                                                                        <input name="email" type="email" class="form-control"
                                                                            placeholder="البريد الالكترونى">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="form-name"> السيرة الذاتية</label>
                                                                        <input name="curriculum_vitae" type="file" class="form-control"
                                                                            placeholder=" سيرتك الذتية">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-main btn-block mb-4">ارسل</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- start footer-->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger close0" data-dismiss="modal">اغلاق</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tran2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">مشاهدة الفيديو</h5>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    <!--START login  SECTION-->
                                    <section class="login00 joinus">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <video style="width: 100%;" controlsList="nodownload" src="" id="videoplayer" controls></video>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- start footer-->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger close0" data-dismiss="modal">اغلاق</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END MODEL-->

                    <!-- END MODEL-->
                    <div class="socail">
                        <ul class="media">
                            
                            @guest
                            <li><a href="register.html" data-toggle="modal" data-target="#exampleModal">تسجيل الدخول
                            </a> </li>
                            <li> <a href="login.html" data-toggle="modal" data-target="#exampleModal">دخول </a>
                            </li>
                            @else
                            <li>
                            <a href="register.html" data-toggle="modal" data-target="#exampleModal">{{ Auth::user()->name }}</a> 
                            </li>
                            @endguest

                            <li><a href="#"></a></li>
                            <li><a target="new" href="{{ setting('site.youtube') }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a target="new" href="{{ setting('site.instagram') }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a target="new" href="{{ setting('site.twitter') }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="new" href="{{ setting('site.facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="/search"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6  col-xs-6">
                    <div class="us">
                        <div class="develop">
                            {{ setting('site.emails') }}
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="phone">
                            {{ setting('site.phones') }}
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="fixed-cart">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle relative" href="/cart" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class=" fas fa-shopping-cart"></i>
                                    @guest
                                    @else
                                    <span class="span_cart">
                                        {{ auth()->user()->carts->count() }}
                                    </span>
                                    @endguest
                                    
                                </a>
                                
                                <!-- <a href ="cart.html" data-toggle="modal" data-target="#cart-us">سلة  </a> -->
                                <!-- start model-->
                                <!-- Modal -->
                                <div class="modal fade" id="cart-us" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--START login  SECTION-->
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="title-section">
                                                                <h3> سلة مشترياتك </h3>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="cart">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">المنتج</th>
                                                                            <th scope="col">الكمية</th>
                                                                            <th scope="col">السعر</th>
                                                                            <th scope="col">السعر الاجمالى</th>
                                                                            <th scope="col">الصورة</th>
                                                                            <th scope="col">حذف</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Mark</td>
                                                                            <td>Otto</td>
                                                                            <td><input type="number" value="1"></td>
                                                                            <td>Otto</td>
                                                                            <td>@mdo</td>

                                                                            <td><i class="fa fa-times"></i></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Jacob</td>
                                                                            <td>Thornton</td>
                                                                            <td><input type="number" value="1"></td>
                                                                            <td>@fat</td>
                                                                            <td>Thornton</td>
                                                                            <td><i class="fa fa-times"></i></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Larry</td>
                                                                            <td>the Bird</td>
                                                                            <td><input type="number" value="1"></td>
                                                                            <td>@fat</td>
                                                                            <td>Thornton</td>
                                                                            <td><i class="fa fa-times"></i></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="applay">
                                                                <button class="btn btn-main">اتمام الشراء</button>
                                                                <button class="btn btn-danger">حذف كل المشتريات</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- start footer-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/cart"> سلة المشتريات </a>
                                </div>
                            </div>
                            <div class="whatsapp">
                                <a target="new" href="https://wa.me/{{ setting('site.whatsapp') }}"><img src="{{ asset('assets/img/whatsapp.png') }}" alt="#"></a>
                            </div>
                        </div>

                        <!--
                  
              -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END TOP NAVBAR DIV  -->
    <!--START HEADER   SECTION-->
    <header>
        <!--START NAVBAR SECTION-->
        <nav class="navbar navbar-expand-lg  ">
            <div class="container">
                <a class="navbar-brand" href="/" style="padding: 0px 0;">
                    <img src="{{ asset('assets/img/logo.jpg') }}" style="height: 48px; object-fit: contain; width: auto;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mc-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">الرئيسية <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            @php
                                $about = App\Page::find(1)->title;
                                $conditions = App\Page::find(3)->title;
                            @endphp
                            <a class="nav-link" href="/page/{{ $about }}">{{ $about }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                كل الخدمات
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/programs">برامج ندريبيه</a>
                                <a class="dropdown-item" href="/bags">حقائب</a>
                                <a class="dropdown-item" href="/studies">دراسات جدوى</a>
                                <a class="dropdown-item" href="/products">منتجات</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/privacy">سياسة الخصوصية </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">اتصل بنا </a>
                        </li>
                    </ul>
                    


                    <a href="/notifications"><button class="btn btnJoin evalu ">إشعارات
                        @if (notification() > 0)
                        <span>{{ notification() }}</span>
                        @endif
                    </button>
                </a>


                    
                    <button class="btn btnJoin " data-toggle="modal" data-target="#tran">انضم الينا </button>
                </div>
            </div>
        </nav>


        <!--END NAVBAR SECTION-->
        @yield('slidshow')
    </header>
    <!-- END HEADER  SECTIOn-->
    @yield('content')
    <!-- start footer-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="info text-justify">
                        <h2>{{ setting('site.title') }}</h2>
                        <p>{{ setting('site.about_us') }}</p>
                        <ul>
                            <li><a target="new" href="{{ setting('site.youtube') }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a target="new" href="{{ setting('site.instagram') }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a target="new" href="{{ setting('site.twitter') }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="new" href="{{ setting('site.facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="quick">
                        <h4>روابط سريعة</h4>
                        <ul class="links">
                            <li><a href="/order_study">أطلب دراسة جدوي</a></li>
                            <li><a href="/programs">برامج تدريبية</a></li>
                            <li> <a href="/studies">دراسات الجدوي </a></li>
                            <li><a href="/bags">حقائب تدريبية </a></li>
                            <li><a href="/products"> المنتجات</a></li>
                            <li><a href="/privacy"> سياسة الخصوصية</a></li>
                            <li><a href="/page/{{ $about }}">{{ $about }}</a></li>
                            <li><a href="/page/{{ $conditions }}">{{ $conditions }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="q-add tex-justify">
                        <h4>تواصل معنا</h4>
                        <div class="med-items">
                            <div class="med-img">
                                <i class="fas fa-phone-alt "></i>
                            </div>
                            <div class="med-title">
                                <p>{{ setting('site.phones') }}</p>
                            </div>
                        </div>
                        <div class="med-items">
                            <div class="med-img">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="med-title">
                                <pre>{{ setting('site.emails') }}</pre>
                            </div>
                        </div>
                        <div class="med-items">
                            <div class="med-img">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="med-title">
                                <p>{{ setting('site.address') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="visa text-center">
                        <li><img src="{{ asset('assets/img/paypal.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/img/bank.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/img/mastercard.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/img/visa (2).png') }}" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <h6>{{ setting('site.copyrights') }}</h6>
        </div>
        <div class="scroll" id="scroll" style="display: flex;">
            <a href="#" class="scrollup"><i class="fa fa-arrow-up"></i></a>
        </div>
    </footer>
    <!-- end footer-->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/ajax.form.js') }}"></script>
    @yield('script')
    @include('layouts.script')
    

</body>

</html>