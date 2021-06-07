@extends('app')

@section('content')

<section class="login00 section gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h3> إستعادة كلمة المرور </h3>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="log">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <!-- Email input -->

                        <div class="form-group">
                            <label for="form-name">البريد الالكترونى</label>
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكترونى" value="{{ $email ?? old('email') }}" required ="email" readonly>
                            @error('email')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="form-name">كلمة المرور</label>
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                            @error('password')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="form-name">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">
                            @error('password_confirmation')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <input type="submit" class="btn btn-main btn-block mb-4" value="تعديل كلمة المرور">

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start footer-->

@endsection
