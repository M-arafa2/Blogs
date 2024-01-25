<div class="sidebar">
    <div class="close tog-nav">
        <i class="fas fa-xmark"></i>
    </div>
    <img src="{{ asset('admin-assets/img/settings/site-logo.png') }}" alt="" class="logo" />
    <ul class="list">
        <li class="list-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}">
                <div>
                    <i class="fa-solid fa-desktop icon"></i>
                    الواجهة
                </div>
            </a>
        </li>
        <!-- <li class="list-item">
            <a data-bs-toggle="collapse" href="#notices" aria-expanded="false">
                <div>
                    <i class="fa-solid fa-bell icon"></i>
                    الإشعارات الإدارية
                </div>
                <div class="badge-count">0</div>
                <i class="fa-solid fa-angle-right arrow"></i>
            </a>
        </li>
        <div class="collapse item-collapse" id="notices">
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        الكل
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        عميل جديد
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        مقدم خدمه جديد
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        طلب جديد
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        تذكرة دعم فني
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>

            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        طلب تسليم
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        طلب شحن رصيد
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        طلب سحب رصيد
                    </div>
                    <div class="badge-count">0</div>
                </a>
            </li>
        </div> -->
        <li class="list-item {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
            <a data-bs-toggle="collapse" href="#user-notices" aria-expanded="false">
                <div>
                    <i class="fa-solid fa-bell icon"></i>
                    إشعارات الأعضاء
                </div>
                <i class="fa-solid fa-angle-right arrow"></i>
            </a>
        </li>
        <div class="collapse item-collapse {{ request()->routeIs('admin.notifications.*') ? 'show' : '' }}" id="user-notices">
            <li class="list-item">
                <a href="{{ route('admin.notifications.index') }}">
                    <div>
                        <i class="fa-solid fa-bell icon"></i>
                        الكل
                    </div>
                </a>
            </li>
        </div>
        <li class="list-item">
            <a data-bs-toggle="collapse" href="#settings" aria-expanded="false">
                <div>
                    <i class="fas fa-cogs icon"></i>
                    الاعدادات
                </div>
                <i class="fas fa-angle-down arrow"></i>
            </a>
        </li>

        <div class="collapse item-collapse {{ request()->routeIs('admin.settings.*', 'admin.departments.*', 'admin.sub-departments.*', 'admin.sliders.*', 'admin.questions') ? 'show' : '' }}" id="settings">
            <ul>
                <li class="list-item {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}">
                        <div>
                            <i class="fas fa-sliders-h icon"></i>
                            الاعدادات العامة
                        </div>
                    </a>
                </li>
                <li class="list-item {{ request()->routeIs('admin.departments.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.departments.index') }}">
                        <div>
                            <i class="fas fa-list icon"></i>
                            الاقسام
                        </div>
                    </a>
                </li>
                {{-- <li class="list-item {{ request()->routeIs('admin.sub-departments.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.sub-departments.index') }}">
                        <div>
                            <i class="fas fa-list icon"></i>
                            الاقسام الفرعية
                        </div>
                    </a>
                </li> --}}
                <li class="list-item {{ request()->routeIs('admin.sliders.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">
                        <div>
                            <i class="fas fa-list icon"></i>
                            السليدر
                        </div>
                    </a>
                </li>
                <!-- <li class="list-item">
                    <a href="">
                        <div>
                            <i class="fas fa-cogs icon"></i>
                            إعدادات العضويات
                        </div>
                    </a>
                </li> -->
                <!-- <li class="list-item">
                    <a href="">
                        <div>
                            <i class="far fa-comments icon"></i>
                            حسابات التواصل
                        </div>
                    </a>
                </li> -->
                <li class="list-item {{ request()->routeIs('admin.questions') ? 'active' : '' }}">
                    <a href="{{route('admin.questions')}}">
                        <div>
                            <i class="far fa-comments icon"></i>
                            الاسئلة الشائعة
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <li class="list-item">
            <a data-bs-toggle="collapse" href="#admins" aria-expanded="false">
                <div>
                    <i class="fa-solid fa-users-gear icon"></i>
                    المشرفين
                </div>
                <i class="fa-solid fa-angle-right arrow"></i>
            </a>
        </li>
        <div class="collapse item-collapse" id="admins">
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-users-gear icon"></i>
                        كل المشرفين
                    </div>
                </a>
            </li>
            <li class="list-item">
                <a href="">
                    <div>
                        <i class="fa-solid fa-user-pen icon"></i>
                        صلاحيات المشرفين
                    </div>
                </a>
            </li>
        </div>

        {{-- userssssss --}}
        <li class="list-item">
            <a data-bs-toggle="collapse" href="#users" aria-expanded="false">
                <div>
                    <i class="fa-solid fa-users icon"></i>
                    المستخدمين
                </div>
                <i class="fa-solid fa-angle-right arrow"></i>
            </a>
        </li>
        <div class="collapse item-collapse " id="users" >
            <li class="list-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <div><i class="fa-solid fa-user icon"></i>العملاء</div>
                    <div class="badge-count">{{ App\Models\User::where('type','user')->count() }}</div>
                </a>
            </li>
            <li class="list-item {{ request()->routeIs('admin.vendors.index') ? 'active' : '' }}">
                <a href="{{ route('admin.vendors.index') }}">
                    <div><i class="fa-solid fa-user icon"></i>مزود الخدمه</div>
                    <div class="badge-count">{{ App\Models\User::where('type','vendor')->count() }}</div>
                </a>
            </li>
            {{-- <li class="list-item">
				<a data-bs-toggle="collapse" href="#usersNested" aria-expanded="false">
					<div>
						<i class="fa-solid fa-user icon"></i>
						العملاء
					</div>
					<i class="fa-solid fa-angle-right arrow"></i>
				</a>
			</li>
			<div class="collapse item-collapse" id="usersNested">
				<li class="list-item">
					<a href="{{ route('admin.users.index') }}">
            <div>
                <i class="fa-solid fa-user icon"></i>
                العملاء
            </div>
            <div class="badge-count">{{ App\Models\User::clientsindividual()->count() }}</div>
            </a>
            </li>

        </div> --}}
        {{-- <li class="list-item">
				<a data-bs-toggle="collapse" href="#clientsCoordinator" aria-expanded="false">
					<div>
						<i class="fa-solid fa-user icon"></i>
						المنسقين
					</div>
					<i class="fa-solid fa-angle-right arrow"></i>
				</a>
			</li>
			<div class="collapse item-collapse" id="clientsCoordinator">
				<li class="list-item">
					<a href="{{ route('admin.users.type', 'clientsCoordinator') }}">
        <div>
            <i class="fa-solid fa-building-user icon"></i>
            المنسقين
        </div>
        <div class="badge-count">{{ App\Models\User::clientsCoordinator()->count() }}</div>
        </a>
        </li>

</div> --}}
{{-- <li class="list-item">
				<a data-bs-toggle="collapse" href="#lawyer" aria-expanded="false">
					<div>
						<i class="fa-solid fa-user-tie icon"></i>
						مزود الخدمة
					</div>
					<i class="fa-solid fa-angle-right arrow"></i>
				</a>
			</li> --}}
{{-- <div class="collapse item-collapse" id="lawyer">
				<li class="list-item">
					<a href="{{ route('admin.users.type', 'vendorsIndividual') }}">
<div>
    <i class="fa-solid fa-user-tie icon"></i>
    مزود الخدمة
</div>
<div class="badge-count">{{ App\Models\User::vendorsindividual()->count() }}</div>
</a>
</li>
</div> --}}
</div>
{{-- end userssssssssssssss --}}
{{-- <li class="list-item ">
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <div>
            <i class="fa-solid fa-clipboard icon"></i>
            المنتجات
        </div>
    </a>
</li> --}}
<li class="list-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
    <a href="{{ route('admin.products.index') }}">
        <div>
            <i class="fa-solid fa-clipboard icon"></i>
            المنتجات
        </div>
    </a>
