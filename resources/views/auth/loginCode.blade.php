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

    @stack('css')
</head>

<body>
    <section class="login-section py-4">
        <div class="container-md">
            <div class="row g-4">
                <div class="col-12 mb-4">
                    <div class="img-holder">
                        <img src="{{ asset('front-assets/img/site-logo.png') }}" alt="site logo">
                    </div>
                </div>
                <form action="{{route('verify_code')}}" method="post" class="login-form col-12">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12 mb-4">
                            <input type="hidden" name="userId" value="{{request()->get('hash')}}">

                            <div class="inp-holder">
                                <label for="confirm" class="login-label mb-1">رمز التأكيد</label>
                                <div class="holder">
                                    <input type="password" name="otp" id="confirm">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="btn-holder">
                                <button class="login-btn w-100">تاكيد الرمز</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-text mt-3">
                                <p>
                                    لم يتم إرسال الرمز؟
                                    <a href="#" class="">إعادة الأرسال</a>
                                </p>
                            </div>
                        </div>
                    </div>
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
