<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>onboard</title>
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
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="splash-loader">
    <img src="{{ asset('front-assets/img/site-logo.png') }}" alt="logo">
    <div class="text">
      <p>يرجي الإنتظار...</p>
      <div class="loading-bar"></div>
    </div>
  </div>
  <div class="swiper onboard-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
          <div class="box-img">
            <a href="{{ route('login') }}" class="skip">تخطي</a>
            <img src="{{ asset('front-assets') }}/img/birthday-img.jpg" alt="">
           <div class="content-text">
             <p class="name">صمم حفلتك بنفسك</p>
             <span>كل ما تحتاجه  لتصميم حفلتك بنفسك وبكفائة ترضيك وبأسهل الطرق تجدها مع مراسيم</span>
           </div>
          </div>
      </div>
      <div class="swiper-slide">
          <div class="box-img">
          <a href="{{ route('login') }}" class="skip">تخطي</a>
            <img src="{{ asset('front-assets') }}/img/flower-img.jpg" alt="">
           <div class="content-text">
             <p class="name">صمم باقتك بنقسك</p>
             <span>جميع الخطوات سهلة و بسيطة وترضي طموحك</span>
           </div>
          </div>
      </div>
      <div class="swiper-slide">
          <div class="box-img">
            <img src="{{ asset('front-assets') }}/img/cake-img.jpg" alt="">
           <div class="content-text">
             <p class="name">صمم كيكتك بنفسك</p>
             <span>أجمل اللحظات التي لا تنسي بتصميم كيكتك بنفسك بأبسط الطرق وأسهلها</span>
           </div>
           <a href="{{ route('login') }}" class="close-btn">إنهاء</a>
          </div>
      </div>
    </div>
    <div class="swiper-button-next swiper-btn"><i class="fa-solid fa-arrow-right-long"></i> التالي</div>
    <div class="swiper-pagination won-pagination"></div>
  </div>

  <!-- Bootstrap Framework Js File -->
  <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
  <!-- FontAwesome Library Js File -->
  <script src="{{ asset('front-assets/js/all.min.js') }}"></script>
  <!-- swiper Library Js File -->
  <script src="{{ asset('front-assets/js/swiper-bundle.min.js') }}"></script>
  <!-- Main Js File -->
  <script src="{{ asset('front-assets/js/main.js') }}"></script>
</body>

</html>
