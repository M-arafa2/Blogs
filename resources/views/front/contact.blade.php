@extends('front.layouts.front')

@section('content')
    <section class="section box-section contact-section py-4">
        <div class="container-md ">
            @if(session()->has('error'))
            <div class="alert w-100 mb-0 mt-2 alert-warning alert-dismissible fade show">
                <h6 class="mb-0"><i class="icon fas fa-exclamation-triangle"></i> {{ trans('admin.alert') }}!</h6>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session()->has('success'))
            <div class="alert w-100 mb-0 mt-2 alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger mt-2 mb-0">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
            <div class="text-center mb-5">
                <h2 class="lg-title mb-3">
                اتصل بنا
                </h2>
                <p class="fw-bold mb-2">هل لديك أي إستفسار؟</p>
            </div>
            <form action="{{route('storeContact')}}" class="d-flex flex-column gap-3" method="post">
                @csrf
                <div class="main-inp">
                    <i class="icon fas fa-user"></i>
                    <input type="text" name="first_name" placeholder="الإسم الأول">
                </div>
                <div class="main-inp">
                    <i class="icon fas fa-user"></i>
                    <input type="text" name="last_name" placeholder="الإسم الثاني">
                </div>
                <div class="main-inp">
                    <i class="icon fas fa-mobile"></i>
                    <input type="text" name="phone" placeholder="رقم الهاتف">
                </div>
                <div class="main-inp">
                    <i class="icon fas fa-envelope"></i>
                    <input type="email" name="email" placeholder=" الإيميل">
                </div>
                <div>
                    <p class="d-flex align-items-center gap-2 mb-1">
                        <i class="fas fa-pen-to-square"></i>
                        نص الرسالة
                    </p>
                    <textarea name="message" id=""class="main-textarea" placeholder="قم بأضافة ملاحظتك هنا......"></textarea>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <button type="submit" class="main-btn btn-yellow">
                        ارسال
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
