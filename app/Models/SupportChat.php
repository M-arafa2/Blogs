<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportChat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(SupportChatItem::class, 'support_chat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function markAsRead($user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }
        $this->messages()->where('user_id', $user->id)->update(['readed_at' => Carbon::now()]);
    }

    public function answers()
    {
        return $this->hasMany(SupportAnswer::class, 'support_chat_id');
    }
}
