<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'اشعار جديد',
            'body' => $this->user->message,
            'user' => $this->user
        ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
