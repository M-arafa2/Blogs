<nav class="top-nav py-2">
    <div class="container-md">
        <div class="nav-content">
            <div class="navbar">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar ">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            @if (auth()->user())

                            @if (auth()->user()->image)
                            <li class="nav-item nav-img">
                                <a href="#">
                                    @if (auth()->user()->type == 'vendor')
                                    <img src="{{ asset('images/vendor/' . auth()->user()->image) }}" alt="" class="img-user">
                                    @elseif(auth()->user()->type == 'user')
                                    <img src="{{ asset('images/user/' . auth()->user()->image) }}" alt="" class="img-user">
                                    @else
                                    <img src="{{ asset('admin-assets/img/no-image.JPEG') }}" class="img-user" class="img-user" alt="">
                                    @endif

                                </a>
                                <a href="#">
                                    <h5>{{ auth()->user()->name }}</h5>
                                </a>
                                <p>{{ auth()->user()->phone }}</p>
                            </li>
                            @endif
                            @else
                            <li class="nav-item nav-img">
                                <img src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" class="img-user" alt="">
                                <h5>مرحبا بك</h5>
                                <p class="fs-15px mt-2">سجل الدخول لتتمكن من الاستفادة من خدمات التطبيق</p>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('front.home') ? 'active' : '' }}" href="{{ route('front.home') }}">
                                    <i class="nav-icon bx bx-home blue-light-color"></i>
                                    الرئيسية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                                    <i class='bx bx-log-in blue-light-color'></i>
                                    تسجيل الدخول
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">
                                    <i class='bx bx-user-plus blue-light-color'></i>
                                    تسجيل جديد
                                </a>
                                @endif
                                @if (auth()->user())
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('front.home') ? 'active' : '' }}" href="{{ route('front.home') }}">
                                    <i class="nav-icon bx bx-home blue-light-color"></i>
                                    الرئيسية
                                </a>
                            </li>
                            @if (auth()->user()->type == 'vendor')
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('ordersVendor') }}"> --}}
                                <a class="nav-link {{ request()->routeIs('ordersVendor') ? 'active' : '' }}" href="{{ route('ordersVendor') }}">

                                    <i class='bx bx-shopping-bag blue-light-color'></i>
                                    الطلبات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('vendor.products.index') ? 'active' : '' }}" href="{{ route('vendor.products.index') }}">
                                    <i class="fa-solid fa-cart-shopping blue-light-color"></i>
                                    المنتجات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('vendor.profile') || request()->routeIs('vendor.editprofile') ? 'active' : '' }}" href="{{ route('vendor.profile') }}">
                                    <i class='bx bx-user blue-light-color'></i>
                                    الملف الشخصي
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('balance.index') ? 'active' : '' }}" href="{{ route('balance.index') }}">
                                    <i class='bx bx-wallet blue-light-color'></i>
                                    الرصيد
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('tickets') ? 'active' : '' }}" href="{{ route('tickets') }}">
                                    <i class='bx bx-support blue-light-color'></i>
                                    التذاكر
                                </a>
                            </li>
                            @if (auth()->user()->type == 'user')
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('orders') ? 'active' : '' }}" href="{{ route('orders') }}">
                                    <i class='bx bx-shopping-bag blue-light-color'></i>
                                    الطلبات
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('ordersUser') ? 'active' : '' }}" href="{{ route('ordersUser') }}">
                                    <i class='bx bx-shopping-bag blue-light-color'></i>
                                    الطلبات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('','user.editProfile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
                                    <i class='bx bx-user blue-light-color'></i>
                                    الملف الشخصي
                                </a>
                            </li>
                            @endif
                            @endif
                        </ul>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-5 mb-0">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('front.about') ? 'active' : '' }}" href="{{ route('front.about') }}">
                                    <i class='bx bx-error-alt blue-light-color'></i>
                                    حول التطبيق
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">
                                    <i class='bx bx-info-square blue-light-color'></i>
                                    ألاسئلة الشائعة
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('front.terms-of-use') ? 'active' : '' }}" href="{{ route('front.terms-of-use') }}">
                                    <i class='bx bx-book-bookmark blue-light-color'></i>
                                    شروط الاستخدام
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                    <i class='bx bx-phone blue-light-color'></i>
                                    أتصل بنا
                                </a>
                            </li>
                            {{-- @if (auth()->user()) --}}
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" aria-expanded="false" href="#address" class="nav-link d-fex justify-content-between">
                                    <div class="text">
                                        <i class="fa-solid fa-compass blue-light-color"></i>
                                        صفحات الموقع
                                    </div>
                                    <i class="fas fa-angle-right arrow"></i>
                                </a>
                            </li>
                            <div class="collapse" id="address">
                                <ul>
                                    @foreach(\App\Models\Sitepage::all() as $page)
                                    <li class="nav-item item-collapse">
                                        <a class="nav-link {{ request()->routeIs('user.pages.show') ? 'active' : '' }}" href="{{ route('user.pages.show', $page->id) }}">
                                            <!-- <i class='bx bx-phone blue-light-color'></i> -->
                                            <i class="fa-solid fa-thumbtack blue-light-color"></i>
                                            {{ $page->address }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- @endif --}}
                            @if (auth()->user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-in blue-light-color'></i>
                                    تسجيل خروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endif

                            @if (auth()->user())
                            <li class="nav-item">
                                <button class="nav-link text-danger out-btn bg-transparent w-100" data-bs-toggle="modal" data-bs-target="#delete" data-bs-dismiss="offcanvas"><i class='bx bx-trash'></i> حذف الحساب</button>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('support.list') ? 'active' : '' }}" href="{{ route('support.list') }}">
                                    <i class="nav-icon bx bx-support blue-light-color"></i>
                                    المنسق البشري
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hello-message">
                @if (auth()->user())
                <p class="d-flex align-items-center gap-1">مرحبا مجددا {{ auth()->user()->name }}<i class="fa-solid fa-hands-clapping"></i></p>
                @endif
                <span>كيف يمكنني مساعدتك اليوم؟</span>
            </div>
            @if (auth()->user())
            <div class="notification-holder">
                <button class="notification-btn">
                    @if (auth()->user()->unreadNotifications->count() > 0)
                    <span class="badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                    <img src="{{ asset('front-assets/img/Notification.png') }}" alt="Notification" width="22" height="26">
                </button>
                {{-- @dd(auth()->user()->unreadNotifications) --}}
                <div class="notification-list">
                    <ul class="list">
                        @foreach (auth()->user()->notifications()->paginate(10) as $notification)
                        <li class="list-item">
                            <div class="holder-not" class="mb-0" onclick="markNotificationAsRead('{{ $notification->id }}')">
                                <div class="holder">
                                    <img src="{{ asset('front-assets/images/icon/correct-mark.png') }}" alt="">
                                    <p class="title">{{ $notification->data['title']}}</p>
                                    <p class="title">{{ $notification->data['body']}}</p>

                                </div>
                                <small class="date">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <script>
                        function markNotificationAsRead(notificationId) {
                            fetch(`/mark-notification-as-read/${notificationId}`, {
                                    method: 'PUT'
                                    , headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        , 'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => {
                                    if (response.ok) {
                                        location.reload();
                                    } else {
                                        console.log('حدث خطأ أثناء قراءة الإشعار');
                                    }
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                        }

                    </script>
                </div>
            </div>

            @endif
        </div>

    </div>
</nav>
<div class="modal fade" tabindex="1" id="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف الحساب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.delete.account') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    هل أنت متأكد من حذف الحساب ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary btn-sm px-3">نعم</button>
                </div>
            </form>
        </div>
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
