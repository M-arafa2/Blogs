@props(['vendor'])
<a href="{{ route('vendor.show', $vendor->id) }}" class="box-add-product">
    <div class="data d-flex align-items-center gap-3">
        <img src="{{ $vendor->image
            ? asset('/images/vendor/' . $vendor->image)
            : 'https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png' }}"
            alt="" class="img">

            {{-- {{ asset('images/vendor/'.$vendor->image) }}" --}}
        <div class="d-flex flex-column gap-1">
            <div class="title">
                {{ $vendor->name }}
            </div>
            <div class="mb-2 d-flex align-items-stretch justify-content-center gap-2">
                <span class="info">
                    {{ $vendor->name }}
                </span>
                {{-- <span class="bar"></span> --}}
                {{-- <span>
                    <i class="fa-solid fa-star icon"></i>
                    4.2
                </span> --}}
                {{-- <span>
                    <i class="fa-solid fa-star icon"></i>
                {{$vendor->rating? : '3.4'}}
                </span> --}}
            </div>
        </div>
    </div>
</a>
