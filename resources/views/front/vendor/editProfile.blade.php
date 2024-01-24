@extends('front.layouts.front')
@section('content')
@php
$user = auth()->user();
@endphp
<section class="section profile-section py-4">
    <div class="container-md">
        <div class="text-center">
            <div class="img-holder">
                @if ($user->image)
                <img src="{{ asset('images/vendor/' . $user->image) }}" alt="" class="img-user">
                @else
                <img src="{{ asset('admin-assets/img/no-image.jpeg') }}" class="img-user" alt="">
                @endif
                <div class="icon-holder"><i class='bx bxs-edit-alt'></i></div>
            </div>
            <div class="name-user">
                {{ $user->name }}
            </div>
        </div>
        <form action="{{ route('vendor.update_profile') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('patch')
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i> صوره
                            الملف الشخصى</label>
                        <div class="title-inp">
                            <input class="inp-profile img" name="image" type="file" accept="image/*">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($user->image)
                            <img src="{{ asset('images/vendor/' . $user->image) }}" alt="{{ $user->name }}" class="img-thumbnail img-preview" width="200px">
                            @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i>
                            الاسم</label>
                        <div class="title-inp">
                            <input type="text" name="name" class="inp-profile" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i>
                            الهاتف</label>
                        <div class="title-inp">
                            <input type="tel" name="phone" id="" value="{{ old('phone', $user->phone) }}" class="inp-profile">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="bx bx-user fs-14px"></i> الجنس</label>
                        <select name="gender" class="form-control">
                            <option value="" selected disabled readonly>أختر الجنس</option>
                            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : null }}>ذكر</option>
                            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : null }}>انثى
                            </option>
                        </select>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> البريد
                            الالكترونى</label>
                        <div class="title-inp">
                            <input type="email" required name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="bx bx-user fs-14px"></i> العمر</label>
                        <div class="title-inp">
                            <input type="number" name="age" id="" value="{{ $user->age }}" class="inp-profile">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> الموقع</label>
                        <div class="title-inp">
                            <input type="text" name="location" id="" value="{{ $user->location }}" class="inp-profile">
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> اللغة</label>
                        <div class="title-inp">
                            <input type="text" name="language" id="" value="{{ $user->language }}" class="inp-profile">
                        </div>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> كلمه المرور</label>
                        <div class="title-inp">
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> الدوله</label>
                        <select name="country_id" class="form-control">
                            <option value="" selected disabled readonly>أختر الدولة</option>
                            @foreach (App\Models\Country::all() as $country)
                            <option value="{{ $country->id }}" {{ old('country_id', $user->country_id) == $country->id ? 'selected' : null }}>
                                {{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> المدينه</label>
                        <select name="city_id" class="form-control">
                            <option value="" selected disabled readonly>أختر المدينة</option>
                            @foreach (App\Models\City::all() as $city)
                            <option value="{{ $city->id }}" {{ old('city_id', $user->city_id) == $city->id ? 'selected' : null }}>
                                {{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-language fs-14px"></i> القسم</label>
                        <div class="title-inp">

                            <select name="department_id" class="form-control">
                                <option value="" selected disabled readonly>أختر القسم</option>
                                @foreach (App\Models\Department::all() as $department)
                                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : null }}>
                                    {{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> السجل
                            التجارى</label>
                        <div class="title-inp">
                            <input type="text" name="commercial_no" class="form-control" value="{{ old('commercial_no', $user->commercial_no) }}">
                            @error('commercial_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> 
                            مركز السعودي للأعمال
                            </label>
                        <div class="title-inp">
                            <input type="text" name="maarouf_link" class="form-control" value="{{ old('maarouf_link', $user->maarouf_link) }}">
                            @error('maarouf_link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> معلومات
                            الحساب البنكى</label>
                        <div class="title-inp">
                            <input type="text" name="bank" class="form-control" value="{{ old('bank', $user->bank) }}">
                            @error('bank')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> رقم وثيقة
                            العمل الحر</label>
                        <div class="title-inp">
                            <input type="text" name="freelance_document" class="form-control" value="{{ old('freelance_document', $user->freelance_document) }}">
                            @error('freelance_document')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i> صوره
                            وثيقة العمل الحر </label>
                        <div class="title-inp">
                            <input class="inp-profile img" name="freelance_image" type="file" accept="image/*">
                            @error('freelance_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($user->freelance_image)
                            <img src="{{ display_file($user->freelance_image) }}" alt="{{ $user->name }}" class="img-thumbnail img-preview" width="200px">
                            @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> نبذه عن
                            المتجر</label>
                        <div class="title-inp">
                            <textarea name="desc" class="form-control" placeholder="اكتب نبذه عن متجرك" rows="3">{!! old('desc', $user->desc) !!}</textarea>
                            @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="btn-holder d-flex flex-column align-items-center gap-2 justify-content-center mt-4">
                <button type="submit" class="main-btn lg-btn">حفظ</button>
                <button class="btn text-danger px-5" type="reset">تجاهل التعديلات</button>
            </div>
        </form>
    </div>
</section>
@endsection
