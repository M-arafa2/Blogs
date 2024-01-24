@extends('front.layouts.front')

@section('content')

 <section class="section">
        <div class="container py-5">
            <div class="boxes-order">
                <div class="box-order">

                    <div class="content">
                        <div class="header-box">
                            <div class="item">
                                تذكرة رقم : <span class="count">{{$ticket->id}}</span>

                            </div>
                            <div class="item">
                                <i class="fa-solid fa-calendar-day"></i>
                               {{$ticket->created_at->format('Y-m-d')}}
                            </div>

                            <div class="item">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{$ticket->id}}
                            </div>

                            <div class="item">
                                    <span class="badge bg-{{$ticket->status == '1' ? 'primary' : 'warning'}}">{{$ticket->status == '1' ?'مفتوحة' : 'مغلقة'}}</span>
                                    <!-- <span class="badge bg-success">تم الرد</span> -->
                                    <!-- <span class="badge bg-danger">مغلقة</span> -->
                            </div>

                        </div>
                        <div class="hr my-3"></div>
                        <h5 class="title-order">
                             {{$ticket->subject}}
                        </h5>
                        <div class="content-order ">
                            {{$ticket->desc}}
                        </div>

                    </div>
                </div>

                @if($ticket->comments)
                    <div class="comments">
                        @foreach($ticket->comments as $comment)
                            <div class="box-order mb-2">
                                <div class="content">
                                    <h5 class="title-order d-flex align-items-center justify-content-between flex-wrap gap-2">
                                        {{$comment->user->name}}
                                        <span class="text-color-dark text-fs-1">
                                            {{$comment->created_at->format('Y-m-d')}}
                                        </span>
                                    </h5>
                                    <div class="break my-3"></div>
                                    <div class="content-order ">
                                        {{$comment->comment}}
                                    </div>
                                </div>
                            </div>
                            @endforeach


                    </div>
                    @endif

            </div>
                    <form action="{{route('storeComment',$ticket->id)}}" class="mt-3" method="post">
                        @csrf
                                <textarea class="mb-2 form-control" placeholder="اكتب تعليقك هنا "  name="comment">{{old('comment')}}</textarea>
                                <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    إرسال
                                </button>
                                </div>
                    </form>


        </div>
    </section>
@endsection
