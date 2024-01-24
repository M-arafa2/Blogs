@extends('front.layouts.front')
@section('content')
<section class="section">
  <div class="py-3">
    <div class="container-md">
    <h6 class="mb-3">
                المنتجات المتاحة:
            </h6>
      <!-- Swiper -->
      <div class="swiper mySwiper filters-swiper mb-4">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="#" class="btn-filter active">
              الكل
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
              أزهار
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
                حفلات
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
                زفاف
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
                قسم معين
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
              أزهار
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
                حفلات
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
                زفاف
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#" class="btn-filter">
                قسم معين
            </a>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column gap-4">
        <a href="{{ route('productPage') }}" class="box-add-product">
          <div class="data d-flex align-items-center gap-3">
            <img src="{{ asset('front-assets') }}/img/login-slide3.jpg" alt="" class="img">
            <div class="d-flex flex-column gap-1">
              <div class="title">
                باقة ورد
              </div>
              <div class="info">
                أعراس - تنسيق
              </div>
              <div class="mb-2 d-flex align-items-stretch justify-content-center gap-2">
                <span>
                  <i class="fa-solid fa-star icon"></i>
                  4.2
                </span>
                <span class="bar"></span>
                <span>
                  <i class="fa-solid fa-dollar-sign"></i> <span class="mx-1">999</span> ريال سعودي
                </span>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('productPage') }}" class="box-add-product">
          <div class="data d-flex align-items-center gap-3">
            <img src="{{ asset('front-assets') }}/img/login-slide2.jpg" alt="" class="img">
            <div class="d-flex flex-column gap-1">
              <div class="title">
                باقة ورد
              </div>
              <div class="info">
                أعراس - تنسيق
              </div>
              <div class="mb-2 d-flex align-items-stretch justify-content-center gap-2">
                <span>
                  <i class="fa-solid fa-star icon"></i>
                  4.2
                </span>
                <span class="bar"></span>
                <span>
                  <i class="fa-solid fa-dollar-sign"></i> <span class="mx-1">999</span> ريال سعودي
                </span>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('productPage') }}" class="box-add-product">
          <div class="data d-flex align-items-center gap-3">
            <img src="{{ asset('front-assets') }}/img/login-slide1.jpg" alt="" class="img">
            <div class="d-flex flex-column gap-1">
              <div class="title">
                باقة ورد
              </div>
              <div class="info">
                أعراس - تنسيق
              </div>
              <div class="mb-2 d-flex align-items-stretch justify-content-center gap-2">
                <span>
                  <i class="fa-solid fa-star icon"></i>
                  4.2
                </span>
                <span class="bar"></span>
                <span>
                  <i class="fa-solid fa-dollar-sign"></i> <span class="mx-1">999</span> ريال سعودي
                </span>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('productPage') }}" class="box-add-product">
          <div class="data d-flex align-items-center gap-3">
            <img src="{{ asset('front-assets') }}/img/birthday-img.jpg" alt="" class="img">
            <div class="d-flex flex-column gap-1">
              <div class="title">
                حفلة عيد ميلاد
              </div>
              <div class="info">
                أزهار - حفلات
              </div>
              <div class="mb-2 d-flex align-items-stretch justify-content-center gap-2">
                <span>
                  <i class="fa-solid fa-star icon"></i>
                  4.2
                </span>
                <span class="bar"></span>
                <span>
                  <i class="fa-solid fa-dollar-sign"></i> <span class="mx-1">999</span> ريال سعودي
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