</li>
<li class="list-item">
    <a data-bs-toggle="collapse" href="#carts" aria-expanded="false">
        <div>
            <i class="fa-solid fa-cart-flatbed-suitcase icon"></i>
            الطلبات
        </div>
        <i class="fa-solid fa-angle-right arrow"></i>
    </a>
</li>
<div class="collapse item-collapse" id="carts">
    <li class="list-item {{ request()->routeIs('admin.carts.*') ? 'active' : '' }}">
        <a href="{{ route('admin.carts.index') }}">
            <div>
                <i class="fa-solid fa-cart-flatbed-suitcase icon"></i>
                كل الطلبات
            </div>
        </a>
    </li>
</div>

{{-- <li class="list-item"> --}}
    <li class="list-item {{ request()->routeIs('admin.supports') ? 'active' : '' }}">

    <a href="{{ route('admin.supports') }}">
        <div>
            <i class="fa-solid fa-cart-flatbed-suitcase icon"></i>
            طلبات المنسقين
        </div>
    </a>
</li>
<li class="list-item">
    <a href="{{ route('admin.blogs.index') }}">
        <div>
            <i class="fa-solid fa-clipboard icon"></i>
            Blogs
        </div>
    </a>
</li>
<li class="list-item">
    <a data-bs-toggle="collapse" href="#services" aria-expanded="false">
        <div>
            <i class="fa-solid fa-network-wired icon"></i>
            خدمات الموقع
        </div>
        <i class="fa-solid fa-angle-right arrow"></i>
    </a>
