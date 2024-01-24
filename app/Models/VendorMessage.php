<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function messages()
    {
        return $this->hasMany(VendorMessageItem::class, 'vendor_message_id');
    }
    public function markAsRead($user)
    {
        $this->messages()->where('user_id', '!=', $user->id)->update(['read_at' => Carbon::now()]);
    }
}
