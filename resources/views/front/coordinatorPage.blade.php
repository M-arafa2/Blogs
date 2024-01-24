@extends('front.layouts.front')
@section('content')
<section class="section">
    <div class="container-md">
        <div class="profile-stor-box mb-4">
            <div class="stor-cover">
                <img src="{{ asset('front-assets') }}/img/login-slide3.jpg" alt="">
            </div>
            <div class="box-data">
                <div class="title">
                    اسم المنسق
                </div>
                <p class="mb-2">
                    الدمامو شارع الملك فيصل المنطقة الثالثة
                </p>
                <p class="mb-2 d-flex align-items-center justify-content-between gap-3">
                    <span>
                        مفتوح 8:00 - 12:00
                    </span>
                    <span>
                        تزين-أفراح-أعراس
                    </span>
                </p>
                <p class="mb-2 d-flex align-items-stretch justify-content-center gap-2">
                    <span>
                        65$ - 35
                        <i class="fa-solid fa-wallet icon"></i>
                    </span>
                    <span class="bar"></span>
                    <span>
                        4.2
                        <i class="fa-solid fa-star icon"></i>
                    </span>
                </p>
                <div class="d-flex justify-content-center">
                    <a href="" class="main-btn">
                        <i class="fa-regular fa-paper-plane"></i>
                        للتواصل
                    </a>
                </div>
            </div>
        </div>
            <h6>
                المنتجات:
            </h6>
                <div class="d-flex flex-column mt-2">
                    <div class="box-add-product d-flex align-items-center justify-content-between ">
                        <a href="{{ route('productPage') }}" class="data d-flex align-items-center gap-3 flex-fill">
                                <img src="{{ asset('front-assets') }}/img/login-slide3.jpg" alt="" class="img">
                            <div class="d-flex flex-column gap-1">
                                <div class="title">
                                    باقة ورد
                                </div>
                                <div class="info">
                                    أعراس,تنسيق
                                </div>
                                <div>
                                <i class="fa-solid fa-wallet icon me-1"></i>
                                25$
                                </div>
                            </div>
                        </a>
                        <div class="btns-quantity">
                            <button class="less btn-card">-</button>
                            <span>0</span>
                            <button class="add btn-card">+</button>
                        </div>
                    </div>
                    <div class="box-add-product d-flex align-items-center justify-content-between ">
                        <a href="{{ route('productPage') }}" class="data d-flex align-items-center gap-3 flex-fill">
                                <img src="{{ asset('front-assets') }}/img/login-slide1.jpg" alt="" class="img">
                            <div class="d-flex flex-column gap-1">
                                <div class="title">
                                    باقة ورد
                                </div>
                                <div class="info">
                                    أعراس,تنسيق
                                </div>
                                <div>
                                <i class="fa-solid fa-wallet icon me-1"></i>
                                25$
                                </div>
                            </div>
                        </a>
                        <div class="btns-quantity">
                            <button class="less btn-card">-</button>
                            <span>0</span>
                            <button class="add btn-card">+</button>
                        </div>
                    </div>
                    <div class="box-add-product d-flex align-items-center justify-content-between ">
                        <a href="{{ route('productPage') }}" class="data d-flex align-items-center gap-3 flex-fill">
                                <img src="{{ asset('front-assets') }}/img/login-slide2.jpg" alt="" class="img">
                            <div class="d-flex flex-column gap-1">
                                <div class="title">
                                    باقة ورد
                                </div>
                                <div class="info">
                                    أعراس,تنسيق
                                </div>
                                <div>
                                <i class="fa-solid fa-wallet icon me-1"></i>
                                25$
                                </div>
                            </div>
                        </a>
                        <div class="btns-quantity">
                            <button class="less btn-card">-</button>
                            <span>0</span>
                            <button class="add btn-card">+</button>
                        </div>
                    </div>
                    <div class="box-add-product d-flex align-items-center justify-content-between ">
                        <a href="{{ route('productPage') }}" class="data d-flex align-items-center gap-3 flex-fill">
                                <img src="{{ asset('front-assets') }}/img/login-slide4.jpg" alt="" class="img">
                            <div class="d-flex flex-column gap-1">
                                <div class="title">
                                    باقة ورد
                                </div>
                                <div class="info">
                                    أعراس,تنسيق
                                </div>
                                <div>
                                <i class="fa-solid fa-wallet icon me-1"></i>
                                25$
                                </div>
                            </div>
                        </a>
                        <div class="btns-quantity">
                            <button class="less btn-card">-</button>
                            <span>0</span>
                            <button class="add btn-card">+</button>
                        </div>
                    </div>
                </div>
    </div>
</section>
@endsection
