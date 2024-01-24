<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title', setting('website_name')) </title>
    <!-- Bootstrap Framework Css File -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.rtl.min.css') }}" />
    <!--  Normalize Css File -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/normalize.css') }}" />
    <!--  swiper Css File -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/swiper-bundle.min.css') }}" />
    <!-- Main  Css File -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/main.css') }}" />
    <!-- Font Awesome Library File -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/all.min.css') }}" />
    <!-- Box Icon Library Css File Cdn -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google Fonts Cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/img/settings/' . setting('site_icon')) }}" />

    @stack('css')
</head>

<body>
    <section class="login-section py-5">
        <div class="container-md">
            <div class="row g-4">
                <div class="col-12 mb-3">
                    <div class="img-holder">
                        <img src="{{ asset('front-assets/img/site-logo.png') }}" alt="site logo">
                    </div>
                </div>
                <form action="{{ route('loginsms') }}" method="POST" class="login-form col-12">
                    @csrf
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }} -- برجاء المحاولة مرة اخري او اتصل بنا
                    </div>
                    @endif
                    <div class="row g-2">
                        <div class="col-12">
                            <div class="inp-holder">
                                <label for="phone" class="login-label mb-1">أدخل رقم الجوال</label>
                                <div class="holder">
                                    <img src="{{ asset('front-assets') }}/img/saudi-arabia.png" alt="">
                                    <input type="tel" name="phone" id="phone">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">--}}
                        {{-- <div class="inp-holder">--}}
                        {{-- <label for="phone" class="login-label mb-1">الباسورد</label>--}}
                        {{-- <div class="holder">--}}
                        {{-- <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" oninvalid="this.setCustomValidity('الباسورد مطلوب')" required autocomplete="current-password">--}}
                        {{-- @error('password')--}}
                        {{-- <span class="invalid-feedback" role="alert">--}}
                        {{-- <strong>{{ $message }}</strong>--}}
                        {{-- </span>--}}
                        {{-- @enderror--}}
                        {{-- </div>--}}
                        {{-- </div>--}}
                        {{-- </div>--}}
                        <div class="col-12">
                            <div class="btn-holder mb-3">
                                <button type="submit" class="login-btn w-100">إرسال الرمز للتأكيد</button>
                            </div>
                            <div class="custom-text">
                                <p class="mb-0"> ليس لديك حساب مسبقا؟ <a href="{{ route('register') }}" class="">إنشاء حساب</a></p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
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
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div> --}}
            </form>
        </div>
        </div>
    </section>
    @include('sweetalert::alert')
    <!-- Bootstrap Framework Js File -->
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FontAwesome Library Js File -->
    <script src="{{ asset('front-assets/js/all.min.js') }}"></script>
    <!-- swiper Library Js File -->
    <script src="{{ asset('front-assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('front-assets/js/main.js') }}"></script>
    @stack('js')
</body>

</html>
