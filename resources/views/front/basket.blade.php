@extends('front.layouts.front')

@section('content')
    <section class="section py-4 ">
        <div class="container-md ">
        <div class="text-center mb-4">
        <h3 class="md-title mb-2">السلة</h3>
      </div>
        <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>المنتج</th>
            <th>مقدم الخدمه</th>
            <th>القسم</th>
            <th>السعر</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>منتج1</td>
            <td>باسم جابر</td>
            <td>قسم1</td>
            <td>585</td>
          </tr>
          <tr>
            <th class="table-dark">السعر الاجمالي</th>
            <td colspan="3">585</td>
          </tr>
          <tr>
            <th class="table-dark"> الضريبة</th>
            <td colspan="3">5%</td>
          </tr>

        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
        <a href="" class="btn btn-success w-100">دفع المبلغ الان</a>
    </div>
        </div>
    </section>
@endsection
