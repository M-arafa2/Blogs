@extends('admin.layouts.admin')
@section('title')
الاعدادات
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-3 rounded-2">
        <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
        <li class="breadcrumb-item active" aria-current="page">الاعدادات</li>
    </ol>
</nav>
<div class="content_view">
    <form class="row g-3" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <div class="form-group">
                <label for="website_name" class="small-label">اسم الموقع</label>
                <input type="text" name="website_name" id="website_name" class="form-control" value="{{ old('website_name', setting('website_name')) }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="link" class="small-label">رابط الموقع</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ old('link', setting('link')) }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="website_active" class="small-label">حالة الموقع</label>
                <select name="website_active" id="website_active" class="form-select">
                    <option value="1" {{ old('website_active', setting('website_active'))==1 ? 'selected' : '' }}>مفعل
                    </option>
                    <option value="0" {{ old('website_active', setting('website_active'))==0 ? 'selected' : '' }}>غير
                        مفعل
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block"> الرقم الضريبي</span>
                    <input type="number" id="" class="form-control" name="tax_number" value="{{ old('tax_number', setting('tax_number')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block"> العنوان</span>
                    <input type="text" id="" class="form-control" name="address" value="{{ old('address', setting('address')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block"> الجوال</span>
                    <input type="tel" id="" class="form-control" name="phone" value="{{ old('phone', setting('phone')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">السجل التجاري</span>
                    <input type="number" id="" class="form-control" name="record_number" value="{{ old('record_number', setting('record_number')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">رقم المبنى</span>
                    <input type="number" id="" name="build_no" class="form-control" value="{{ old('build_no', setting('build_no')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">حساب الواتس</span>
                    <input type="number" id="" name="whats" class="form-control" value="{{ old('whats', setting('whats')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="support_mail" class="small-label">البريد</label>
                <input type="email" name="support_mail" id="support_mail" class="form-control" value="{{ old('support_mail', setting('support_mail')) }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">الفيس بوك</span>
                    <input type="text" id="" name="facebook" class="form-control" value="{{ old('facebook', setting('facebook')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">تويتر</span>
                    <input type="text" id="" name="twitter" class="form-control" value="{{ old('twitter', setting('twitter')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">انستقرام</span>
                    <input type="text" id="" name="instagram" class="form-control" value="{{ old('instagram', setting('instagram')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">الضريبة</span>
                    <input type="text" id="" name="tax" class="form-control" value="{{ old('tax', setting('tax')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <span class="small-label d-block">النسبة المئوية للادارة</span>
                    <input type="text" id="" name="commission" class="form-control" value="{{ old('commission', setting('commission')) }}">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="logo" class="small-label">لوجو الموقع</label>
                <input type="file" accept="image/*" name="logo" id="logo" class="form-control icon" value="{{ old('logo', setting('logo')) }}">
            </div>
            <div class="form-group">
                <img src="{{ asset('admin-assets/img/settings/' . setting('logo')) }}" alt="" class="img-thumbnail icon-preview" width="100px">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="site_icon" class="small-label">ايقونه المتصفح</label>
                <input type="file" accept="image/*" name="site_icon" id="site_icon" class="form-control img" value="{{ old('site_icon', setting('site_icon')) }}">
            </div>
            <div class="form-group">
                <img src="{{ asset('admin-assets/img/settings/' . setting('site_icon')) }}" alt="" class="img-thumbnail img-preview" width="100px">
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="form-group">
                <label for="website_inactive_message" class="small-label">رسالة تعطيل الموقع</label>
                <textarea name="website_inactive_message" id="website_inactive_message" class="form-control" style="min-height: 90px">{{ old('website_inactive_message', setting('website_inactive_message')) }}</textarea>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="form-group">
                <label for="about" class="small-label">حول التطبيق</label>
                <textarea name="about" id="about" class="form-control" style="min-height: 60px">{{ old('about', setting('about')) }}</textarea>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="form-group">
                <label for="terms_of_use_vendor" class="small-label">شروط الاستخدام لمزود الخدمة</label>
                <textarea name="terms_of_use_vendor" id="terms_of_use_vendor" class="form-control" style="min-height: 60px">{{ old('terms_of_use', setting('terms_of_use_vendor')) }}</textarea>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="form-group">
                <label for="terms_of_use_client" class="small-label">شروط الاستخدام للعميل</label>
                <textarea name="terms_of_use_client" id="terms_of_use_client" class="form-control" style="min-height: 60px">{{ old('terms_of_use', setting('terms_of_use_client')) }}</textarea>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="form-group">
                <label for="privacy" class="small-label">الخصوصية</label>
                <textarea name="privacy" id="privacy" class="form-control" style="min-height: 60px">{{ old('privacy', setting('privacy')) }}</textarea>
            </div>
        </div>

        <div class="text-center mb-3">

            <button type="submit" class="btn btn-primary btn-sm w-fit mx-auto px-5">حفظ</button>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('about');
    CKEDITOR.replace('terms_of_use_vendor');
    CKEDITOR.replace('terms_of_use_client');
    CKEDITOR.replace('privacy');

</script>

@stop
