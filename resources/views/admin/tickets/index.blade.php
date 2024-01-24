@extends('admin.layouts.admin')
@inject('ticket', 'App\Models\Ticket')
@section('title','التذاكر')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        التذاكر
      </li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="d-flex align-items-center justify-content-start flex-wrap gap-1 mb-2">
      <button type="button" class="btn btn-sm btn-primary px-4" data-bs-toggle="modal" data-bs-target="#create">
        إضافة
      </button>
      @include('admin.tickets.create-modal')
      <a href="#" class="btn btn-info btn-sm">الكل: {{ App\Models\Ticket::count() }}</a>
      <a href="#" class="btn btn-warning btn-sm">مفتوحة: {{ App\Models\Ticket::where('status',1)->count() }}</a>
      <a href="#" class="btn btn-danger btn-sm">مغلقة: {{ App\Models\Ticket::where('status',0)->count() }}</a>
      <a href="#" class="btn btn-success btn-sm">تم الرد: {{ App\Models\Ticket::has('comments')->count() }}</a>    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th class="text-nowrap">عنوان التذكره</th>
            <th>موضوع التذكره</th>
            <th> المرفقات</th>

            <th>الحالة</th>
            <th>التعليقات</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $question)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-nowrap">{{ $question->title }}</td>
            <td class="text-nowrap">{{ $question->subject }}</td>
            <td>
            @if ($question->image)
            @if (Str::endsWith($question->image, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
              {{-- <a  class="btn btn-sm btn-success" href="{{ display_file($question->image) }}" width="50" target="_blank"> صورة التذكرة</a> --}}
              <a  class="btn btn-sm btn-success" href="{{ asset('uploads/tickets/'.$question->image) }}" width="50" target="_blank"> عرض المرفق
                {{-- <img src="{{ asset('uploads/tickets/'.$question->image) }}" alt="{{ $question->name }}" class="img-thumbnail" width="100px"> --}}
            </a>
            @else
              <a class="btn btn-sm btn-success" href="{{ display_file($question->image) }}" target="_blank">  عرض المرفق</a>
              <img src="{{ asset('uploads/tickets/'.$question->image) }}" alt="{{ $question->name }}" class="img-thumbnail" width="100px">

            @endif
          @else
            {{-- <span class="red-text">لا يوجد منيو</span> --}}
            <a  class="btn btn-sm btn-danger" href="#" > لا يوجد مرفق</a>

          @endif
            </td>
        </td>
            <td>
                @if($question->status == "1")
              <span class="badge bg-success">مفتوحة</span>
              @else
              <span class="badge bg-warning">مغلقة</span>
              @endif
            </td>
            <td>
              <a class="btn btn-secondary btn-sm" href="{{ route('admin.replaysTicket', ['id' => $question->id]) }}">
                التعليقات
                ({{ $question->comments->count() }})
            </a>

            </td>
            <td class="d-flex gap-1">
              <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                data-bs-target="#edit{{ $question->id }}">
                <i class="fa-solid fa-pen"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                data-bs-target="#delete{{ $question->id }}">
                <i class="fa-solid fa-trash"></i>
              </button>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add_comment">
                أضف تعليق
              </button>
              <div class="modal fade" id="add_comment" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">إضافة تعليق -{{ $question->title }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.tickets.storeComment') }}" method="POST">
                      <div class="modal-body">
                        @csrf
 
          
                        <div class="form-group">
                          <label for="">التعليق</label>
                          <input type="hidden" name="user_id" value="1">
                          <input type="hidden" name="ticket_id" value="{{ $question->id }}">
                          {{-- @if(isset($ticket) && is_numeric($ticket->id))
                  <input type="hidden" name="ticket_id" value="{{ ['id' => $question->id]}}">
              @endif --}}
                          <textarea name="comment" class="form-control" rows="8"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @include('admin.tickets.edit-modal',['department'=>$question])
              @include('admin.tickets.delete-modal',['department'=>$question])
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{ $tickets->links() }}
    </div>
  </div>
</section>
@endsection
