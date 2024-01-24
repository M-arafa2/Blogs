@extends('admin.layouts.admin')
@section('title', 'إضافة إشعار ')
@section('content')
<section class="" id="app">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>

      <li href="" class="breadcrumb-item" aria-current="page">
        اضافة إشعار
      </li>
    </ol>
  </nav>
  <div class="content_view">
    <form action="{{ route('admin.notifications.store') }}" method="POST">
      <div class="row g-3">
        @csrf
        <div class="col-lg-6">
          <label class="mb-1" for="notification">اختيار مزود خدمه</label>
          <select name="vendor_id" id="" class="form-control">
            <option value="" readonly disabled selected>--اختر مزود خدمه--</option>
            @foreach($vendors as $vendor)
            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-12">
          <label class="mb-1" for="notification">الرسالة </label>
          <textarea name="notification" rows="6" id="notification" class="form-control"></textarea>
        </div>

        <div class="col-12 d-flex align-items-center justify-content-center ">
          <button type="submit" class="btn btn-success btn-sm px-4">حفظ</button>
        </div>
      </div>
    </form>
  </div>
</section>
@push('js')
@endpush
@endsection
