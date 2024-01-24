@include('admin.layouts.head')
<!-- Start layout -->
<section class="login_page">
    <div class="container min-vh-100 d-lg-flex align-items-lg-center justify-content-lg-center">
        <x-messages></x-messages>
        <div class="login_content shadow">
            <div class="login_image">
                <img src="{{ asset('admin-assets/img/settings/login-img.jpg') }}" alt="" />
            </div>
            <form action="{{ route('admin.login.post') }}" method="POST" class="form_content shadow">
                @csrf
                <h3 class="header_title">تسجيل الدخول</h3>
                <div class="row">
                    <div class="col-12 mt-3 mb-3">
                        <label for="" class="small-label">البريد الالكتروني</label>
                        <input type="email" placeholder="البريد الالكتروني" name="email" id="" class="form-control w-100">
                    </div>
                    <div class="col-12 mb-4">
                        <label for="" class="small-label">كلمة السر</label>
                        <input type="password" placeholder="كلمة السر" name="password" id="" class="form-control w-100">
                    </div>
                    <div class="col-12 mt-1">
                        <button type="submit" class="sub_btn btn btn-success w-100">دخول</button>
                    </div>
                    <div class="col-12 mt-4">
                        <hr class="">
                    </div>
                    <!-- <div class="col-12 d-flex justify-content-center">
                        <div class="image_holder">
                            <img src="{{ asset('admin-assets/img/settings/LOGO.png') }}" alt="" class="logo" />
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End layout -->
<!-- Js Files -->
@include('admin.layouts.footer')
