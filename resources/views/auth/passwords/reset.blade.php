@extends('front.layouts.front')

@section('content')
 
    <section class="section login-section  py-3">
        <div class="container-md text-center">
            <div class="md-title">
                إعادة تعيين كلمة المرور
            </div>
            <div class="mb-4 d-block">
                سوف يتم إرسال كود التحقق الي رقم الهاتف الخاص بك
            </div>
            <form method="POST" action="{{ route('password.update') }}"
                class="d-flex align-items-center flex-column gap-4">

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="main-inp">
                    <i class="icon fas fa-envelope"></i>
                    <input type="text" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                        autofocus placeholder=" الإيميل أو رقم الهاتف">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="main-inp">
                    <i class="icon fas fa-lock"></i>
                    <input type="password" name="password" required autocomplete="new-password" placeholder="كلمة المرور">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <button type="submit" class="main-btn px-4 my-2">
                    إرسال
                </button>
                <a href="login.html" class="">
                    العودة إلي صفحة تسجيل الدخول
                </a>
            </form>
        </div>
    </section>

@endsection
