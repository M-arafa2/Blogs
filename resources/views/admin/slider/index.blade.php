@extends('admin.layouts.admin')
@section('title','السلايدر')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        السلايدر
      </li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="up_element mb-2">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        إضافة
      </button>
      @include('admin.slider.create-modal')
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>صوره</th>
            <th>العنوان</th>
            <th>رابط السلايدر</th>
            {{-- <th>المحتوى</th> --}}
            <th>الحاله</th>
            <th class="text-nowrap">تاريخ الانشاء</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sliders as $slider)

          <tr>
            <th>{{ $loop->iteration }}</th>
            <td>
              @if($slider->cover)
              <img src="{{ asset('admin-assets/img/slider/'.$slider->cover) }}" alt="{{ $slider->name }}"
                class="img-thumbnail" width="100px">
              @else
              <img src="{{ asset('admin-assets/img/no-image.jpg') }}" alt="{{ $slider->name }}" class="img-thumbnail"
                width="100px">
              @endif
            </td>
            <td class="text-nowrap">{{ $slider->title }}</td>
            <td class="text-nowrap">{{ $slider->url }}</td>
            {{-- <td class="text-nowrap">{{ Str::limit($slider->subtitle,20) }}</td> --}}
            <td>{{ $slider->status()}}</td>
            <td class="text-nowrap">{{ $slider->created_at()}}</td>
            <td class="d-flex gap-1">
              <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                data-bs-target="#edit{{ $slider->id }}">
                <i class="fa-solid fa-pen"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                data-bs-target="#delete{{ $slider->id }}">
                <i class="fa-solid fa-trash"></i>
              </button>

              @include('admin.slider.edit-modal',['slider'=>$slider])
              @include('admin.slider.delete-modal',['slider'=>$slider])
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{ $sliders->links() }}
    </div>
  </div>
</section>
@endsection
