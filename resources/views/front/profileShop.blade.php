@extends('front.layouts.front')
@section('content')
<section class="section">
    <div class="container-md">
      <div class="row g-4">
        <div class="col-12">
          <div class="profile-stor-box">
            <div class="stor-cover">
              <img src="{{ asset('front-assets') }}/img/login-slide3.jpg" alt="">
            </div>
            <div class="stor-info">
                <div class="img-stor">
                    <img src="{{ asset('front-assets') }}/img/stor-img2.png" alt="">
                </div>
              <h4 class="name">إسم المتجر</h4>
              <div class="stor-data">
                <p class="rate">
                  <i class="fa-solid fa-star"></i>
                  التقييم 4.5
                  <a href="#">التقييم الاجمالي</a>
                </p>
                <div class="btns-holder">
                  <a href="#" class="social-btn"><i class="fa-brands fa-twitter"></i></a>
                  <a href="#" class="social-btn"><i class="fa-brands fa-instagram"></i></a>
                  <a href="#" class="social-btn"><i class="fa-brands fa-facebook-f"></i></a>
                  <a href="#" class="social-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                  <a href="#" class="social-btn"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
              </div>
              <p class="des">
                وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                أيا كوممودو كونسيكيوات . ديواسوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
              </p>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="profile-stor-box">
            <div class="stor-info text-start">
              <h6 class="lg-title mb-1">أخر العروض</h2>
                <p class="des text-start">
                  وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                  أيا كوممودو كونسيكيوات . ديواسوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت
                </p>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="profile-stor-box">
            <h6 class="lg-title mb-3">خدمات الموقع</h2>
              <div class="stor-services d-flex align-items-center gap-2 flex-wrap">
                <button class="main-btn btn-yellow border-yellow-btn"> الخدمة الاولي</button>
                <button class="main-btn btn-yellow border-yellow-btn"> الخدمة الثانية</button>
                <button class="main-btn btn-yellow border-yellow-btn"> الخدمة الثالثة</button>
                <button class="main-btn btn-yellow border-yellow-btn"> الخدمة الرابعة</button>
                <button class="main-btn btn-yellow border-yellow-btn"> الخدمة الخامسة</button>
              </div>
          </div>
        </div>
        <div class="col-12">
          <div class="categories-box">
            <h6 class="lg-title mb-2 text-center">معلومات إضافية</h2>
            <h6 class="categories-name">
              <a class="fw-bolder" data-bs-toggle="collapse" href="#categoriesMenu1" role="button" aria-expanded="true">
                <p class="m-0"> <i class="fa-solid fa-location-dot"></i> فروع المتجر </p>
                <i class="fa-solid fa-angle-down"></i>
              </a>
            </h6>
            <div class="collapse show" id="categoriesMenu1">
              <ul class="sections">
                <li>
                 <p class="mb-0">عنوان الفرع الاول</p>
                </li>
                <li>
                 <p class="mb-0">عنوان الفرع الثاني</p>
                </li>
              </ul>
            </div>
            <h6 class="categories-name">
              <a class="fw-bolder" data-bs-toggle="collapse" href="#categoriesMenu2" role="button" aria-expanded="true">
                <p class="m-0"><i class="fa-regular fa-clock"></i> أوقات العمل</p>
                <i class="fa-solid fa-angle-down"></i>
              </a>
            </h6>
            <div class="collapse show" id="categoriesMenu2">
              <ul class="sections">
                <li>
                  <p class="mb-0">من الساعة 9 صباحا حتي 6 مساءا</p>
                </li>
              </ul>
            </div>
            <h6 class="categories-name">
              <a class="fw-bolder" data-bs-toggle="collapse" href="#categoriesMenu3" role="button" aria-expanded="true">
                <p class="m-0"><i class="fa-solid fa-phone"></i> التواصل</p>
                <i class="fa-solid fa-angle-down"></i>
              </a>
            </h6>
            <div class="collapse show" id="categoriesMenu3">
              <ul class="sections">
                <li>
                  <p class="mb-2">الهاتف: 557892163052</p>
                  <p class="mb-0">الجوال: 01039858375-39</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="profile-stor-box">
            <div class="stor-info d-flex align-items-center justify-content-between mb-4">
              <div class="search-bar">
                <i class="bx bx-search"></i>
                <input type="search" name="" id="search-cus" placeholder="إبحث هنا....." />
              </div>
              <div class="inp-holder">
                <select name="" id="" class="main-select form-select">
                  <option value="">التصنيف الافتراضي</option>
                </select>
              </div>
            </div>
            <h6 class="lg-title mb-4">معلومات إضافية</h6>
            <div class="d-flex flex-column gap-3">
              <div class="box-offer">
                <div class="header-box">
                  <div class="d-flex justify-content-end">
                    <a href="" class="add-favorite">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                  <img src="{{ asset('front-assets') }}/img/decorated.webp" class="bg-img" alt="">
                </div>
                <div class="content">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="lg-title fw-normal mb-0">
                      إسم المناسبة
                    </h6>
                    <a href="#" class="main-btn ">
                      إستغل العرض
                    </a>
                  </div>
                  <div class="text mb-3">
                    لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                    أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-center">
                      <div class="price d-flex align-items-end gap-1">
                        <h4 class="mb-0">1500</h4>
                        <span class="small-price">ريال</span>
                      </div>
                      <div class="old-price d-flex align-items-center gap-1">
                        <del>1500</del>
                        ريال
                      </div>
                    </div>
                    <div class="info-user text-center">
                      <div class="img-user">
                        <img src="{{ asset('front-assets') }}/img/profile-picture.webp" alt="">
                      </div>
                      <div class="name">
                        مزود الخدمة
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-offer">
                <div class="header-box">
                  <div class="d-flex justify-content-end">
                    <a href="" class="add-favorite">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                  <img src="{{ asset('front-assets') }}/img/foods.webp" class="bg-img" alt="">
                </div>
                <div class="content">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="lg-title fw-normal mb-0">
                      إسم المناسبة
                    </h6>
                    <a href="#" class="main-btn ">
                      إستغل العرض
                    </a>
                  </div>
                  <div class="text mb-3">
                    لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                    أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-center">
                      <div class="price d-flex align-items-end gap-1">
                        <h4 class="mb-0">1500</h4>
                        <span class="small-price">ريال</span>
                      </div>
                      <div class="old-price d-flex align-items-center gap-1">
                        <del>1500</del>
                        ريال
                      </div>
                    </div>
                    <div class="info-user text-center">
                      <div class="img-user">
                        <img src="{{ asset('front-assets') }}/img/profile-picture.webp" alt="">

                      </div>
                      <div class="name">
                        مزود الخدمة
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-offer">
                <div class="header-box">
                  <div class="d-flex justify-content-end">
                    <a href="" class="add-favorite">
                      <i class="fa-regular fa-heart"></i>
                    </a>
                  </div>
                  <img src="{{ asset('front-assets') }}/img/hall.jpg" class="bg-img" alt="">
                </div>
                <div class="content">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="lg-title fw-normal mb-0">
                      إسم المناسبة
                    </h6>
                    <a href="#" class="main-btn ">
                      إستغل العرض
                    </a>
                  </div>
                  <div class="text mb-3">
                    لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                    أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-center">
                      <div class="price d-flex align-items-end gap-1">
                        <h4 class="mb-0">1500</h4>
                        <span class="small-price">ريال</span>
                      </div>
                      <div class="old-price d-flex align-items-center gap-1">
                        <del>1500</del>
                        ريال
                      </div>
                    </div>
                    <div class="info-user text-center">
                      <div class="img-user">
                        <img src="{{ asset('front-assets') }}/img/profile-picture.webp" alt="">
                      </div>
                      <div class="name">
                        مزود الخدمة
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
