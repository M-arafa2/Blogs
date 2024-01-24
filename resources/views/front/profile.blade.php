@extends('front.layouts.front')
@section('content')
<section class="section profile-section py-4">
  <div class="container-md">
    <div class="text-center">
      @if (auth()->user()->photo)
      <img src="{{ asset('admin-assets/img/user/'.auth()->user()->photo) }}" alt="" class="img-user">
      @else
      <img src="{{ asset('admin-assets/img/no-image.jpeg') }}" class="img-user" alt="">
      @endif
      <div class="name-user">
        {{ auth()->user()->name }}
      </div>
    </div>
    <div class="row g-4 mb-5">
      <div class="col-12">
        <div class="inp-cus">
          <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i> الهاتف</label>
          <div class="title-inp">
            <input type="number" name="" id="" value="154821426584" class="inp-profile">
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="inp-cus">
          <label class="title main-color"><i class="bx bx-user fs-14px"></i> العمر</label>
          <div class="title-inp">
            <input type="text" name="" id="" value="سنه 29" class="inp-profile">
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="inp-cus">
          <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> الموقع</label>
          <div class="title-inp">
            <input type="text" name="" id="" value="الدمام , شارع الملك فيصل في المنطقة الثالثة" class="inp-profile">
          </div>
        </div>
      </div>
      {{-- <div class="col-12">
        <div class="inp-cus">
          <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> اللغة</label>
          <div class="title-inp">
            <input type="text" name="" id="" value="اللغة العربية" class="inp-profile">
          </div>
        </div>
      </div> --}}
      <div class="col-12">
        <div class="inp-cus">
          <label class="title main-color"><i class="fa-regular fa-clock fs-14px"></i> من</label>
          <div class="title-inp">
            <input type="date" name="" id="" class="inp-profile">
          </div>
        </div>
      </div>
    </div>
    <div class="btn-holder">
        <a href="{{ route('editProfile') }}" class="mx-auto main-btn lg-btn">تعديل المعلومات الشخصية</a>
    </div>
  </div>
</section>
@endsection
