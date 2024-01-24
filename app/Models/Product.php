<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'total_processing',
        'total_compeleted',
        'total_cart'
    ];
    public function created_at()
    {
        return $this->created_at?->format('Y-m-d');
    }
    public function status(): string
    {
        return $this->status ? 'مفعل' : 'غير مفعل';
    }
    public function delivery(): string
    {
        return $this->delivery ? 'متاحه' : 'غير متاحه';
    }
    public function insurance(): string
    {
        return $this->insurance ? 'نعم' : 'لا';
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function options()
    {
        // return products that have the same department
        return $this->department->products()->where('id', '!=', $this->id)->active()->take(4);
    }

    public function scopeAccepted($query)
{
    return $query->where('acceptance', 'accepted');
}

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }
    public function getTotalProcessingAttribute()
    {
        return $this->getTotalByStatus();
    }
    public function getTotalPendingAttribute()
    {
        return $this->getTotalByStatus();
    }
    public function getTotalCompeletedAttribute()
    {
        return $this->getTotalByStatus('completed');
    }
    public function getTotalCartAttribute()
    {
        return $this->getTotalByStatus(null);
    }
    public function getTotalByStatus($status = 'processing')
    {
        $total = $this->cartProducts()->whereHas('cart', function ($q) use ($status) {
            if ($status) {
                $q->where('status', $status);
            } else {
                $q->where('status', '<>', 'pending');
            }
        })->sum('total');
        return $total;
    }
}
