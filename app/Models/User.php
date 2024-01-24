<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'to' => 'datetime',
        // 'from' => 'datetime',
    ];
    public function created_at()
    {
        return $this->created_at->format('Y-m-d');
    }
    public function status(): string
    {
        return $this->status ? 'مفعل' : 'غير مفعل';
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function getService()
    {
        return $this->belongsTo(Service::class, 'service');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class)->with('products');
    }

    public function vendorCarts()
    {
        return $this->hasMany(CartProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function incomingMessages()
    {
        return $this->hasMany(VendorMessage::class, 'vendor_id');
    }

    public function outgoingMessages()
    {
        return $this->hasMany(VendorMessage::class, 'user_id');
    }

    public function supportChats()
    {
        return $this->hasMany(SupportChat::class);
    }

    public function scopeVendors($q)
    {
        return $q->where('type', 'vendor');
    }

    public function scopeClients($q)
    {
        return $q->where('type', 'user');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
// public function scopeClientsIndividual($q)
// {
//     return $q->where('type', 'user')->where('membership', 'individual');
// }
// public function scopeClientsCoordinator($q)
// {
//     return $q->where('type', 'coordinator')->where('membership', 'individual');
// }

// public function scopeVendorsIndividual($q)
// {
//     return $q->where('type', 'vendor')->where('membership', 'individual');
// }
// public function scopeVendorsCompany($q)
// {
//     return $q->where('type', 'vendor')->where('membership', 'company');
// }
// public function scopeJudgers($q)
// {
//     return $q->where('type', 'judger');
// }
// public function getNameAttribute()
// {
//     return $this->first_name . ' ' . $this->second_name . ' ' . $this->third_name . ' ' . $this->last_name;
// }


// public function occupation()
// {
//     return $this->belongsTo(Occupation::class);
// }

// public function license()
// {
//     return $this->hasOne(License::class);
// }

// public function getHasActiveLicenseAttribute()
// {
//     if ($this->license?->status == 'refused' or $this->license?->end_at < now()->format('Y-m-d')) {
//         return false;
//     }
//     return true;
// }

// public function commercial()
// {
//     return $this->hasOne(Commercial::class);
// }

// public function offers()
// {
//     return $this->hasMany(Offer::class);
// }

// public function getHasActiveCommercialAttribute()
// {
//     if ($this->commercial?->status == 'refused' or $this->commercial?->end_at < now()->format('Y-m-d')) {
//         return false;
//     }
//     return true;
// }
}
