@extends('admin.layouts.admin')
@section('title','إضافة مزود خدمه')
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@section('content')
<section class="" id="app">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                اضافة مزود خدمه
            </li>
        </ol>
    </nav>
    <div class="content_view">
        <form action="{{ route('admin.vendors.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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
            <input type="hidden" value="vendor" name="type">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">الاسم <span class="text-danger">*</span></label>
                <input type="text" required name="name" class="form-control" value="{{ old('name') }}">
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> الجنس </label>
                <select name="gender" class="form-control">
                    <option value="" selected disabled readonly>أختر الجنس</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : null }}>ذكر</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : null }}>انثى</option>
                </select>
                @error('gender')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">البريد الالكتروني <span class="text-danger">*</span></label>
                <input type="email" required name="email" class="form-control" value="{{ old('email') }}">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> رقم الجوال <span class="text-danger">*</span></label>
                <input type="number" required name="phone" class="form-control rmv-arw-inp" value="{{ old('phone') }}">
                @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> الباسورد </label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> عنوان المتجر </label>
                <input type="text" name="merchant_address" class="form-control" value="{{ old('merchant_address') }}">
                @error('merchant_address')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> الدولة </label>
                <select name="country_id" class="form-control">
                    <option value="" selected disabled readonly>أختر الدولة</option>
                    @foreach (App\Models\Country::all() as $country)
                    <option value="{{ $country->id }}" {{ old('country_id')==$country->id?'selected':null }}>{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> المدينة </label>
                <select name="city_id" class="form-control">
                    <option value="" selected disabled readonly>أختر المدينة</option>
                    @foreach (App\Models\City::all() as $city)
                    <option value="{{ $city->id }}" {{ old('city_id')==$city->id?'selected':null }}>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> القسم</label>
                <select name="department_id" class="form-control">
                    <option value="" selected disabled readonly>أختر القسم</option>
                    @foreach (App\Models\Department::all() as $department)
                    <option value="{{ $department->id }}" {{ old('department_id')==$department->id?'selected':null }}>{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">السجل التجارى</label>
                <input type="text" name="commercial_no" class="form-control" value="{{ old('commercial_no') }}">
                @error('commercial_no')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">السجل الضريبي</label>
                <input type="text" name="tax_id" class="form-control" value="{{ old('tax_id') }}">
                @error('tax_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label"> رقم توثيق المركز السعودي للأعمال</label>
                <input type="text" name="maarouf_link" class="form-control" value="{{ old('maarouf_link') }}">
                @error('maarouf_link')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">معلومات الحساب البنكي ايبان </label>
                <input type="text" name="bank" class="form-control" value="{{ old('bank') }}">
                @error('bank')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">رقم وثيقة العمل الحر </label>
                <input type="text" name="bank" class="form-control" value="">
                @error('bank')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">   التقييم </label>
                <input type="text" name="rating" class="form-control" value="{{ old('rating') }}">
                @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-6">
                <label for="" class="small-label">الخدمات</label>
                <textarea name="service" class="form-control" placeholder="اكتب الخدمات" rows="3">
                            {!! old('service') !!}
                        </textarea>
                @error('service')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">من</label>
                <input type="time" name="from" class="form-control" value="{{ old('from') }}">
                @error('from')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">الى</label>
                <input type="time" name="to" class="form-control" value="{{ old('to') }}">
                @error('to')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-6">
                <label for="" class="small-label">نبذة عن المتجر </label>
                <textarea name="desc" class="form-control" placeholder="اكتب نبذه عن متجرك" rows="3">
                            {!! old('desc') !!}
                        </textarea>
                @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">السعر من</label>
                <input type="text" name="price_from" class="form-control" value="{{ old('price_from') }}">
                @error('price_from')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <label for="" class="small-label">السعر الي</label>
                <input type="text" name="price_to" class="form-control" value="{{ old('price_to') }}">
                @error('price_to')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>صوره </label>
                        <input class="form-control img" name="image" type="file" accept="image/*">
                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="200px">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>الموقع </label>
                        <div id="map" style="width: 100%; height: 200px;"></div>
                        <input type="text" id="latitude" name="lat" placeholder="خط العرض">
                        <input type="text" id="longitude" name="long" placeholder="خط الطول">
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxwLwv3e6VKoTTf0IpD9KDwP-9SyIZ7ds&callback=initMap" async
                        defer></script>
                    <script>
                        function initMap() {
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {
                                    lat: 24.60970535276346,
                                    lng: 46.696128734375
                                },
                                zoom: 13
                            });

                            var marker;

                            map.addListener('click', function(event) {
                                placeMarker(event.latLng);
                            });

                            function placeMarker(location) {
                                if (marker) {
                                    marker.setMap(null);
                                }

                                marker = new google.maps.Marker({
                                    position: location,
                                    map: map
                                });

                                document.getElementById('latitude').value = location.lat().toFixed(6);
                                document.getElementById('longitude').value = location.lng().toFixed(6);
                            }
                        }
                    </script>

                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
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
{{-- <script>
    // دالة initMap لإعداد الخريطة وعلامة الموقع
    function initMap() {
        // إحداثيات الموقع (يمكنك تعيين إحداثيات الموقع الخاص بك هنا)
        var location = {lat: 40.712776, lng: -74.005974};

        // إعداد الخريطة
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location
        });

        // إعداد علامة الموقع
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'موقع المتجر'
        });
    }
</script> --}}

{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script> --}}

@endpush
@endsection
