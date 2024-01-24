<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportChatItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function markAsRead($user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }
        $this->update(['readed_at' => Carbon::now()]);
    }
}
