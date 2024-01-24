@if(session()->has('error'))
<div class="alert w-50 w-100-sm mt-3 mb-0 m-auto d-block px-2 alert-warning alert-dismissible" role="alert">
    <div class="d-flex align-items-center gap-2 justify-content-between">
        <h6><i class="icon fas fa-exclamation-triangle"></i> {{ trans('admin.alert') }}!</h6>
        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
    </div>
    {{ session('error') }}
</div>
@endif
@if(session()->has('success'))
<div class="alert w-50 w-100-sm mt-3 mb-0 d-block m-auto px-3 top-0 alert-success alert-pop alert-dismissible" role="alert">
    <div class="d-flex align-items-center gap-2 justify-content-between">
        {{ session('success') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
    </div>
</div>
@endif
@if(count($errors->all()) > 0)
<div class="alert mt-3 mb-0 w-100-sm d-block px-2 alert-warning alert-dismissible" role="alert">
    <div class="d-flex align-items-center gap-2 justify-content-between">
        <h6><i class="icon fas fa-exclamation-triangle"></i> تحذير</h6>
        <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
    </div>
</div>
@endif
