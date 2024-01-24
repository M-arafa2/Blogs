<header class="header" id="header">
    <nav class="navbar main-nav py-1">
        <div class="container-md">
            <ul class="navbar-nav nav-menu align-items-center align-items-md-start" id="nav-menu">
                <li class="nav-item">
                    @if(auth()->user())
                    @if (auth()->user()->type == 'user')
                    <a class="nav-link" href="{{ route('user.profile') }}">
                        <i class='bx bx-user nav-icon'></i>
                        <span class="nav-name">الملف الشخصي</span>
                    </a>
                    <a class="nav-link" href="{{ route('orders') }}">
                        <i class='nav-icon bx bx-shopping-bag'></i>
                        <span class="nav-name">الطلبات</span>
                        <span class="badge-main" id="num-shop">
                            @{{ lengthProducts }}
                        </span>
                    </a>
                    @endif
                    @if (auth()->user()->type == 'vendor')
                    <a class="nav-link" href="{{ route('vendor.profile') }}">
                        <i class='bx bx-user nav-icon'></i>
                        <span class="nav-name">الملف الشخصي</span>
                    </a>
                    <a class="nav-link" href="{{ route('balance.index') }}">
                        <i class='nav-icon bx bx-shopping-bag'></i>
                        <span class="nav-name">الطلبات</span>
                        <span class="badge-main" id="num-shop">
                            @{{ lengthProducts }}
                        </span>
                    </a>
                    @endif
                    @endif

                    <a class="nav-link" href="{{ route('vendor.conversations') }}">
                        <i class='nav-icon bx bx-send'></i>
                        <span class="nav-name">المراسلات</span>
                    </a>
                    <a class="nav-link" href="{{ route('front.home') }}">
                        <i class="nav-icon bx bx-home"></i>
                        <span class="nav-name">الرئيسية</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    let header = new Vue({
        el: "#header",

        data: {
            userId: "{{ auth()->user()->id??'' }}"
            , lengthProducts: null
        , }
        , mounted() {
            // Get lengthProducts
            axios
                .get(`/api/cart?user_id=${this.userId}`)
                .then(response => {
                    if (Object.keys(response.data).length > 0) {
                        this.lengthProducts = response.data.products.length
                    } else {
                        this.lengthProducts = 0
                    }
                })
        },

    });

</script>
