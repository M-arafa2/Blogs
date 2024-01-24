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
                <img src="{{ asset('images/user/'.$user->image) }}" alt="" class="img-user">
                @else
                <img src="{{ asset('admin-assets/img/no-image.jpeg') }}" class="img-user" alt="">
                @endif
                <div class="icon-holder"><i class='bx bxs-edit-alt'></i></div>
            </div>
            <div class="name-user">
                {{ $user->name }}
            </div>
        </div>
        <form action="{{ route('user.update_profile') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('patch')
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="inp-cus mb-1">
                        <label class="title main-color"><i class="fa-solid fa-circle-user fs-14px"></i> صوره الملف الشخصى</label>
                        <div class="title-inp">
                            <input class="inp-profile img" name="image" type="file" accept="image/*">
                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    @if($user->image)
                    <img src="{{ asset('images/user/'.$user->image) }}" alt="{{ $user->name }}" class="img-thumbnail img-preview" width="125px">
                    @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="125px">
                    @endif
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-clipboard-user fs-14px"></i> الاسم</label>
                        <div class="title-inp">
                            <input type="text" name="name" class="inp-profile" value="{{ old('name', $user->name) }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-mobile-screen-button fs-14px"></i> الهاتف</label>
                        <div class="title-inp">
                            <input type="tel" name="phone" id="" value="{{ old('phone', $user->phone) }}" class="inp-profile">
                            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="bx bx-user fs-14px"></i> الجنس</label>
                        <div class="title-inp">

                            <select name="gender" class="inp-profile">
                                <option value="" selected disabled readonly>أختر الجنس</option>
                                <option value="male" {{ old('gender',$user->gender) == 'male' ? 'selected' : null }}>ذكر</option>
                                <option value="female" {{ old('gender',$user->gender) == 'female' ? 'selected' : null }}>انثى</option>
                            </select>
                            @error('gender')<span class="text-danger">{{ $message }}</span>@enderror
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
                        <label class="title main-color"><i class="fa-solid fa-envelope fs-14px"></i> البريد الالكترونى</label>
                        <div class="title-inp">
                            <input type="email" required name="email" class="inp-profile" value="{{ old('email',$user->email) }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-lock  fs-14px"></i> كلمه المرور</label>
                        <div class="title-inp">
                            <input type="password" name="password" class="inp-profile" value="{{ old('password') }}">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-map fs-14px"></i> الدوله</label>
                        <div class="title-inp">
                            <select name="country_id" class="inp-profile">
                                <option value="" selected disabled readonly>أختر الدولة</option>
                                @foreach (App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ old('country_id',$user->country_id)==$country->id?'selected':null }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-cus">
                        <label class="title main-color"><i class="fa-solid fa-location-dot fs-14px"></i> المدينه</label>
                        <div class="title-inp">

                            <select name="city_id" class="inp-profile">

                                <option value="" selected disabled readonly>أختر المدينة</option>
                                @foreach (App\Models\City::all() as $city)
                                <option value="{{ $city->id }}" {{ old('city_id',$user->city_id)==$city->id?'selected':null }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')<span class="text-danger">{{ $message }}</span>@enderror
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
