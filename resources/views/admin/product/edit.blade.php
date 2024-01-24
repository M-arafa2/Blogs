@extends('admin.layouts.admin')
@section('title', 'تعديل مزود خدمه')
@section('content')
<section class="" id="app">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                تعديل مزود خدمه
            </li>
        </ol>
    </nav>
    <div class="content_view">
        <form action="{{ route('admin.vendors.update',$vendor->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="row row-gap-24">
                {{-- <input type="hidden" name="back" value="{{ request('back') }}" id=""> --}}
                {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="" class="small-label"> نوع الحساب </label>
                    <select name="type" class="form-control"  >
                        <option value="" selected disabled readonly>أختر نوع العضوية</option>
                        <option value="vendor" {{ old('type',$vendor->type) == 'vendor' ? 'selected' : null }}>عميل</option>
                <option value="vendor" {{ old('type',$vendor->type) == 'vendor' ? 'selected' : null }}>مزود الخدمة</option>
                </select>
            </div> --}}
            <input type="hidden" value="{{ $vendor->type }}" name="type">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">الاسم <span class="text-danger">*</span></label>
                <input type="text" required name="name" class="form-control" value="{{ old('name',$vendor->name) }}">
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> الجنس </label>
                <select name="gender" class="form-control">
                    <option value="" selected disabled readonly>أختر الجنس</option>
                    <option value="male" {{ old('gender',$vendor->gender) == 'male' ? 'selected' : null }}>ذكر</option>
                    <option value="female" {{ old('gender',$vendor->gender) == 'female' ? 'selected' : null }}>انثى</option>
                </select>
                @error('gender')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">البريد الالكتروني <span class="text-danger">*</span></label>
                <input type="email" required name="email" class="form-control" value="{{ old('email',$vendor->email) }}">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> رقم الجوال <span class="text-danger">*</span></label>
                <input type="number" required name="phone" class="form-control rmv-arw-inp" value="{{ old('phone',$vendor->phone) }}">
                @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> الباسورد </label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> الدولة </label>
                <select name="country_id" class="form-control">
                    <option value="" selected disabled readonly>أختر الدولة</option>
                    @foreach (App\Models\Country::all() as $country)
                    <option value="{{ $country->id }}" {{ old('country_id',$vendor->country_id)==$country->id?'selected':null }}>{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> المدينة </label>
                <select name="city_id" class="form-control">
                    <option value="" selected disabled readonly>أختر المدينة</option>
                    @foreach (App\Models\City::all() as $city)
                    <option value="{{ $city->id }}" {{ old('city_id',$vendor->city_id)==$city->id?'selected':null }}>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> القسم</label>
                <select name="department_id" class="form-control">
                    <option value="" selected disabled readonly>أختر القسم</option>
                    @foreach (App\Models\Department::all() as $department)
                    <option value="{{ $department->id }}" {{ old('department_id',$vendor->department_id)==$department->id?'selected':null }}>{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">السجل التجارى</label>
                <input type="text" name="commercial_no" class="form-control" value="{{ old('commercial_no',$vendor->commercial_no) }}">
                @error('commercial_no')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">  مركز السعودي للأعمال</label>
                <input type="text" name="maarouf_link" class="form-control" value="{{ old('maarouf_link',$vendor->maarouf_link) }}">
                @error('maarouf_link')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">معلومات الحساب البنكي ايبان </label>
                <input type="text" name="bank" class="form-control" value="{{ old('bank',$vendor->bank) }}">
                @error('bank')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">رقم وثيقة العمل الحر </label>
                <input type="text" name="bank" class="form-control" value="">
                @error('bank')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">رقم وثيقة العمل الحر </label>
                <input type="text" name="bank" class="form-control" value="{{ old('bank',$vendor->bank) }}">
                @error('bank')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-6">
                <label for="" class="small-label">نبذة عن المتجر </label>
                <textarea name="desc" class="form-control" placeholder="اكتب نبذه عن متجرك" rows="3">
                        {!! old('desc',$vendor->desc) !!}
                    </textarea>
                @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
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
