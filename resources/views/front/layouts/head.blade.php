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
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
         rel="stylesheet" />
     <link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/img/settings/' . setting('site_icon')) }}" />

     <script src="{{ asset('front-assets/js/axios.js') }}"></script>
     <script src="{{ asset('front-assets/vue/vue.js') }}"></script>
     @stack('css')
     @livewireStyles
 </head>

 <body>
     <div class="splash-loader">
         <img src="{{ asset('front-assets/img/site-logo.png') }}" alt="logo">
         <div class="text">
             <p>يرجي الإنتظار...</p>
             <div class="loading-bar"></div>
         </div>
     </div>
