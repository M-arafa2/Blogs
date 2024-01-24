@extends('admin.layouts.admin')
@section('title', 'عرض مزود الخدمه')
@section('content')
<section class="show-user">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        عرض مزود الخدمه
      </li>
    </ol>
  </nav>
  <div class="content_view">
    <div class="row g-3">
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="name" class="small-label">الاسم</label>
        <input readonly type="text" value="{{ $vendor->name }}" name="name" class="form-control" id="name">
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="email" class="small-label">البريد الالكتروني</label>
        <input type="text" readonly value="{{ $vendor->email }}" name="email" class="form-control" id="email">
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="phone" class="small-label">رقم الجوال</label>
        <input type="text" readonly value="{{ $vendor->phone }}" name="phone" class="form-control" id="phone">
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="country" class="small-label">الدولة</label>
        <input type="text" readonly value="{{ $vendor->country?->name }}" name="country" class="form-control"
          id="country">
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="city" class="small-label"> المدينة </label>
        <input type="text" readonly value="{{ $vendor->city?->name }}" name="city" class="form-control" id="city">
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="department" class="small-label"> القسم</label>
        <input type="text" readonly value="{{ $vendor->department?->name }}" name="city" class="form-control"
          id="department">
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="" class="small-label">السجل التجارى</label>
        <input type="text" name="commercial_no" class="form-control" value="{{ $vendor->commercial_no }}" readonly>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="" class="small-label">السجل الضريبي</label>
        <input type="text" name="tax_id" class="form-control" value="{{ $vendor->tax_id }}" readonly>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="" class="small-label"> رقم توثيق المركز السعودي للأعمال</label>
        <input type="text" name="maarouf_link" class="form-control" value="{{ $vendor->maarouf_link }}" readonly>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <label for="" class="small-label">معلومات الحساب البنكي ايبان </label>
        <input type="text" name="bank" class="form-control" value="{{ $vendor->bank }}" readonly>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-6">
        <label for="" class="small-label">نبذة عن المتجر </label>
        <textarea name="desc" class="form-control" style="min-height: 70px;" readonly>{!! $vendor->desc !!}</textarea>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3">
        <label class="d-block small-label">صوره </label>
        @if ($vendor->image)
        <img src="{{ asset('images/vendor/' . $vendor->image) }}" alt="{{ $vendor->name }}"
          class="img-thumbnail img-preview" width="200px">
        @else
        <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
        @endif
      </div>
    </div>
    <ul class="nav nav-tabs mt-4">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-carts" type="button">
          <div class="badge-count">{{ $vendor->vendorCarts->count() }}</div>
          الطلبات
          <i class="fa-solid fa-cart-flatbed-suitcase icon"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="badge-count">0</div>
                        العروض
                        <i class="fa-solid fa-sheet-plastic"></i>
                    </a>
                </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-invoice" type="button">
          <div class="badge-count">0</div>
          الفواتير
          <i class="fa-solid fa-money-check-dollar"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="badge-count">0</div>
                        طلبات الشحن
                        <i class="fa-solid fa-credit-card"></i>
                    </a>
                </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="#">
          <div class="badge-count">0</div>
          طلبات السحب
          <i class="fa-regular fa-credit-card"></i>
        </a>
      </li>
    </ul>
    @include('admin.vendor.tabs.carts')
    @include('admin.vendor.tabs.invoice')
  </div>
</section>
@endsection
