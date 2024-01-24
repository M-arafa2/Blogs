@extends('admin.layouts.admin')
@section('title','الأقسام')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li class="breadcrumb-item"><a href="#">الأقسام</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        أضف سؤال
      </li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <form action="" class="row g-3">
        <div class="col-12 col-md-4 col-lg-3">
            <label for="">سؤالك</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-12 col-md-12">
            <button class="btn btn-sm btn-primary px-4">حفظ</button>
        </div>
    </form>
  </div>
</section>
@endsection
