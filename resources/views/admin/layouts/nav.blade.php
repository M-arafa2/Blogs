<nav class="main-navbar">
    <div class="d-flex align-items-center justify-content-between">
        <div class="tog-nav" data-tog="true">
            <i class="fas fa-bars"></i>
        </div>
        <div class="list-item gap-2">
            <a href="{{ route('admin.tickets.index', ['status' => 1]) }}" class="d-none d-md-block btn btn-purple btn-sm text-nowrap">
                <i class="fa-solid fa-bell fa-shake"></i>
                التذاكر الجديدة : {{ App\Models\Ticket::where('status', 1)->count() }}
            </a>
            <a href="{{ route('admin.carts.index', ['status' => 'processing']) }}" class="d-none d-md-block btn btn-primary btn-sm text-nowrap">
                <i class="fa-solid fa-bell fa-shake"></i>
                طلبات قيد التنفيذ : {{ App\Models\Cart::where('status', 'processing')->count() }}
            </a>
            <a href="{{ route('admin.products.index', ['status' => 1]) }}" class="d-none d-md-block btn btn-sm btn-green btn-sm text-nowrap">
                <i class="fa-solid fa-bell fa-shake"></i>
                المنتجات الجديدة : {{ App\Models\Product::where('status', 1)->count() }}
            </a>
            <!-- <a href="#" class="icon-nav">
                <i class="fa-solid fa-language"></i>
            </a> -->
            <div class="dropdown msg icon-nav">
                <div class="badge-count">{{ App\Models\ContactUs::count() }}</div>
                {{-- <button class="dropdown-toggle icon-nav" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> --}}
                    <a class="dropdown-item" href="{{ route('admin.contact-us.index') }}">
                    <i class="fa-regular fa-envelope"></i>
                </a>
                {{-- </button> --}}
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    {{-- <li><a class="dropdown-item" href="{{ route('admin.contact-us.index') }}"></a></li> --}}
                    <li></li>
                    
                </ul>
            </div>
            <!-- <div class="dropdown notice icon-nav">
                <div class="badge-count">0</div>
                <button class="dropdown-toggle icon-nav" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-bell"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#"></a></li>
                    <li></li>
                </ul>
            </div> -->
            <form action="{{ route('logout') }}" method="post" id="logout-form">
                @csrf
                <button type="submit" class="icon-nav">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="list-item justify-content-center mt-2 d-md-none gap-2">
        <a href="#" class="btn btn-primary btn-lg-sm text-nowrap">
            <i class="fa-solid fa-bell fa-shake"></i>
            طلبات التسليم : 10
        </a>
        <a href="#" class="btn btn-sm btn-green btn-lg-sm text-nowrap">
            <i class="fa-solid fa-bell fa-shake"></i>
            المنتجات الجديدة : 10
        </a>
    </div>
</nav>
