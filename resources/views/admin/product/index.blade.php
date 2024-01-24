@extends('admin.layouts.admin')
@section('title','المنتجات')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">المنتجات</li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="info_holder d-flex align-items-center flex-wrap  gap-2 mb-2">
      {{-- <div class="up_element">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
          إضافة
        </a>
      </div> --}}
      <button class="btn btn-green">منتجات مفعله {{ $active }}</button>
      <button class="btn btn-danger">منتجات غير مفعله {{ $unactive }}</button>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>المنتج</th>
            <th>الاسم</th>
            <th>القسم</th>
            <th>المزود</th>
            <th>السعر</th>
            <th>التسليم</th>
            <th>التوصيل</th>
            <th>التأمين</th>
            <th>مبلغ التأمين</th>
            <th>الحاله</th>
            <th>الاضافه</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <th>{{ $loop->iteration }}</th>
            <td>
                @if($product->image)
                <img src="{{ asset('images/product/'.$product->image) }}" alt="{{ $product->name }}" class="img-product img-thumbnail" width="100px">
                @else
                <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $product->name }}" class="img-product img-thumbnail" width="100px">
                @endif
            </td>
            <td class="text-nowrap">{{ $product->name }}</td>
            <td class="text-nowrap">{{ $product->department?->name }}</td>
            <td class="text-nowrap">{{ $product->vendor?->name }}</td>
            <td class="text-nowrap">{{ $product->price }}</td>
            <td class="text-nowrap">{{ $product->leadtime }} يوم</td>
            <td class="text-nowrap">{{ $product->delivery() }}</td>
            <td class="text-nowrap">{{ $product->insurance() }}</td>
            <td class="text-nowrap">{{ $product->insurance_amount }}</td>
            <td class="text-nowrap">
              <span class=" btn btn-{{ $product->status == 1 ? 'success' : 'danger'  }} btn-sm">
                {{ $product->status == 1 ? 'مفعل':'غير مفعل' }}
              </span>
              <i class='fa fa-exchange mx-1'></i>
              <a href="{{route('admin.product.change_status',encrypt($product->id))}}"
                title="للتحويل الى  {{ ($product->status == 1) ? 'غير مفعل': 'مفعل'}}">
                {{ $product->status == 1 ? 'غير مفعل' : 'مفعل' }}
              </a>
            </td>
            <td class="text-nowrap">{{ $product->created_at() }}</td>
            <td class="text-nowrap">
            @if ($product->acceptance == 'Pending')
            <button type="button" class="btn btn-success btn-sm text-nowrap" data-bs-toggle="modal"
              data-bs-target="#accept{{ $product->id }}">
              قبول <i class="fa fa-check"></i>
            </button>

            <button type="button" class="btn btn-danger btn-sm text-nowrap" data-bs-toggle="modal"
              data-bs-target="#reject{{ $product->id }}">
              رفض <i class="fa fa-times"></i>
            </button>
            @endif
            </td>
            <td class="text-nowrap">
                @if ($product->acceptance == 'accepted')
                <span class="badge bg-success">مؤكد</span>
                @elseif($product->acceptance == 'Pending')
                <span class="badge bg-danger">قيد المراجعة</span>
                 @else 
                 <span class="badge bg-warning"> ملغي</span> 
                @endif
                @include('admin.product.action')
                @include('admin.product.status-modal', ['product' => $product])

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $products->links() }}
    </div>
  </div>
</section>
@endsection
