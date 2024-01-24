@extends('admin.layouts.admin')
@section('title', 'إشعارات الاعضاء')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                إشعارات الاعضاء
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <form action="{{ route('admin.notifications.deleteAll') }}" method="post">
            @csrf
            <div class="up_element mb-2 d-flex align-items-center gap-2 flex-wrap justify-content-center justify-content-md-start">
                <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary fs-sm">
                    إضافة اشعار للكل
                </a>
                <a href="{{ route('admin.notifications.createNotificationUser') }}" class="btn btn-info fs-sm">
                    إضافة اشعار لعميل
                </a>
                <a href="{{ route('admin.notifications.createNotificationVendor') }}" class="btn btn-success fs-sm">
                    إضافة اشعار مزود خدمه
                </a>

                @if ($notifications->count() > 0)
                <button class="btn btn-danger fs-sm" onclick="return confirm('هل أنت متأكد من الحذف ؟')">حذف
                    الكل</button>
                @endif
            </div>


            <div class="table-responsive">

                @if ($notifications->count() > 0)
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الاشعار</th>
                            <th><input type="checkbox" id="checkall"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $notification->notifiable?->name }}</td>
                            <td>{{ $notification->data['body'] }}</td>
                            {{-- <td>{{ $notification->data['title'] }}</td> --}}
                            <td><input type="checkbox" class="checkbox" name="ids[]" value="{{ $notification->id }}">
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                <div class="alert alert-danger">
                    لا يوجد اشعارات
                </div>

                @endif
                {{ $notifications->links() }}
            </div>
        </form>
    </div>
</section>

@push('js')
<script>
    $("#checkall").click(function() {
        if ($("#checkall").is(':checked')) {
            $(".checkbox").each(function() {
                $(this).prop("checked", true);
            });
        } else {
            $(".checkbox").each(function() {
                $(this).prop("checked", false);
            });
        }
    });

</script>
@endpush
@endsection
