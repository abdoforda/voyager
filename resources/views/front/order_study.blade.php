@extends('app')
@section('title')طلب دراسة جدوى@endsection
@section('content')
<!--START login  SECTION-->
<section class="login section gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h3> اطلب دراسة جدوى </h3>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="log">
                    <form action="/order_study" method="POST" class="ajax">
                        @csrf
                        <div class="form-group">
                            <label for="form-name"> الاسم</label>
                            <input type="text" name="name" required class="form-control" placeholder=" الاسم">
                        </div>

                        <div class="form-group">
                            <label for="form-name"> الجوال</label>
                            <input type="text" name="phone" required class="form-control" placeholder=" الجوال">
                        </div>

                        <div class="form-group">
                            <label for="form-name"> الدولة</label>
                            <input type="text" name="country" required class="form-control" placeholder=" الدولة">
                        </div>

                        <div class="form-group">
                            <label for="form-name"> البريد الالكترونى</label>
                            <input type="text" name="email" required class="form-control" placeholder=" البريد الالكترونى">
                        </div>

                        <div class="form-group">
                            <label for="form-name">الدراسة المطلوبة</label>
                            <select name="type" class="form-control" required>
                                <option value="">إختر الدراسة المطلوبة</option>
                                <option value="تسويقية">تسويقية</option>
                                <option value="فنية">فنية</option>
                                <option value="مالية">مالية</option>
                                <option value="متكاملة">متكاملة</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="form-name"> الجهة المقدم لها الدراسة</label>
                            <input type="text" name="entity" required class="form-control" placeholder="الجهة المقدم لها الدراسة">
                        </div>

                        <div class="form-group">
                            <label for="form-name"> نبذه مختصرة عن المشروع</label>
                            <textarea name="project" class="form-control" placeholder="الجهة المقدم لها الدراسة" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-main btn-block mb-4">إرسال</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start footer-->
@endsection