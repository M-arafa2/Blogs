@extends('front.layouts.front')

@section('content')
    <section class="section section-notification section-bg min-vh-100">
        <div class="holder">
            <h3 class="md-title mb-3 text-center">الإشعارات</h3>
            <ul class="notifications-list list-unstyled">
                @if (auth()->user())
                    @forelse (auth()->user()->notifications()->paginate(15) as $notification)
                        @if ($notification->type == 'App\Notifications\MessageNotification')
                            <li>
                                <div class="notification_holder">
                                    <div class="notification_text">
                                        <i class="fa-solid fa-circle-exclamation icon-alert"></i>
                                        <div class="d-flex flex-column gap-2">
                                            <a href="{{ route('offer.show', encrypt($notification['data']['offer_id'])) }}"
                                                class="mb-0" onclick="markNotificationAsRead($notification->id)">
                                                <p class="content mb-0">
                                                    {{ $notification['data']['title'] }}
                                                </p>
                                            </a>
                                            <div class="date-notification">
                                                <i class="fas fa-clock"></i>
                                                <span>
                                                    {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                                </span>
                                                <p class="text-dark my-auto">
                                                    {{ $notification->read_at == null ? 'غير مقروء' : 'تم القراءة' }}
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </li>
                        @endif
                    @empty
                        <li class="alert alert-warning">
                            لا يوجد اي اشعار بعد !
                        </li>
                    @endforelse
                @endif
            </ul>
        </div>
    </section>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
        <script>
            function markNotificationAsRead(id) {
                $.get('markAsRead/'.id);
            }
        </script>
    @endpush
@endsection
