@include('front.layouts.head')

@include('front.layouts.nav')

@yield('content')

@include('front.layouts.nav-bottom')

@include('sweetalert::alert')

@include('front.layouts.footer')
