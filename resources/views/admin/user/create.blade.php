@extends('admin.layouts.admin')
@section('title', 'إضافة عميل')
@section('content')
    <section class="" id="app">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li href="" class="breadcrumb-item" aria-current="page">
                    اضافة عميل
                </li>
            </ol>
        </nav>
        <div class="content_view">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row row-gap-24">
                    @csrf
                    {{-- <input type="hidden" name="back" value="{{ request('back') }}" id=""> --}}
                    {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label"> نوع الحساب </label>
                        <select name="type" class="form-control"  >
                            <option value="" selected disabled readonly>أختر نوع العضوية</option>
                            <option value="user" {{ old('type') == 'user' ? 'selected' : null }}>عميل</option>
                            <option value="vendor" {{ old('type') == 'vendor' ? 'selected' : null }}>مزود الخدمة</option>
                        </select>
                    </div> --}}
                    <input type="hidden" value="user" name="type">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label">الاسم <span class="text-danger">*</span></label>
                        <input type="text" required name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label"> الجنس </label>
                        <select name="gender" class="form-control">
                            <option value="" selected disabled readonly>أختر الجنس</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : null }}>ذكر</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : null }}>انثى</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label">البريد الالكتروني <span
                                class="text-danger">*</span></label>
                        <input type="email" required name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label"> رقم الجوال <span class="text-danger">*</span></label>
                        <input type="number" required name="phone" class="form-control rmv-arw-inp"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label"> الباسورد </label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label"> الدولة </label>
                        <select name="country_id" class="form-control">
                            <option value="" selected disabled readonly>أختر الدولة</option>
                            @foreach (App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}"
                                    {{ old('country_id') == $country->id ? 'selected' : null }}>
                                    {{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <label for="" class="small-label"> المدينة </label>
                        <select name="city_id" class="form-control">
                            <option value="" selected disabled readonly>أختر المدينة</option>
                            @foreach (App\Models\City::all() as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : null }}>
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <label for="" class="small-label"> رقم وثيقة عمل الحر </label>
                            <input type="text" name="freelance_document" class="form-control"
                                value="{{ old('freelance_document') }}">
                            @error('freelance_document')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <label for="" class="small-label"> صورة وثيقة عمل الحر </label>
                            <input type="file" name="freelance_image" class="form-control"
                                value="{{ old('freelance_image') }}">
                            @error('freelance_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صوره </label>
                                <input class="form-control img" name="image" type="file" accept="image/*">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/no-image.jpg') }}" alt=""
                                class="img-thumbnail img-preview" width="200px">
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center mt-3">
                        <button type="submit" class="btn btn-success">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('js')
    @endpush
@endsection
