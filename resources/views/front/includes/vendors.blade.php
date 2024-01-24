@props(['vendors'])
<div class="intro-section">
    <h4 class="title"> مقدمي الخدمات</h4>
    <a href="{{ route('vendors.index') }}" class="show-more">عرض الكل</a>
</div>
<div class="d-flex flex-column gap-4">
    @foreach ($vendors as $vendor)

        @include('front.includes.vendor-card', ['vendor' => $vendor])
    @endforeach
</div>
