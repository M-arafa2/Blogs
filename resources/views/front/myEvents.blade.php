@extends('front.layouts.front')

@section('content')
    <section class=" section my-events-section  ">
        <div class="container-md ">
            <div class="text-center">
                <h2 class="lg-title mb-2">
                    مناسباتي
                </h2>
                <p class="mb-4">
                    إبداء التخطيط لمناسباتك بإختيار الأقسام التي تحتاجها ضمن الأقسام التي تحتاج ضمن قائمة أفضل مزودي خدمات
                    لتختار مايناسبك بكل سهولة
                </p>
            </div>
            <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
                <a href="#" class="main-btn-tap active">
                    المناسبات الجارية
                </a>
                <a href="#" class="main-btn-tap">
                    المناسبات المكتملة
                </a>
            </div>
            <div class="d-flex flex-column gap-3">
                <div class="box-border">
                    <div class="d-flex align-items-start gap-3 ">
                        <img src="{{ asset('front-assets/img/decorated.webp') }}" alt="" class="img-box">
                        <div class="text mb-3">
                            <div class="title mb-2 fs-6 fw-bold">
                                أسم المناسبة
                            </div>
                            <p class=mb-0>
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                            </p>
                        </div>
                    </div>
                    <div class="info d-flex align-items-center justify-content-between mb-3">
                        <div class="fs-6 d-flex align-items-center gap-1">
                            <i class="icon fas fa-list-ul"></i>
                            <span>
                                <b>الخدمات المطلوبة:</b>
                                10
                            </span>
                        </div>
                        <div class="fs-6 d-flex align-items-center gap-1">
                            <i class="icon fas fa-ticket"></i>
                            <span>
                                <b>العروض:</b>
                                10
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="main-btn">
                            عرض التفاصيل
                        </div>
                    </div>
                </div>
                <div class="box-border">
                    <div class="d-flex align-items-start gap-3 ">
                        <img src="{{ asset('front-assets/img/decorated.webp') }}" alt="" class="img-box">
                        <div class="text mb-3">
                            <div class="title mb-2 fs-6 fw-bold">
                                أسم المناسبة
                            </div>
                            <p class=mb-0>
                                لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                            </p>
                        </div>
                    </div>
                    <div class="info d-flex align-items-center justify-content-between mb-3">
                        <div class="fs-6 d-flex align-items-center gap-1">
                            <i class="icon fas fa-list-ul"></i>
                            <span>
                                <b>الخدمات المطلوبة:</b>
                                10
                            </span>
                        </div>
                        <div class="fs-6 d-flex align-items-center gap-1">
                            <i class="icon fas fa-ticket"></i>
                            <span>
                                <b>العروض:</b>
                                10
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="main-btn">
                            عرض التفاصيل
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="#" class="main-btn btn-yellow ">
                    <i class="fa-solid fa-circle-plus"></i>
                    إنشاء مناسبة
                </a>
            </div>
        </div>
    </section>
@endsection
