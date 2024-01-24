@extends('admin.layouts.admin')
@section('title','العملاء')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">العملاء</li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="info_holder d-flex align-items-center flex-wrap  gap-2 mb-2">
      <div class="up_element">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
          إضافة
        </a>
      </div>
      <button class="btn btn-green">عملاء مفعلين: {{ $active }}</button>
      <button class="btn btn-danger">عملاء غير مفعلين: {{ $unactive }}</button>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>صوره</th>
            <th>الاسم</th>
            <th>الجوال</th>
            <th>الإيميل</th>
            <th>الدوله</th>
            <th>المدينة</th>
            <th>الحاله</th>
            <th>تاريخ الاضافه</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th>{{ $loop->iteration }}</th>
            <td>
                @if($user->image)
                <img src="{{ asset('images/user/'.$user->image) }}" alt="{{ $user->name }}" class="img-thumbnail" width="100px">
                @else
                <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $user->name }}" class="img-thumbnail" width="100px">
                @endif
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country?->name }}</td>
            <td>{{ $user->city?->name }}</td>
            <td class="text-nowrap">
              <span class=" btn btn-{{ $user->status == 1 ? 'success' : 'danger'  }} btn-sm">
                {{ $user->status == 1 ? 'مفعل':'غير مفعل' }}
              </span>
              <i class='fa fa-exchange mx-1'></i>
              <a href="{{route('admin.user.change_status',encrypt($user->id))}}"
                title="للتحويل الى  {{ ($user->status == 1) ? 'غير مفعل': 'مفعل'}}">
                {{ $user->status == 1 ? 'غير مفعل' : 'مفعل' }}
              </a>
            </td>
            <td>{{ $user->created_at() }}</td>
            <td>
                @include('admin.user.action')
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </div>
</section>
@endsection
