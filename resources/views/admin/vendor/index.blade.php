@extends('admin.layouts.admin')
@section('title','مزود الخدمه')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">مزود الخدمه</li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="info_holder d-flex align-items-center flex-wrap  gap-2 mb-2">
            <div class="up_element">
                <a href="{{ route('admin.vendors.create') }}" class="btn btn-primary">
                    إضافة
                </a>
            </div>
            <button class="btn btn-green">مزودى خدمه مفعلين: {{ $active }}</button>
            <button class="btn btn-danger">مزودى خدمه غير مفعلين: {{ $unactive }}</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>صوره</th>
                        <th>الاسم</th>
                        <th>الجوال</th>
                        <th>الإيميل</th>
                        <th>الدوله</th>
                        <th>المدينة</th>
                        <th>الحاله</th>
                        <th class="text-nowrap">تاريخ الاضافه</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            @if($vendor->image)
                            <img src="{{ asset('images/vendor/'.$vendor->image) }}" alt="{{ $vendor->name }}" class="img-thumbnail" width="100px">
                            @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $vendor->name }}" class="img-thumbnail" width="100px">
                            @endif
                        </td>
                        <td>{{ $vendor->name }}</td>
                        <td>{{ $vendor->phone }}</td>
                        <td>{{ $vendor->email }}</td>
                        <td>{{ $vendor->country?->name }}</td>
                        <td>{{ $vendor->city?->name }}</td>
                        <td class="text-nowrap">
                            <span class=" btn btn-{{ $vendor->status == 1 ? 'success' : 'danger'  }} btn-sm">
                                {{ $vendor->status == 1 ? 'مفعل':'غير مفعل' }}
                            </span>
                            <i class='fa fa-exchange mx-1'></i>
                            <a href="{{route('admin.vendor.change_status',encrypt($vendor->id))}}" title="للتحويل الى  {{ ($vendor->status == 1) ? 'غير مفعل': 'مفعل'}}">
                                {{ $vendor->status == 1 ? 'غير مفعل' : 'مفعل' }}
                            </a>
                        </td>
                        <td class="text-nowrap">{{ $vendor->created_at() }}</td>
                        <td>
                            @include('admin.vendor.action')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $vendors->links() }}
        </div>
    </div>
</section>
@endsection
