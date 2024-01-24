@extends('front.layouts.front')
@section('content')
<section class="section">
    <div class="container-md">
      <div class="text-center mb-4">
        <h3 class="md-title mb-2">التصنيفات</h3>
        <p class="mb-0">
          إبدأ التخطيط لمناسبتك بإختيار الآقسام التي تحتاجها ضمن الآقسام
          <br />
          قائمة أفضل مزودي خدمات لتختار مايناسبك بكل سهولة
        </p>
      </div>
      <div class="head-section d-flex align-items-center justify-content-between mb-4">
        <div class="inp-holder">
          <select name="" id="" class="main-select form-select">
            <option value="">التصنيف الافتراضي</option>
          </select>
        </div>
        <button class="btn-sliders" data-bs-toggle="modal" data-bs-target="#filterModal">
          <i class="fa fa-sliders"></i>
        </button>
        <div class="modal fade" id="filterModal" aria-labelledby="filterModalModal" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close ms-0 me-auto transaction" data-bs-dismiss="modal"
                  aria-label="Close">
                  <i class="fa fa fa-chevron-right"></i>
                  <span>عودة</span>
                </button>
                <h6 class="modal-title m-0" id="financialTransactionsModal">
                  فلاتر البحث
                </h6>
              </div>
              <div class="modal-body">
                <div class="row g-3">
                  <div class="col-12 col-md-3">
                    <div class="search-bar mb-3">
                      <i class="bx bx-search"></i>
                      <input type="search" name="" id="search-cus" placeholder="إبحث هنا....." />
                    </div>
                    <div class="categories-box">
                      <h6 class="categories-name">
                        <a class="fw-bolder" data-bs-toggle="collapse" href="#categoriesMenu1" role="button"
                          aria-expanded="true">
                          كل الآقسام
                          <i class="fa-solid fa-angle-down"></i>
                        </a>
                      </h6>
                      <div class="collapse show" id="categoriesMenu1">
                        <ul class="sections">
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الآول
                            </label>
                          </li>
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الثاني
                            </label>
                          </li>
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الثالث
                            </label>
                          </li>
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الرابع
                            </label>
                          </li>
                        </ul>
                      </div>
                      <h6 class="categories-name">
                        <a class="fw-bolder" data-bs-toggle="collapse" href="#categoriesMenu2" role="button"
                          aria-expanded="true">
                          القسم الأول
                          <i class="fa-solid fa-angle-down"></i>
                        </a>
                      </h6>
                      <div class="collapse show" id="categoriesMenu2">
                        <ul class="sections">
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الآول
                            </label>
                          </li>
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الثاني
                            </label>
                          </li>
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الثالث
                            </label>
                          </li>
                          <li>
                            <label for="" class="d-flex align-items-center gap-2">
                              <input class="form-check-input bg-inp-check" type="radio" name="" id="" />
                              القسم الرابع
                            </label>
                          </li>
                          <li>
                            <button class="main-btn mx-auto py-2 px-3 fs-12 rounded-2">إعادة الفرز</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column gap-3 mb-4">
        <div class="box-offer">
          <div class="header-box">
            <div class="d-flex justify-content-end">
              <a href="" class="add-favorite">
                <i class="fa-regular fa-heart"></i>
              </a>
            </div>
            <img src="{{ asset('front-assets') }}/img/decorated.webp" alt="" class="bg-img">
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
            <img src="{{ asset('front-assets') }}/img/foods.webp" alt="" class="bg-img">
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
            <img src="{{ asset('front-assets') }}/img/hall.jpg" alt="" class="bg-img">
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
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link">السابق</a>
          </li>
          <li class="page-item"><a class="page-link active" href="#">01</a></li>
          <li class="page-item"><a class="page-link" href="#">02</a></li>
          <li class="page-item"><a class="page-link" href="#">03</a></li>
          <li class="page-item"><a class="page-link" href="#">04</a></li>
          <li class="page-item">
            <a class="page-link" href="#">التالي</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
@endsection
