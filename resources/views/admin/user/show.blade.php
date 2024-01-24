@extends('admin.layouts.admin')
@section('title', 'عرض عميل')
@section('content')
    <section class="show-user">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
                <li href="" class="breadcrumb-item" aria-current="page">
                    عرض عميل
                </li>
            </ol>
        </nav>
        <div class="content_view">
            <div class="row g-3">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="name" class="small-label">الاسم</label>
                    <input readonly type="text" value="{{ $user->name }}" name="name" class="form-control"
                        id="name">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="email" class="small-label">البريد الالكتروني</label>
                    <input type="text" readonly value="{{ $user->email }}" name="email" class="form-control"
                        id="email">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="phone" class="small-label">رقم الجوال</label>
                    <input type="text" readonly value="{{ $user->phone }}" name="phone" class="form-control"
                        id="phone">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="country" class="small-label">الدولة</label>
                    <input type="text" readonly value="{{ $user->country?->name }}" name="country" class="form-control"
                        id="country">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="city" class="small-label"> المدينة </label>
                    <input type="text" readonly value="{{ $user->city?->name }}" name="city" class="form-control"
                        id="city">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="city" class="small-label"> رقم وثيقة العمل الحر </label>
                    <input type="text" readonly value="{{ $user->freelance_document }}" name="freelance_document"
                        class="form-control" id="freelance_document">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label class="d-block small-label">صورة وثيقة العمل الحر </label>
                    @if ($user->freelance_image)
                        <img src="{{ display_file($user->freelance_image) }}" alt="{{ $user->name }}"
                            class="img-thumbnail img-preview" width="200px">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview"
                            width="100px">
                    @endif
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label class="d-block small-label">صوره </label>
                    @if ($user->image)
                        <img src="{{ asset('images/user/' . $user->image) }}" alt="{{ $user->name }}"
                            class="img-thumbnail img-preview" width="200px">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview"
                            width="100px">
                    @endif
                </div>
            </div>
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link active"data-bs-toggle="tab" data-bs-target="#nav-carts" type="button">
                        <div class="badge-count">{{ $user->carts->count() }}</div>
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
                    <a class="nav-link" href="#">
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
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="badge-count">0</div>
                        طلبات السحب
                        <i class="fa-regular fa-credit-card"></i>
                    </a>
                </li> --}}
            </ul>
            @include('admin.user.tabs.carts')

        </div>

    </section>
@endsection
