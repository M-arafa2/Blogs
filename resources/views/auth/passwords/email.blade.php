@extends('front.layouts.front')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <section class="section login-section  py-3">
        <div class="container-md text-center">
            <div class="md-title">
                إعادة تعيين كلمة المرور
            </div>
            <div class="mb-4 d-block">
                سوف يتم إرسال كود التحقق الي رقم الهاتف الخاص بك
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="d-flex align-items-center flex-column gap-4">

                @csrf

                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

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
                <a href="{{route('login')}}" class="">
                    العودة إلي صفحة تسجيل الدخول
                </a>
            </form>
        </div>
    </section>
@endsection
