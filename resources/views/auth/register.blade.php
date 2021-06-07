@extends('app')

@section('content')

<section class="login00 section gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h3> تسجيل دخول </h3>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="log">
                    <form action="/register" method="POST" class="login">
                        
                        @csrf
                        <div class="form-group">
                            <label for="form-name"> الاسم</label>
                            <input name="name" type="text" class="form-control" placeholder=" الاسم ">
                        </div>
                        <div class="form-group">
                            <label for="form-name">البريد الالكترونى</label>
                            <input name="email" type="email" class="form-control" placeholder="البريد الالكترونى">
                        </div>

                        <div class="form-group">
                            <label for="form-name"> كلمة المرور</label>
                            <input name="password" type="password" class="form-control" placeholder=" كلمة المرور">
                        </div>

                        <div class="form-group">
                            <label for="form-name"> كلمة المرور</label>
                            <input name="password_confirmation" type="password" class="form-control" placeholder=" تأكيد كلمة المرور">
                        </div>

                        <div class="form-group">
                            <label for="form-name">
                                
                                <input name="confirm" type="checkbox" class="form-control" style='display: table; width: 20px; float: right; height: 20px; margin-left: 8px;' />
                                
                                 الموافقة علي <a href="/page/الشروط%20والأحكام">الشروط والأحكام</a></label>
                            
                        </div>


                        <!-- Submit button -->
                        <button type="submit" class="btn btn-main btn-block mb-4">دخول</button>

                        <!-- Register buttons -->
                        <div class="text-center ">
                            <p class="social">او سجل دخول لك عن طريق:</p>
                            <br>
                            <button type="button" class="btn btn-main btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-main btn-floating mx-1">
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

@endsection
