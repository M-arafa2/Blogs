@extends('admin.layouts.admin')
@section('title', 'الطلبات')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                الطلبات
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="up_element d-flex align-items-center gap-1 mb-2">
            <a href="{{ route('admin.carts.index') }}" class="btn btn-sm btn-primary px-3">الكل</a>
            <a href="{{ route('admin.carts.index',['status' => 'processing']) }}" class="btn btn-sm btn-dark px-3">جاري التنفيذ</a>
            <a href="{{ route('admin.carts.index',['status' => 'pending']) }}" class="btn btn-sm btn-warning px-3">بالانتظار في السلة</a>
            <a href="{{ route('admin.carts.index',['status' => 'completed']) }}" class="btn btn-sm btn-success px-3">مكتمل</a>
            <a href="{{ route('admin.carts.index',['status' => 'declined']) }}" class="btn btn-sm btn-danger px-3">ملغي</a>
            <a href="{{ route('admin.carts.index',['insurance' => 1]) }}" class="btn btn-sm btn-info px-3">يحتوي على تأمين</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>المنتجات</th>
                        <th>العميل</th>
                        <th>الحالة</th>
                        <th class="text-nowrap">تاريخ الانشاء</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            @foreach($cart->products as $product)
                            {{ $loop->iteration }} -
                            <span class="badge bg-primary">{{ $product->name }}</span>
                            <span class="badge bg-primary">{{ $product->pivot->quantity }}</span>
                            @endforeach
                        </td>

                        <td>{{ $cart->user?->name }}</td>
                        <td>
                            @if($cart->status == 'processing')
                            <span class="badge bg-primary">قيد التنفيذ</span>
                            @elseif($cart->status == 'completed')
                            <span class="badge bg-success">مكتمل</span>
                            @endif
                        </td>
                        <td class="text-nowrap">{{ $cart->created_at->format('Y-m-d') }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('admin.carts.show', $cart->id) }}" class="btn btn-sm btn-purple">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $carts->links() }}
        </div>
    </div>
</section>
@endsection
