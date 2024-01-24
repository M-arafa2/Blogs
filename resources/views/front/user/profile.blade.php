@extends('front.layouts.front')
@section('content')
@php
$user = auth()->user();
@endphp
<section class="section profile-section py-4">
    <div class="container-md">
        <div class="text-center">
            @if ($user->image)
            <img src="{{ asset('images/user/' . $user->image) }}" alt="" class="img-user">
            @else
            <img src="{{ asset('admin-assets/img/no-image.jpeg') }}" class="img-user" alt="">
            @endif
            <div class="name-user">
                {{ $user->name }}
            </div>
        </div>
        <div class="row g-4 mb-5">
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
                    <label class="title main-color"><i class="bx bx-user fs-14px"></i> العمر</label>
                    <div class="title-inp">
                        <input type="text" readonly name="" id="" value="{{ $user->age }}" class="inp-profile">
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
                        <input type="text" readonly name="" id="" value="{{ $user->language }}" class="inp-profile">
                    </div>
                </div>
            </div> --}}

        </div>
        <div class="btn-holder d-flex align-items-center justify-content-center flex-wrap gap-3">
            <a href="{{ route('user.editprofile') }}" class="main-btn lg-btn">تعديل المعلومات الشخصية</a>
            <button class="main-btn lg-btn bg-danger" data-bs-toggle="modal" data-bs-target="#delate"><i class='bx bx-trash'></i> حذف الحساب</button>
            <div class="modal fade" id="delate" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف الحساب</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('profile.delete.account') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                هل أنت متأكد من حذف الحساب ؟
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-primary btn-sm px-3">نعم</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
