@extends('admin.layouts.admin')
@section('title','الاقسام الفرعية')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        الأقسام الفرعية
      </li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="up_element mb-2">
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#create">
        إضافة
      </button>
      @include('admin.sub-department.create-modal')
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>صوره</th>
            <th>الاسم</th>
            <th>القسم  الرئيسي</th>
            <th>الحاله</th>
            <th class="text-nowrap">تاريخ الانشاء</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($departments as $department)

          <tr>
            <th>{{ $loop->iteration }}</th>
            <td>
              @if($department->cover)
              <img src="{{ asset('admin-assets/img/department/'.$department->cover) }}" alt="{{ $department->name }}"
                class="img-thumbnail" width="100px">
              @else
              <img src="{{ asset('admin-assets/img/no-image.jpg') }}" alt="{{ $department->name }}"
                class="img-thumbnail" width="100px">
              @endif
            </td>
            <td>{{ $department->name }}</td>
            <td>{{ $department->parent != null ? $department->parent->name : '-' }}</td>
            <td>{{ $department->status==1? 'مفعل':'غير مفعل' }}</td>

            <td class="text-nowrap">{{ $department->created_at()}}</td>
            <td class="d-flex gap-1">
              <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                data-bs-target="#edit{{ $department->id }}">
                <i class="fa-solid fa-pen"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                data-bs-target="#delete{{ $department->id }}">
                <i class="fa-solid fa-trash"></i>
              </button>

              @include('admin.sub-department.edit-modal',['department'=>$department])
              @include('admin.sub-department.delete-modal',['department'=>$department])
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{ $departments->links() }}
    </div>
  </div>
</section>
@endsection
