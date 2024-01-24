@extends('front.layouts.front')

@section('content')
<section class=" section login-section  py-3">
    <div class="container-md ">
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="login-form">
            @csrf
            <div class="row g-4">
                <div class="col-12">
                    <div class="welcome-text">
                        <h3>إنشاء حساب</h3>
                        <p class="mb-0"> هل لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="">تسجيل
                                الدخول</a></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inp-holder">
                        <label class="mb-1">الإسم </label>
                        <input type="text" name="name" placeholder="" value="{{ old('name') }}">
                    </div>
                    <div class="inp-holder">
                        <label class="mb-1">الإيميل </label>
                        <input type="email" name="email" placeholder=" " value="{{ old('email') }}">
                    </div>
                    <div class="inp-holder">
                        <label class="mb-1">رقم الهاتف </label>
                        <input type="text" name="phone" placeholder="" value="{{ old('phone') }}">
                    </div>
                    <div class="inp-holder">
                        <label class="mb-1">كلمة المرور</label>
                        <input type="password" name="password" placeholder="">
                    </div>
                    <div class="inp-holder mb-0">
                        <label class="mb-1">تأكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" placeholder="">
                    </div>
                </div>
                <div class="col-12">
                    <h5>نوع العضوية</h5>
                    <div class="d-flex align-items-center  gap-2">
                        <div class="form-check remember ">
                            <input type="radio" class="form-check-input" name="type" id="type1" value="user" {{ old('type') == 'user' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                عميل
                            </label>
                        </div>
                        <div class="form-check remember ">
                            <input type="radio" class="form-check-input" name="type" id="type2" value="vendor" {{ old('type') == 'vendor' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                مزود خدمة
                            </label>
                        </div>
                        <!-- <div class="form-check remember ">
                                <input type="radio" class="form-check-input" name="type" value="coordinator"
                                    {{ old('type') == 'coordinator' ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    منسق
                                </label>
                            </div> -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check remember ">
                        <input type="checkbox" class="form-check-input" name="agree" id="agree-ok">
                        <a id="link1" href="{{ route('front.terms-of-use',['mode' => 'client']) }}" class="">
                            أوافق علي شروط الخدمة وسياسة الخصوصية بالمنصة
                        </a>
                        <a id="link2" href="{{ route('front.terms-of-use',['mode' => 'vendor']) }}" class="">
                            أوافق علي شروط الخدمة وسياسة الخصوصية بالمنصة
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="login-btn w-100">
                        إنشاء حساب
                    </button>
                </div>
            </div>




        </form>
    </div>
</section>
<script>
    const term1 = document.getElementById('type1');
    const term2 = document.getElementById('type2');
    const link1 = document.getElementById('link1');
    const link2 = document.getElementById('link2');

    function showLink() {
        if (term1.checked) {
            link1.style.display = 'block';
            link2.style.display = 'none';
        } else if (term2.checked) {
            link1.style.display = 'none';
            link2.style.display = 'block';
        } else {
            link1.style.display = 'block';
            link2.style.display = 'none';
        }
    }

    showLink();

    document.addEventListener('change', showLink);

</script>
@endsection
