@extends('admin.layouts.admin')
@section('title', 'عرض منتج')
@section('content')
    <section class="show-user">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
                <li href="" class="breadcrumb-item" aria-current="page">
                    عرض منتج
                </li>
            </ol>
        </nav>
        <div class="content_view">
            <div class="col-sm-6 col-md-4 col-lg-3">
                @if ($product->image)
                    <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-thumbnail" width="100px">
                @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $product->name }}" class="img-thumbnail"
                        width="100px">
                @endif
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                @if ($product->images)
                    @foreach ($product->images as $image)
                        <img src="{{ asset('images/product/' . $image->image) }}" alt="{{ $product->name }}"
                            class="img-thumbnail" width="100px">
                    @endforeach
                @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $product->name }}" class="img-thumbnail"
                        width="100px">
                @endif
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="name" class="small-label">اسم المنتج</label>
                <input readonly type="text" value="{{ $product->name }}" class="form-control">
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label class="small-label">القسم</label>
                <input type="text" readonly value="{{ $product->department?->name }}" class="form-control">
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label class="small-label">مزود الخدمه</label>
                <input type="text" readonly value="{{ $product->vendor?->name }}" class="form-control">
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="department" class="small-label"> السعر</label>
                <input type="text" readonly value="{{ $product->price }}" class="form-control">
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">وقت وتاريخ المناسبة</label>
                <input type="text" name="bank" class="form-control" value="{{ $product->leadtime }} يوم" readonly>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">خدمه التوصيل</label>
                <input type="text" name="bank" class="form-control" value="{{ $product->delivery() }}" readonly>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">هل يوجد تأمين مالي للمنتج ؟</label>
                <input type="text" name="bank" class="form-control" value="{{ $product->insurance() }}" readonly>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">مبلغ التأمين</label>
                <input type="text" name="bank" class="form-control" value="{{ $product->insurance_amount }}" readonly>
            </div>
        </div>
    </section>
@endsection
