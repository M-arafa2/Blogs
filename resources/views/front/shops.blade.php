@extends('front.layouts.front')
@section('content')
<section class="section">
    <div class="container-md">
        <div class="head-section d-flex align-items-center justify-content-end mb-4">

            <button class="btn-sliders" data-bs-toggle="modal" data-bs-target="#rateModal">
                التصنيف الافتراضي
                <i class="fas fa-angle-down icon"></i>
            </button>
            <!-- Rate Modal -->
            <div class="modal fade filter-modal" id="rateModal" aria-labelledby="rateModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="title text-center mb-4 mt-2">
                                التصنيف
                            </div>
                            <div class="title mb-2">
                                الأنواع
                            </div>
                            <div class="swiper mySwiper categories-swiper mb-4">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="category-box active">
                                                <div class="icon-holder"><i class='bx bx-detail'></i></div>
                                                <p>الكل</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="category-box">
                                                <div class="icon-holder"><i class='bx bx-party'></i></div>
                                                <p>مناسبات</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="category-box">
                                                <div class="icon-holder"><i class='bx bx-cake'></i></div>
                                                <p>كيك وحلويات</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="category-box">
                                                <div class="icon-holder"><i class='bx bx-gift'></i></div>
                                                <p>هدايا</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="category-box">
                                                <div class="icon-holder"><i class="fa-solid fa-cake-candles"></i></div>
                                                <p>أعياد ميلاد</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <div class="category-box">
                                                <div class="icon-holder"><i class='bx bx-store-alt'></i></div>
                                                <p>ماركة</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title mb-2">
                                إختر النوع
                            </div>
                            <div class="row  g-1 mb-4">
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الأول
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الثاني
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الثالت
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الرابع
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الخامس
                                </div>
                            </div>
                            <div class="title mb-2">
                                إختر النوع
                            </div>
                            <div class="row  g-1 mb-4">
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الأول
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الثاني
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الثالت
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الرابع
                                </div>
                                <div class="col-4 d-flex align-items-center gap-2">
                                    <input type="radio" class="" name="" id="">
                                    النوع الخامس
                                </div>
                            </div>
                            <div class="d-flex gap-1 flex-column align-items-center">
                                <button class="main-btn px-5">
                                    تأكيد
                                </button>
                                <button type="button" class="btn" data-bs-dismiss="modal">
                                    إلغاء
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column gap-4 mb-4">
            <div class="box-offer">
                <a href="{{ route('coordinatorPage') }}" class="header-box">
                    <div class="d-flex justify-content-end">
                        <div class="box-star">
                            <i class="icon fas fa-star"></i>
                            4.2
                        </div>
                    </div>
                    <div class="badge-header">
                    65$ - 35
                            <i class="fa-solid fa-wallet ms-1"></i>
                    </div>
                    <img src="{{ asset('front-assets') }}/img/login-slide1.jpg" alt="" class="bg-img">
                </a>
                <div class="content d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 fw-bold">اسم المنسق</h6>
                            <div class="old-price d-flex align-items-center">
                                تنسق مناسبات-كيك
                            </div>
                        </div>
                        <a href="#" class="add-favorite">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                </div>
            </div>
            <div class="box-offer">
                <a href="{{ route('coordinatorPage') }}" class="header-box">
                    <div class="d-flex justify-content-end">
                        <div class="box-star">
                            <i class="icon fas fa-star"></i>
                            4.2
                        </div>
                    </div>
                    <div class="badge-header">
                    65$ - 35
                            <i class="fa-solid fa-wallet ms-1"></i>
                    </div>
                    <img src="{{ asset('front-assets') }}/img/stor-img.jpg" alt="" class="bg-img">
                </a>
                <div class="content d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 fw-bold">اسم المنسق</h6>
                            <div class="old-price d-flex align-items-center">
                                تنسق مناسبات-كيك
                            </div>
                        </div>
                        <a href="#" class="add-favorite">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                </div>
            </div>
            <div class="box-offer">
                <a href="{{ route('coordinatorPage') }}" class="header-box">
                    <div class="d-flex justify-content-end">
                        <div class="box-star">
                            <i class="icon fas fa-star"></i>
                            4.2
                        </div>
                    </div>
                    <div class="badge-header">
                    65$ - 35
                            <i class="fa-solid fa-wallet ms-1"></i>
                    </div>
                    <img src="{{ asset('front-assets') }}/img/stor-img2.png" alt="" class="bg-img">
                </a>
                <div class="content d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 fw-bold">اسم المنسق</h6>
                            <div class="old-price d-flex align-items-center">
                                تنسق مناسبات-كيك
                            </div>
                        </div>
                        <a href="#" class="add-favorite">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                </div>
            </div>
            <div class="box-offer">
                <a href="{{ route('coordinatorPage') }}" class="header-box">
                    <div class="d-flex justify-content-end">
                        <div class="box-star">
                            <i class="icon fas fa-star"></i>
                            4.2
                        </div>
                    </div>
                    <div class="badge-header">
                    65$ - 35
                            <i class="fa-solid fa-wallet ms-1"></i>
                    </div>
                    <img src="{{ asset('front-assets') }}/img/login-slide4.jpg" alt="" class="bg-img">
                </a>
                <div class="content d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 fw-bold">اسم المنسق</h6>
                            <div class="old-price d-flex align-items-center">
                                تنسق مناسبات-كيك
                            </div>
                        </div>
                        <a href="#" class="add-favorite">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">السابق</a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link" href="#">04</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">التالي</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection
