<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorMessageItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'full_attachment'
    ];

    public function conversation()
    {
        return $this->belongsTo(VendorMessage::class, 'vendor_message_id');
    }

    public function getFullAttachmentAttribute($value)
    {
        return $this->attachment ? display_file($this->attachment) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function markAsRead()
    {
        $this->update(['read_at' => Carbon::now()]);
    }
}
