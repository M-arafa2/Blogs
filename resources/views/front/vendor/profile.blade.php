@extends('front.layouts.front')
@section('content')
@php
$user = auth()->user();
@endphp
<section class="section profile-section py-4">
    <div class="container-md">
        <div class="text-center">
            @if ($user->image)
            <img src="{{ asset('images/vendor/'.$user->image) }}" alt="" class="img-user">
            @else
            <img src="{{ asset('admin-assets/img/no-image.jpeg') }}" class="img-user" alt="">
            @endif
            <div class="name-user">
                {{ $user->name }}
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i>
                        الهاتف</label>
                    <div class="title-inp">
                        <input type="number" readonly name="" id="" value="{{ $user->phone }}" class="inp-profile">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> الموقع</label>
                    <div class="title-inp">
                        <input type="text" name="" readonly id="" value="{{ $user->location }}" class="inp-profile">
                    </div>
                </div>
            </div>
            {{-- <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> اللغة</label>
                    <div class="title-inp">
                        <input type="text" name="" readonly id="" value="{{ $user->language }}" class="inp-profile">
                    </div>
                </div>
            </div> --}}
            <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color"><i class="bx bx-user fs-14px"></i> العمر</label>
                    <div class="title-inp">
                        <input type="number" readonly name="" id="" value="{{ $user->age }}" class="inp-profile">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color"> من</label>
                    <div class="title-inp">
                        <input type="time" name="" readonly value="{{ $user->from }}" id="" class="inp-profile">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color"> الي</label>
                    <div class="title-inp">
                        <input type="time" readonly value="{{ $user->to }}" name="" id="" class="inp-profile">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="inp-cus">
                    <label class="title main-color d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa-solid fa-bars-progress fs-14px"></i> الخدمات التي تقدمها
                        </div>
                        <span><span class="  fw-semibold">مثال:-</span> تزين - أفراح -أعياد ميلاد</span>
                    </label>
                    <div class="title-inp">
                        <input readonly type="text" name="" id="" value="{{ $user->service }}" class="inp-profile">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <a href="{{ url('vendor/profile/edit') }}" class="mx-auto main-btn lg-btn">تعديل المعلومات الشخصية</a>
            </div>
        </div>
    </div>
</section>
@endsection
