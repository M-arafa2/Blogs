@extends('admin.layouts.admin')
@section('title','التذاكر')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li class="breadcrumb-item"><a href="#">التذاكر</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        تعليقات التذكرة
      </li>
    </ol>
  </nav>
  <div class="ticket-replays mb-3">
    <div class="replay-box">
      <div class="date-holder">
        <p class="name"> {{ $ticket->user?->name }} - {{ __($ticket->user?->type) }}</p>
        <p class="date">{{ $ticket->created_at->isoFormat('D-MM-Y') }}</p>
      </div>
      <div class="replay-text">
        <p>
          {{ $ticket->description }}
        </p>
      </div>
    </div>
    @if ($ticket->comments->count() > 0)
    @foreach ($ticket->comments as $comment)
    <div class="replay-box">
      <div class="replay-text">
        <p>
          {{ $comment->comment }}
        </p>
        <div class="attached-files mt-2">
          {{-- @if($comment->filename > 0) --}}
              {{-- @foreach($comment->filename as $file)
                  <a href="{{ asset('files/' . $file->filename) }}" class="btn btn-sm btn-outline-secondary " download>
                      <i class="fa-solid fa-paperclip"></i>
                      مرفق
                  </a>
              @endforeach --}}
          {{-- @endif --}}
          {{-- <a class="btn btn-sm btn-outline-secondary" download>
            <i class="fa-solid fa-paperclip"></i>
            مرفق
          </a> --}}
        </div>
      </div>
      <div class="date-holder">
        <p class="name">{{ $comment->user->name }}</p>
        <p class="date">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} - {{ $comment->created_at->isoFormat('D-MM-Y') }}</p>
      </div>
    </div>
    @endforeach
    @endif
  </div>
  <div class="section_content content_view">
    <div class="btn-holder d-flex align-items-center justify-content-end">
      <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary btn-sm px-4">عودة للتذاكر</a>
    </div>
    <div class="card">
      <div class="card-header">
        إضافة تعليق
      </div>
      <div class="card-body">
        <form action="{{ route('admin.tickets.storeComment') }}" method="POST">
          <div class="form-group">
            @csrf
            <input type="hidden" name="user_id" value="1">
            @if(isset($ticket) && is_numeric($ticket->id))
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            @endif
            
            <label for="">التعليق</label>
            <textarea name="comment" class="form-control" rows="8"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="mt-2 btn btn-primary btn-sm px-4">حفظ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  var commentContainer = $('.ticket-replays');
  var comments = commentContainer.find('.replay-box');
  var showMoreButton = $('<button class="btn btn-primary btn-sm mt-2">عرض المزيد</button>');
  var showLessButton = $('<button class="btn btn-secondary btn-sm mt-2">عرض أقل</button>');
  var initialComments = 4; // عدد التعليقات التي تظهر أولاً
  var commentsPerLoad = 2; // عدد التعليقات التي تظرجوعاً للكود السابق، هنا هو الجزء المتبقي:


commentsPerLoad = 2; // عدد التعليقات التي تظهر عند النقر على "عرض المزيد"

  comments.slice(initialComments).hide();

  if (comments.length > initialComments) {
    showMoreButton.insertAfter(commentContainer).click(function(e) {
      e.preventDefault();
      var hiddenComments = comments.filter(':hidden');
      hiddenComments.slice(0, commentsPerLoad).show();
      if (hiddenComments.length <= commentsPerLoad) {
        showMoreButton.hide();
      }
      showLessButton.show();
    });

    showLessButton.insertAfter(commentContainer).click(function(e) {
      e.preventDefault();
      comments.slice(initialComments).hide();
      showLessButton.hide();
      showMoreButton.show();
    });

    showLessButton.hide();
  }
});
</script>
</section>
@endsection