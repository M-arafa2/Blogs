@extends('front.layouts.front')

@section('content')
    <section class="section box-section show-order-section py-4 section-bg">
        <div class="container-md">
            <h5 class="mb-2 order-name">{{ $order->title }}</h5>
            <div class="btn-group mb-3">
                <a href="#addOffer" class="btn btn-sm main-btn btn-drop"><i class="fa-solid fa-ticket"></i> أضف عرضك الأن</a>
                <button type="button" class="btn btn-drop main-btn dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bookmark"></i> أضف إلي المفضلة</a>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-flag"></i> تبليغ عن المحتوي</a></li>
                </ul>
            </div>
        </div>
        <div class=" bg-white mb-3">
            <h6 class="container-md mb-4 py-3 fw-semibold color-222 border-b fs-16px">
                معلومات الطلب
            </h6>
            <div class="container-md d-flex align-items-center justify-content-between gap-3 pb-2 mb-3 border-b">
                <div>
                    <p class="mb-3">
                        حالة الطلب
                    </p>
                    <p class="mb-3">
                        تاريخ النشر
                    </p>
                    <p class="mb-3">
                        القسم الرئيسي
                    </p>
                    {{-- <p class="mb-3">
                                القسم الفرعي
                            </p> --}}
                    <p class="mb-3">
                        الخدمة
                    </p>
                    <p class="mb-3">
                        عدد العروض
                    </p>
                    @if ($order->files)
                        <p class="mb-3">
                            المرفقات
                        </p>
                    @endif
                </div>
                <div>
                    <p class="mb-3">
                        @if ($order->status == 'accepted')
                            <span class="badge bg-success status-Badge w-100">مفتوح</span>
                        @elseif($order->status == 'rejected')
                            <span class="badge bg-danger status-Badge w-100">مرفوض</span>
                        @elseif($order->status == 'pending')
                            <span class="badge bg-warning status-Badge w-100">قيد المراجعة</span>
                        @elseif($order->status == 'in_progress')
                            <span class="badge bg-info status-Badge w-100">قيد التنفيذ</span>
                        @else
                            <span class="badge bg-primary status-Badge w-100">مكتمل</span>
                        @endif
                    </p>
                    <p class="mb-3">
                        {{ $order->human_date }}
                    </p>
                    <p class="mb-3">
                        {{ $order->department->name }}
                    </p>
                    {{-- <p class="mb-3">
                                فرعي 1
                            </p> --}}
                    <p class="mb-3">
                        {{ $order->service->name }}
                    </p>
                    <p class="mb-3">
                        {{ $order->offers->count() }}
                    </p>
                    @if ($order->files)
                        <p class="mb-3">
                            @foreach (json_decode($order->files, true) as $index => $file)
                                <div class="mb-1"><a href="{{ display_file($file) }}"
                                        class="btn btn-sm btn-success fs-11px">مرفق
                                        {{ $index + 1 }} <i class="fa fa-download"></i></a></div>
                            @endforeach
                        </p>
                    @endif
                </div>
            </div>
            <div class="container-md progress-order border-b mb-2 py-2">
                <div class="row">
                    <div class="col-12">
                        <h5 class="progress-state">
                            <i class="fa-solid fa-circle-chevron-left active"></i>
                            مرحلة تلقي العروض
                        </h5>
                    </div>
                    <div class="col-12">
                        <h5 class="progress-state">
                            <i class="fa-solid fa-circle-dot"></i>
                            مرحلة التنفيذ
                        </h5>
                    </div>

                    <div class="col-12">
                        <h5 class="progress-state">
                            <i class="fa-solid fa-circle-dot"></i>
                            مرحلة التسليم
                        </h5>
                    </div>
                </div>
            </div>
            <div class="container-md pt-2 pb-3">
                <p class="mb-1 fw-semibold color-222 fs-16px">
                    صاحب الطلب
                </p>
                <div class="info-user-order d-flex align-items-center gap-2">
                    @if ($order->user->photo)
                        <img src="{{ display_file($order->user->photo) }}" alt="" class="img-user">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLRrfGmicNOQwEeoCv7JtxJ69QOxUfJq0eyg&usqp=CAU"
                            class="img-user" alt="">
                    @endif
                    <div class="name ">
                        {{ $order->user->name }}
                    </div>
                </div>
            </div>
        </div>
        <div class=" bg-white mb-3">
            <h6 class="container-md mb-3 py-3 fw-semibold border-b color-222 fs-16px">
                وصف الطلب
            </h6>
            <div class="container-md">
                <p class="pb-3 color-222">
                    {{ $order->description }}
                </p>
            </div>
        </div>

        @livewire('front.offers.create', ['order' => $order], key($order->id))

    </section>
@endsection

@push('js')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