</li>
<div class="collapse item-collapse" id="services">
    <li class="list-item {{ request()->routeIs('admin.countries.index') ? 'active' : '' }}">
        <a href="{{ route('admin.countries.index') }}">
            <div>
                <i class="fa-solid fa-window-maximize icon"></i>
                الدول
            </div>
        </a>
    </li>
    <li class="list-item {{ request()->routeIs('admin.cities.index') ? 'active' : '' }}">
        <a href="{{ route('admin.cities.index') }}">
            <div>
                <i class="fa-solid fa-window-maximize icon"></i>
                المدن
            </div>
        </a>
    </li>
    {{-- <li class="list-item">
        <a href="{{ route('admin.questions') }}">
            <div>
                <i class="fa-solid fa-window-maximize icon"></i>
                سؤال و جواب
            </div>
        </a>
    </li> --}}
    <li class="list-item {{ request()->routeIs('admin.sitepages.*') ? 'active' : '' }}">
        <a href="{{ route('admin.sitepages.index') }}">
            <div>
                <i class="fa-solid fa-window-maximize icon"></i>
                صفحات الموقع
            </div>
        </a>
    </li>
</div>
<li class="list-item">
    <a data-bs-toggle="collapse" href="#support" aria-expanded="false">
        <div>
            <i class="fa-solid fa-headset icon"></i>
            الدعم الفني
        </div>
        <i class="fa-solid fa-angle-right arrow"></i>
    </a>
</li>
<div class="collapse item-collapse" id="support">
    <li class="list-item {{ request()->routeIs('admin.tickets.index') ? 'active' : '' }}">
        <a href="{{ route('admin.tickets.index') }}">
            <div>
                <i class="fa-solid fa-ticket icon"></i>
                التذاكر
                <div class="badge-count">{{ App\Models\Ticket::count() }}</div>
            </div>
            {{-- {{ App\Models\Ticket::where('status',1)->count() }} --}}
        </a>
    </li>
</div>
<li class="list-item">
    <a data-bs-toggle="collapse" href="#contact" aria-expanded="false">
        <div>
            <i class="fa-solid fa-phone-flip icon"></i>
            اتصل بنا
        </div>
        <i class="fa-solid fa-angle-right arrow"></i>
    </a>
</li>
<div class="collapse item-collapse {{ request()->is('admin/contact-us*') ? 'show' : '' }}" id="contact">
    <li class="list-item {{ request()->routeIs('admin.contact-us.index') ? 'active' : '' }}">
        <a href="{{ route('admin.contact-us.index') }}">
            <div>
                <i class="fa-solid fa-download icon"></i>
                اتصل بنا
            </div>
        </a>
    </li>
</div>
</ul>
</div>
