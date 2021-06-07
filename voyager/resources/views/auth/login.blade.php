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
                    <form method="POST" action="{{ route('login') }}" class="login" >
                        @csrf
                        <!-- Email input -->

                        <div class="form-group">
                            <label for="form-name">البريد الالكترونى</label>
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكترونى">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="form-name"> كلمة السر</label>
                            <input type="password" name="password" class="form-control" placeholder=" كلمة السر">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label for="form-name" style="text-indent: 20px;">تذكر تسجيل الدخول</label>

                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">

                            <div class="col">
                                <!-- Simple link -->
                                <a href="/password/reset">نسيت كلمة المرور ؟</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-main btn-block mb-4">دخول</button>

                        <!-- Register buttons -->
                        <div class="text-center ">
                            <p>الست عضو ! <a href="/register">انشاء حساب</a></p>
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
